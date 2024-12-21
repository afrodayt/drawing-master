<template>
    <header class="header">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between gap-3">
                <img class="header-logo" src="assets/img/logo-ersag.svg" alt="logo">

                <a href="#about" class="header-link">Про продукт</a>
                <a href="#advantages" class="header-link">Наші переваги</a>
                <a href="#catalog" class="header-link">Каталог товару</a>
                <a href="#manufacturer" class="header-link">Виробник</a>
                <a href="#feedback" class="header-link">Відгуки</a>

                <button class="header-btn" @click="openOrderModal">Замовити</button>
            </div>
        </div>

    </header>

</template>

<script>
import { EventBus } from '@/eventBus';

export default {
    name: 'HeaderComponent',
    methods: {
        openOrderModal() {
            EventBus.$emit('openOrderModal');
        },
    }
};
</script>

<style scoped lang="less">
    .header {
        padding: 25px 0;
        font-size: 16px;
        font-weight: 600;

        @media (max-width: 991px) {
            padding: 22px 0;

            &-logo {
                height: 40px;
                object-fit: contain;
            }
        }

        &-link {
            color: rgb(0, 0, 0);
            text-decoration: none;

            @media (max-width: 991px) {
                display: none;
            }
        }

        &-btn {
            border: 2px solid rgb(255, 217, 0);
            border-radius: 80px;
            width: 180px;
            height: 40px;
            background: white;
            font-size: 16px;
            font-weight: 600;
            line-height: 19.2px;
            letter-spacing: 0.005em;

            &:hover {
                background: rgb(255, 217, 0);
            }

            @media (max-width: 991px) {
                height: 35px;
                width: 120px;
                font-size: 15px;
                font-weight: 600;
                line-height: 18px;
            }
        }
    }
</style>
