<template>
    <header class="header">
        <div class="container">
            <div class="justify-content-between d-flex align-items-center">
                <img src="assets/img/logo-art.png" alt="logo">
                <div class="d-flex align-items-center gap-3">
                    <a href="https://www.instagram.com/art_shuhai/" target="_blank">
                        <img src="assets/img/icon-instagram.png" alt="logo-instagram">
                    </a>
                    <a href="https://www.facebook.com/people/ART-Shuhai/61562003400987/" target="_blank">
                        <img src="assets/img/icon-facebook.png" alt="logo-facebook">
                    </a>
                    <div class="text-white">follow us on social media</div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: 'HeaderComponent',
};
</script>

<style scoped lang="less">
    header {
        padding-top: 20px;
        font-family: Montserrat, serif;
        font-size: 16px;
        font-weight: 500;
    }
</style>
