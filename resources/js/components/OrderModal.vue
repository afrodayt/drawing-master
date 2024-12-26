<template>
    <div>
        <div v-show="isVisible" class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title fs-5 text-center text-lg-start" id="staticBackdropLabel">Sign up for the master class</div>
                        <button type="button" class="btn-close" @click="closeModal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body-description mb-4" v-html="selectedEvent.modalDescription">
                        </div>
                        <div class="modal-body-information d-flex align-items-center gap-2">
                            <img src="assets/img/icon-date.svg" alt="date">
                            Date: {{selectedEvent.day}}{{ getFormatedDate(selectedEvent.date) }}
                        </div>
                        <div class="modal-body-information d-flex align-items-center gap-2">
                            <img src="assets/img/icon_time.png" alt="time">
                            Time: {{ selectedEvent.time }}
                        </div>
                        <div class="modal-body-information  d-flex align-items-center gap-2 mb-0">
                            <img src="assets/img/icon-location.svg" alt="location">
                            Location: {{ selectedEvent.location }}
                        </div>
                        <div class="modal-body-title">What's Included:</div>
                        <div class="modal-body-description">
                            All painting supplies provided + snacks and drinks for absolute relaxation and immersion in
                            the friendly atmosphere of creativity
                        </div>
                        <div class="modal-body-description gap-2 d-flex align-items-center">
                            <img src="assets/img/icon-price.svg" alt="price">
                            Price: {{ selectedEvent.price }}  per person
                        </div>
                        <div class="modal-body-description mb-0">
                            {{ selectedEvent.modalIncludes }}
                        </div>
                        <form class="d-flex flex-column" @submit.prevent="submitOrder">
                            <div class="row">
                                <div class="col-12 col-lg-6 d-flex flex-column">
                                    <label for="name" class="modal-body-label">
                                        Name<span class="required">*</span>
                                    </label>
                                    <input type="text" id="name" v-model="name" class="modal-body-input" required />
                                </div>
                                <div class="col-12 col-lg-6 d-flex flex-column">
                                    <label for="phone" class="modal-body-label">
                                        Phone Number<span class="required">*</span>
                                    </label>
                                    <input type="number" id="phone" v-model="phone" class="modal-body-input" required />
                                </div>
                            </div>
                            <label for="email" class="modal-body-label">
                                Email<span class="required">*</span>
                            </label>
                            <input type="email" id="email" v-model="email" class="modal-body-input" required />
                            <label for="message" class="modal-body-label">
                                Add Your Message<span class="required">*</span>
                            </label>
                            <textarea id="message" v-model="message" class="modal-body-input modal-body-input-text" required></textarea>
                            <div class="d-flex justify-content-center">
                                <button type="submit" :disabled="isButtonDisabled" class="modal-body-button">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="isVisible" class="modal-backdrop fade show" @click="closeModal"></div>
    </div>
</template>

<script>

import { EventBus } from '@/eventBus';
import {events} from "@/events.js";
import moment from "moment/moment.js";

export default {
    name: 'OrderModal',
    data() {
        return {
            name: '',
            phone: '',
            email: '',
            message: '',
            isVisible: false,
            events: events,
            loading: false,
            selectedEvent: {},
        }
    },

    computed: {
        isButtonDisabled() {
            return this.name.trim() === '' || this.email.trim() === '' || this.message.trim() === '';
        },
    },

    methods: {
        getFormatedDate(date) {
            return moment(date).format("MMMM D");
        },
        openModal(id) {
            this.selectedEvent = this.events.find((event) => event.id === id);
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
            this.phone = '';
            this.email = '';
            this.message = '';
        },

        async submitOrder() {
            this.loading = true;

            const leadData = {
                name: this.name,
                phone: this.phone,
                email: this.email,
                message: this.message,
                selectedEvent: this.selectedEvent,
            };

            await fetch('/api/leads', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(leadData),
            })
                .then(response => {
                    if (response.ok) {
                        this.closeModal()
                        EventBus.$emit('openThankYouModal')
                    } else {
                        console.error('Ошибка при отправке данных:', response.statusText);
                    }
                })
                .catch(error => {
                    console.error('Ошибка:', error);
                });

            this.loading = false;
        }
    },
    mounted() {
        EventBus.$on('openOrderModal', (id) => {
            this.openModal(id); // Открываем модальное окно с переданным id
        });
    },
    beforeDestroy() {
        EventBus.$off('openOrderModal'); // Отписываемся от событий, чтобы избежать утечек памяти
    },
};
</script>

<style scoped lang="less">
::v-deep .modal-body-description-bold {
    font-size: 20px;
    font-weight: 500;
    line-height: 145%;
    margin-bottom: 10px;
    margin-top: 12px;
}


.modal {
    &-dialog {
        max-width: 800px;
    }
    &-header {
        border: none;
    }
    &-header {
        position: relative;
        display: flex;
        justify-content: center;
        padding: 50px 0 0 0;

        @media (max-width: 991px) {
            padding: 60px 0 0 0;
        }
    }
    .btn-close {
        position: absolute;
        right: 27px;
        top: 27px;
    }
    &-title {
        font-family: Cormorant Garamond, serif;
        font-size: 42px !important;
        font-weight: 400;
        line-height: 115%;
        margin-bottom: 25px;

        @media (max-width: 991px) {
            font-size: 36px !important;
            margin-bottom: 20px;
        }
    }
    &-body {
        padding: 0 40px 50px 40px;

        @media (max-width: 991px) {
            padding: 0 15px 60px 15px;
        }

        &-title {
            font-size: 20px;
            font-weight: 500;
            line-height: 150%;
            margin-top: 20px;
            margin-bottom: 10px;

            @media (max-width: 991px) {
                font-size: 18px;
                margin-bottom: 10px;
            }
        }
        &-description, &-information {
            font-family: Montserrat, serif;
            font-size: 15px;
            font-weight: 400;
            line-height: 150%;
            margin-bottom: 7px;

            @media (max-width: 991px) {
                font-size: 16px;
                margin-bottom: 8px;
            }
        }
        &-description {
            margin-bottom: 10px;

            @media (max-width: 991px) {
                margin-bottom: 20px;
            }
        }
        &-label {
            font-family: Montserrat, serif;
            font-size: 14px;
            font-weight: 600;
            line-height: 17px;
            margin-bottom: 10px;
        }
        &-input {
            font-family: Montserrat, serif;
            border: 1px solid rgb(185, 185, 185);
            border-radius: 50px;
            height: 50px;
            margin-bottom: 20px;
            padding: 0 20px;
            &-text {
                font-family: Montserrat, serif;
                padding: 3px 20px;
                height: 100px;
                border-radius: 35px;
                resize: none;
                margin-bottom: 30px;
            }
        }
        &-button {
            font-family: Montserrat, serif;
            border-radius: 80px;
            border: unset;
            width: 280px;
            height: 60px;
            background: rgb(255, 183, 133);
            font-size: 22px;
            font-weight: 500;
            line-height: 120%;
            &:disabled {
                opacity: 50%;
            }
        }
        form {
            margin-top: 40px;
        }
    }
}

</style>
