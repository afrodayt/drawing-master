<template>
    <div>
        <div v-show="isVisible" class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title fs-5 text-center text-lg-start">
                            Join the waitlist
                        </div>
                        <button type="button" class="btn-close" @click="closeModal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div v-if="!submitted">
                            <div class="modal-body-description mb-3">
                                <strong>{{ selectedEvent.eventName }}</strong> is currently sold out.
                                Leave your details — we'll reach out if a spot opens up
                                or as soon as a new session is scheduled.
                            </div>
                            <div class="modal-body-information d-flex align-items-center gap-2">
                                <img src="assets/img/icon-date.svg" alt="date">
                                Date: {{ formattedDate }}
                            </div>
                            <div class="modal-body-information d-flex align-items-center gap-2 mb-3">
                                <img src="assets/img/icon-location.svg" alt="location">
                                Location: {{ selectedEvent.location }}
                            </div>
                            <form class="d-flex flex-column" @submit.prevent="submitWaitlist">
                                <div class="row">
                                    <div class="col-12 col-lg-6 d-flex flex-column">
                                        <label for="wl-name" class="modal-body-label">
                                            Name<span class="required">*</span>
                                        </label>
                                        <input type="text" id="wl-name" v-model="name" class="modal-body-input" required />
                                    </div>
                                    <div class="col-12 col-lg-6 d-flex flex-column">
                                        <label for="wl-phone" class="modal-body-label">
                                            Phone Number<span class="required">*</span>
                                        </label>
                                        <input type="tel" id="wl-phone" v-model="phone" class="modal-body-input" required />
                                    </div>
                                </div>
                                <label for="wl-email" class="modal-body-label">
                                    Email<span class="required">*</span>
                                </label>
                                <input type="email" id="wl-email" v-model="email" class="modal-body-input" required />
                                <div v-if="errorMessage" class="text-danger mt-2 mb-0">{{ errorMessage }}</div>
                                <div class="d-flex justify-content-center mt-4">
                                    <button type="submit" :disabled="isButtonDisabled || loading"
                                        class="modal-body-button">
                                        {{ loading ? 'Sending…' : 'Join waitlist' }}
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div v-else class="text-center py-4">
                            <div class="modal-body-title mb-3">You're on the list!</div>
                            <div class="modal-body-description">
                                Thanks, {{ submittedName }} — we'll be in touch by email or phone
                                as soon as a spot opens up or a new <strong>{{ selectedEvent.eventName }}</strong> session is added.
                            </div>
                            <button type="button" class="modal-body-button mt-4" @click="closeModal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="isVisible" class="modal-backdrop fade show" @click="closeModal"></div>
    </div>
</template>

<script>
import moment from "moment/moment.js";

const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]')?.content;

export default {
    name: 'WaitlistModal',
    data() {
        return {
            name: '',
            email: '',
            phone: '',
            isVisible: false,
            loading: false,
            submitted: false,
            submittedName: '',
            errorMessage: '',
            selectedEvent: {},
        };
    },
    computed: {
        isButtonDisabled() {
            return this.name.trim() === '' ||
                !this.validateEmail(this.email) ||
                this.phone.trim() === '';
        },
        formattedDate() {
            if (!this.selectedEvent || !this.selectedEvent.date) return '';
            if (this.selectedEvent.date === '%') return 'Every ' + (this.selectedEvent.day || 'day');
            const day = this.selectedEvent.day ? this.selectedEvent.day.replace(/,\s*$/, '') : '';
            const formatted = moment(this.selectedEvent.date).format('MMMM D');
            return day ? `${formatted} (${day})` : formatted;
        },
    },
    methods: {
        validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        },
        sanitizeInput(text) {
            return (text || '').replace(/<[^>]*>?/gm, '').trim();
        },
        openModal(event) {
            this.selectedEvent = event || {};
            this.resetForm();
            document.body.style.overflow = 'hidden';
            this.isVisible = true;
        },
        closeModal() {
            this.isVisible = false;
            document.body.style.overflow = '';
            this.resetForm();
        },
        resetForm() {
            this.name = '';
            this.email = '';
            this.phone = '';
            this.errorMessage = '';
            this.submitted = false;
            this.submittedName = '';
        },
        async submitWaitlist() {
            if (this.isButtonDisabled || this.loading) return;
            this.loading = true;
            this.errorMessage = '';

            const payload = {
                event_id:   this.selectedEvent.id,
                event_name: this.sanitizeInput(this.selectedEvent.eventName),
                event_date: this.selectedEvent.date || '',
                name:       this.sanitizeInput(this.name),
                email:      this.sanitizeInput(this.email),
                phone:      this.sanitizeInput(this.phone),
            };

            try {
                const response = await fetch('/api/waitlist/join', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': CSRF_TOKEN,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(payload),
                    credentials: 'same-origin',
                });

                if (!response.ok) {
                    const data = await response.json().catch(() => ({}));
                    throw new Error(data.message || 'Could not join the waitlist. Please try again.');
                }

                this.submittedName = payload.name;
                this.submitted = true;
            } catch (err) {
                this.errorMessage = err.message || 'Network error. Please try again.';
            } finally {
                this.loading = false;
            }
        },
    },
};
</script>
