<template>
    <footer class="footer">
        <div class="row h-100">
            <div class="col-6">
            </div>
            <div class="col-6 d-flex flex-column justify-content-end">
                <div class="footer-title">
                    Contacts
                </div>
                <div class="footer-contact">
                    <img src="assets/img/icon-email.svg" alt="icon-email">
                    a.art.shuhai@gmail.com
                </div>
                <div class="footer-contact mb-0">
                    <img src="assets/img/icon-location.svg" alt="icon-location-footer">
                    1324 11 Ave, SW, #202, Calgary
                </div>
                <div class="footer-description">
                    Follow us on social media
                </div>
                <div>
                    <a href="https://www.instagram.com/art_shuhai/" target="_blank">
                        <img src="assets/img/icon-instagram.svg" alt="logo-instagram">
                    </a>
                    <a href="https://www.facebook.com/people/ART-Shuhai/61562003400987/" target="_blank">
                        <img src="assets/img/icon-facebook.svg" alt="logo-facebook">
                    </a>
                </div>
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
        background: url("assets/img/footer-bg.png") center no-repeat;
        background-size: cover;
        height: 432px;

        &-title {
            font-family: Bodoni Moda, serif;
            font-size: 50px;
            font-weight: 400;
            line-height: 115%;
            margin-bottom: 36px;
        }
        &-contact {
            font-family: Montserrat, serif;
            font-size: 16px;
            font-weight: 500;
            line-height: 140%;
            margin-bottom: 13px;

            img {
                margin-right: 8px;
            }
        }
        &-description {
            font-family: Bodoni Moda, serif;
            font-size: 22px;
            font-weight: 400;
            line-height: 140%;
            margin-top: 22px;
            margin-bottom: 18px;
        }
        a {
            margin-right: 20px;
        }
    }
</style>
