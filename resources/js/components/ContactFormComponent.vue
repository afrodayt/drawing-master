<template>
    <form class="d-flex flex-column message" @submit.prevent="sendContactForm">
        <label for="name" class="message-label">
            Name<span class="required">*</span>
        </label>
        <input type="text" id="name" v-model="name" class="message-input" required/>
        <label for="email" class="message-label">
            Email<span class="required">*</span>
        </label>
        <input type="email" id="email" v-model="email" class="message-input" required/>
        <label for="message" class="message-label">
            Add Your Message<span class="required">*</span>
        </label>
        <textarea id="message" v-model="message" class="message-input message-input-text"
                  required></textarea>
        <div class="d-flex justify-content-center justify-content-lg-start">
            <button type="submit" :disabled="isButtonDisabled" class="message-button">Send</button>
        </div>
    </form>
</template>

<script>

import { EventBus } from '@/eventBus';

export default {
    name: 'ContactFormComponent',
    data() {
        return {
            name: '',
            email: '',
            message: '',
            loading: false,
        }
    },

    computed: {
        isButtonDisabled() {
            return this.name.trim() === '' || this.email.trim() === '' || this.message.trim() === '';
        },
    },

    methods: {
        isFormValid() {
            return this.name.trim() !== "" &&
                this.email.trim() !== "" &&
                this.message.trim() !== "";
        },

        resetForm() {
            this.name = '';
            this.email = '';
            this.message = '';
        },

        async sendContactForm() {
            this.loading = true;

            const contactData = {
                name: this.name,
                email: this.email,
                message: this.message,
            };

            await fetch('/api/contact', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(contactData),
            })
                .then(response => {
                    if (response.ok) {
                        EventBus.$emit('openThankYouModal');
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
};
</script>

<style scoped lang="less">
.message {
    &-label {
        font-family: Montserrat, serif;
        font-size: 14px;
        font-weight: 600;
        line-height: 17px;
        margin-bottom: 10px;

        &:first-child {
            margin-top: 30px;
        }
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
}

</style>
