<template>
    <footer class="footer">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between footer-container">
                <img class="footer-logo" src="assets/img/logo-ersag.svg" alt="logo">
                <a href="#about" class="footer-link">Про продукт</a>
                <a href="#advantages" class="footer-link">Наші переваги</a>
                <a href="#catalog" class="footer-link">Каталог товару</a>
                <a href="#manufacturer" class="footer-link">Виробник</a>
                <a href="#feedback" class="footer-link">Відгуки</a>
            </div>
        </div>

    </footer>

</template>

<script>
export default {
    name: 'FooterComponent',
};
</script>

<style scoped lang="less">
    .footer {
        padding: 70px 0;
        font-size: 16px;
        font-weight: 600;
        background: rgb(208, 216, 231);

        @media (max-width: 991px) {
            padding: 25px 0;

            &-logo {
                height: 40px;
                object-fit: contain;

                @media(max-width: 991px) {
                    margin-bottom: 35px;
                }
            }
        }

        &-link {
            color: rgb(0, 0, 0);
            text-decoration: none;

            @media(max-width: 991px) {
                margin-bottom: 25px;
            }
        }
        &-container {

            @media(max-width: 991px) {
                flex-direction: column;
            }
        }
    }
</style>
