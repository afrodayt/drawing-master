<template>
    <div>
        <div v-show="isVisible" class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title fs-5 text-center text-lg-start" id="staticBackdropLabel">Your application has been accepted!</div>
                        <button type="button" class="btn-close" @click="closeModal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="assets/img/img-success.png" alt="success" class="adaptive-img">
                    </div>
                </div>
            </div>
        </div>
        <div v-if="isVisible" class="modal-backdrop fade show" @click="closeModal"></div>
    </div>
</template>

<script>

import { EventBus } from '@/eventBus';

export default {
    name: 'ThankYouModal',
    data() {
        return {
            isVisible: false,
        }
    },

    methods: {
        openModal(id) {
            document.body.style.overflow = 'hidden';
            this.isVisible = true;
        },
        closeModal() {
            this.isVisible = false;
            document.body.style.overflow = '';
        },
    },
    mounted() {
        EventBus.$on('openThankYouModal', () => {
            this.openModal(); // Открываем модальное окно с переданным id
        });
    },
    beforeDestroy() {
        EventBus.$off('openThankYouModal'); // Отписываемся от событий, чтобы избежать утечек памяти
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
    }
    .btn-close {
        position: absolute;
        right: 27px;
        top: 27px;
    }
    &-title {
        font-family: Bodoni Moda, serif;
        font-size: 42px !important;
        font-weight: 400;
        line-height: 115%;
        margin-bottom: 25px;

        @media (max-width: 991px) {
            font-size: 36px !important;
        }
    }
    &-body {
        padding: 0 40px 50px 40px;

        &-title {
            font-size: 20px;
            font-weight: 500;
            line-height: 150%;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        &-description, &-information {
            font-family: Montserrat, serif;
            font-size: 15px;
            font-weight: 400;
            line-height: 150%;
            margin-bottom: 7px;
        }
        &-description {
            margin-bottom: 10px;
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
