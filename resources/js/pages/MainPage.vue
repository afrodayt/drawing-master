<template>
    <main class="main">
        <div class="main-banner w-100 mb-200 d-none d-lg-block">
            <div class="container h-100">
                <div class="row h-100 align-items-md-center">
                    <div class="col-12 col-lg-7">
                        <div class="main-banner-title">
                            Ефективне та безпечне очищення меблів і килимів <span
                            class="text-yellow fw-800">без фосфатів!</span>
                        </div>
                        <div class="main-banner-description">
                            Концентровані засоби для очищення килимів та меблів, безпечні для дітей, домашніх тварин та
                            вашого дому. <br> Вироблено в Туреччині.
                        </div>

                        <div class="d-flex justify-content-center justify-content-lg-start">
                            <a href="#catalog"
                               class="main-button text-dark d-flex align-items-center justify-content-center text-decoration-none">
                                До каталогу товарів
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container d-lg-none mb-200">
            <div class="main-banner w-100 ">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-lg-7">
                            <div class="main-banner-title">
                                Ефективне та безпечне очищення меблів і килимів <span
                                class="text-yellow fw-800">без фосфатів!</span>
                            </div>
                            <div class="main-banner-description">
                                Концентровані засоби для очищення килимів та меблів, безпечні для дітей, домашніх тварин та
                                вашого дому. Вироблено в Туреччині.
                            </div>

                            <div class="d-flex justify-content-center justify-content-lg-start">
                                <a href="#catalog"
                                   class="main-button text-dark d-flex align-items-center justify-content-center text-decoration-none">
                                    До каталогу товарів
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img class="adaptive-img" style="border-radius: 15px" src="assets/img/mobile-main-right-side-banner.jpg" alt="mobile-main-right-side-banner">
        </div>
        <div class="container">
            <section class="mb-200 text-center text-lg-start" id="about">
                <div class="row flex-column-reverse flex-lg-row align-items-center">
                    <div class="col-12 col-lg-6">
                        <img class="adaptive-img" src="assets/img/img-problem-contamination-of-furniture.png" alt="problems">
                    </div>
                    <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                        <div class="main-title mb-4">Вам це знайоме?</div>
                        <div class="mb-3">
                            Ваші килими та м’які меблі щодня збирають пил, плями та бруд, що
                            негативно впливає
                            на здоров'я вашої родини. Більшість звичайних засобів для очищення містять фосфати та інші
                            шкідливі речовини,
                            що можуть викликати алергію у дітей і домашніх тварин
                        </div>
                        <div>
                            З часом ці забруднення глибоко в’їдаються в тканину, ускладнюючи
                            очищення та знижуючи
                            термін служби ваших меблів і килимів. Виникає питання: як ефективно очистити поверхні та
                            водночас убезпечити
                            домівку від шкідливих речовин?
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-200 main-solution">
                <div class="main-title text-center">Рішеня є!</div>
                <div class="row row-gap-4">
                    <div class="col-12 col-lg-4">
                        <div class="main-solution-card">
                            <img src="assets/img/furniture.png" alt="furniture">
                            <div>
                                Наші концентровані засоби для очищення меблів та килимів — це ідеальне рішення для тих,
                                хто піклується
                                про чистоту свого дому та безпеку своїх близьких.
                                <span class="text-blue fw-600">Засоби не містять фосфатів (STTP)</span>
                                , тому вони абсолютно безпечні
                                для дітей і домашніх тварин, а також екологічні для довкілля.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="main-solution-card">
                            <img src="assets/img/concentrated-product.png" alt="furniture">
                            <div>
                                Завдяки високій концентрації засіб забезпечує глибоке очищення, видаляє навіть складні
                                плями з поверхні килимів та меблів.
                                <span class="text-blue fw-600">Лише одна упаковка засобу забезпечить до 66 літрів активного засобу</span>
                                — це економічно вигідно та зручно у використанні.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="main-solution-card">
                            <img src="assets/img/manufacturer-turkiye.png" alt="furniture">
                            <div>
                                Вироблено в Туреччині з урахуванням
                                <span class="text-blue fw-600">усіх міжнародних стандартів якості</span>,

                                наші засоби — це не лише
                                ефективність, але й турбота про здоров'я вашої родини та природу
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-200 main-switch">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <div class="main-title text-center mb-4">
                            Натисніть на перемикач, щоб побачити більше
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center align-items-center gap-3 gap-lg-4 mb-80">
                    <div class="main-switch-text">Диван</div>
                    <label class="main-switch-toggle">
                        <input type="checkbox" v-model="showCover">
                        <span class="main-switch-toggle-slider"></span>
                    </label>
                    <div class="main-switch-text me-0">Килим</div>
                </div>
                <div v-if="showCover" class="d-flex justify-content-center">
                    <img class="adaptive-img" src="assets/img/img-carpet.png" alt="carpet">
                </div>
                <div v-else class="d-flex justify-content-center">
                    <img class="adaptive-img" src="assets/img/img-sofa.png" alt="Sofa">
                </div>
            </section>
        </div>
        <section class="mb-200 main-advantages" id="advantages">
            <div class="container">
                <div class="main-title text-center">
                    Переваги
                </div>
            </div>
            <div class="main-advantages-bg">
                <div class="container position-relative">
                    <div class="main-advantages-card main-advantages-card1">
                        <img class="main-advantages-card-img" src="assets/img/img-safety-for-family.png" alt="safety">
                        <div class="main-advantages-card-title">Безопасність для родини</div>
                        <div class="main-advantages-card-description">
                            Безпечний для дітей та домашніх тварин. Не містить фосфатів та
                            інших шкідливих хімічних речовин, що можуть викликати алергічні реакції.
                        </div>
                        <img src="assets/img/leaf1.png" alt="leaf" class="main-advantages-card1-leaf1 d-none d-lg-inline">
                        <img src="assets/img/bubble.png" alt="bubble" class="main-advantages-card1-bubble1 d-none d-lg-inline">
                    </div>
                    <div class="main-advantages-card main-advantages-card2">
                        <img class="main-advantages-card-img" src="assets/img/img-easy-to-use.png" alt="safety">
                        <div class="main-advantages-card-title">Легкість використання</div>
                        <div class="main-advantages-card-description">
                            Простота у використанні. Лише розведіть засіб водою, нанесіть на поверхню, зачекайте кілька
                            хвилин — і
                            ваші меблі чи килим будуть бездоганно чистими
                        </div>
                        <img src="assets/img/bubble2_1.png" alt="bubble" class="main-advantages-card2-bubble1">
                        <img src="assets/img/bubble2_2.png" alt="bubble" class="main-advantages-card2-bubble2">
                    </div>

                    <div class="d-flex justify-content-center">
                        <img src="assets/img/img-housewife.png" alt="housewife" class="main-advantages-housewife d-none d-lg-inline ">
                        <img src="assets/img/img-housewife-mobile.png" alt="housewife" class="main-advantages-housewife adaptive-img d-lg-none">
                    </div>

                    <div class="main-advantages-card main-advantages-card3">
                        <img class="main-advantages-card-img" src="assets/img/img-economical.png" alt="safety">
                        <div class="main-advantages-card-title">Економічність і ефективність</div>
                        <div class="main-advantages-card-description">
                            Висококонцентрований продукт. Одного літра засобу достатньо для приготування 66 літрів
                            очищувального
                            розчину, що робить його економічно вигідним.
                        </div>
                        <img src="assets/img/leaf2.png" alt="leaf" class="main-advantages-card3-leaf1 d-none d-lg-inline">
                        <img src="assets/img/leaf3.png" alt="leaf" class="main-advantages-card3-leaf2">
                        <img src="assets/img/bubble3_1.png" alt="bubble" class="main-advantages-card3-bubble1 d-none d-lg-inline">
                    </div>
                    <div class="main-advantages-card main-advantages-card4">
                        <img class="main-advantages-card-img" src="assets/img/img-ekologichno.png" alt="safety">
                        <div class="main-advantages-card-title">Екологічність</div>
                        <div class="main-advantages-card-description">
                            Екологічний продукт. Формула розроблена без використання шкідливих для довкілля компонентів.
                        </div>
                        <img src="assets/img/bubble4_1.png" alt="bubble" class="main-advantages-card4-bubble1">
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <section class="main-catalog mb-200" id="catalog">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-9">
                        <div class="main-title text-center">
                            Виберіть свій продукт для бездоганного очищення
                        </div>
                    </div>
                </div>
                <div class="row align-items-stretch">
                    <div class="main-catalog-container col-12 col-lg-4" v-for="product in products" :key="product.id">
                        <div class="main-catalog-card">
                            <div>
                                <div class="text-center">
                                    <img :src="'assets/img/' + product.img" :alt="product.productName">
                                </div>
                                <div class="main-catalog-card-title">
                                    {{ product.productName }} <span v-if="product.id !== 3">{{product.volume}}</span>
                                </div>
                                <div v-if="product.id === 1">
                                    <div class="main-catalog-card-description mb-2">
                                        <span class="fw-600">Склад:</span> Концентрат, не містить фосфатів (STTP)
                                    </div>
                                    <div class="main-catalog-card-description mb-2">
                                        <span class="fw-600">Спосіб застосування:</span>
                                        Розведіть 1 кришку засобу на 1 літр води. Нанесіть на пляму, зачекайте кілька хвилин, потім змийте теплою водою та протріть.
                                    </div>
                                </div>
                                <div v-else-if="product.id === 2">
                                    <div class="main-catalog-card-description mb-2">
                                        <span class="fw-600">Склад:</span> Спеціальна формула для чищення меблів, без фосфатів (STTP)
                                    </div>
                                    <div class="main-catalog-card-description mb-2">
                                        <span class="fw-600">Спосіб застосування:</span>
                                        Розведіть засіб у співвідношенні 1:5 з водою. Після очищення протріть меблі сухою ганчіркою.
                                    </div>
                                </div>
                                <div v-else-if="product.id === 3">
                                    <div class="main-catalog-card-description mb-2">
                                        <span class="fw-600">Склад набору:</span> Миючий засіб для килимів 1000 мл + Засіб для чищення меблів 500 мл
                                    </div>
                                    <div class="main-catalog-card-description mb-2">
                                        <span class="fw-600">Переваги:</span>
                                        Економія, комплексне рішення для догляду за домом.
                                    </div>

                                </div>

                                <div class="main-catalog-card-description">
                                    <span class="fw-600">Обсяг:</span> {{product.volume}}
                                </div>
                            </div>

                            <div>
                                <div class="d-flex align-items-center" v-if="product.discountPrice">
                                    <div class="main-catalog-card-price">
                                        {{product.discountPrice}} грн
                                    </div>
                                    <div class="main-catalog-card-price-old">
                                        {{product.price}} грн
                                    </div>
                                </div>
                                <div class="main-catalog-card-price" v-else>
                                    {{product.price}} грн
                                </div>
                                <button class="main-catalog-card-btn" @click="openOrderModal(product.id)">
                                    Замовити
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="main-products mb-200">
                <div class="main-products-background">
                    <div class="row">
                        <div class="col-12 col-lg-7 main-products-container">
                            <div class="main-products-container-text">
                                Замовляючи наші засоби разом, ви отримуєте комплексне рішення для догляду за вашим домом та <span class="fw-bold">економите 100 грн!</span> Безпечний
                                догляд для килимів і меблів в одному наборі.
                            </div>
                        </div>

                    </div>
                    <img src="assets/img/img-product.png" alt="product" class="main-products-img adaptive-img">
                </div>
            </section>
        </div>
        <section class="main-manufacturer mb-200" id="manufacturer">
            <div class="container d-flex align-items-center flex-column">
                <div class="main-title">Виробник, якому можна довіряти</div>
                <div class="main-manufacturer-description text-center">
                    Наші засоби для очищення меблів та килимів виробляються відомою турецькою компанією,
                    що спеціалізується на створенні екологічно чистих та безпечних продуктів. Багаторічний досвід у розробці миючих засобів гарантує
                    високу якість та ефективність кожного продукту
                </div>
                <div class="row">
                    <div class="col-12 col-lg-5 main-manufacturer-card">
                        <div class="main-manufacturer-card-title"><img src="assets/img/seedling.png" alt="seedling">Екологічно чисте виробництво</div>
                        <div>
                            Виробничі процеси компанії відповідають міжнародним стандартам екологічної безпеки, забезпечуючи мінімальний вплив
                            на довкілля. Уся продукція проходить суворі перевірки, щоб гарантувати її безпеку для вашого дому.
                        </div>
                    </div>
                    <div class="col-0 col-lg-2"></div>
                    <div class="col-12 col-lg-5 main-manufacturer-card">
                        <div class="main-manufacturer-card-title"><img src="assets/img/direct-hit.png" alt="seedling">Якість та інновації</div>
                        <div>
                            Виробник постійно вдосконалює свої продукти, використовуючи інноваційні технології очищення.
                            Це дозволяє досягати найкращих результатів у догляді за меблями та килимами, не завдаючи шкоди матеріалам та довкіллю.
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 main-manufacturer-card">
                        <div class="main-manufacturer-card-title"><img src="assets/img/flag-turkey.png" alt="seedling">Вироблено в Туреччині</div>
                        <div>
                            Всі засоби виробляються в Туреччині з дотриманням високих європейських стандартів якості.
                            Турецькі виробники відомі своїм відповідальним підходом до екології та якості продукції
                        </div>
                    </div>
                    <div class="col-0 col-lg-2"></div>
                    <div class="col-12 col-lg-5 main-manufacturer-card">
                        <div class="main-manufacturer-card-title"><img src="assets/img/flag-european-union.png" alt="seedling">Міжнародні стандарти</div>
                        <div>
                            Продукція сертифікована згідно з міжнародними стандартами, що підтверджує її безпечність і ефективність.
                            Наші засоби не містять фосфатів (STTP) і є абсолютно безпечними для використання в будинку з дітьми і домашніми тваринами
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <section class="main-feedback d-flex align-items-center flex-column mb-200" id="feedback">
                <div class="main-title">Відгуки</div>
                <div class="row d-flex justify-content-center">
                    <div class="main-feedback-card col-11 col-lg-6">
                        <img src="assets/img/photo-reviews-1.png" alt="avatar" class="main-feedback-card-img">
                        <div class="main-feedback-card-title">Оксана, Київ.</div>
                        <div class="text-center">
                            Ми завжди використовуємо цей засіб для очищення наших меблів і килимів, і результат просто вражає! Безпечний для наших дітей і не
                            залишає слідів. Дуже економний — одного флакона вистачає надовго
                        </div>
                    </div>
                    <div class="main-feedback-card me-0 col-11 col-lg-6 mb-0">
                        <img src="assets/img/photo-reviews-2.png" alt="avatar" class="main-feedback-card-img">
                        <div class="main-feedback-card-title">Ірина, Львів.</div>
                        <div class="text-center">
                            У нас вдома є два домашніх улюбленця, і знайти безпечний засіб для очищення килимів було дуже складно.
                            Цей продукт став справжнім порятунком! Видаляє плями та запахи, і ми не переживаємо за здоров'я наших тварин.
                        </div>
                    </div>
                </div>
            </section>
        </div>
            <section class="main-order mb-200">
                <div class="main-order-bg d-flex align-items-center">
                    <div class="container d-flex align-items-center flex-column">
                        <div class="main-order-text text-center">
                            Замовте зараз та отримайте <span class="text-blue fw-bold">знижку 10%</span>
                            на перше замовлення! Безпечне та ефективне очищення вашого дому без зайвих зусиль
                        </div>
                        <button class="main-button" @click="openOrderModal">Замовити зі знижкою</button>
                    </div>
                </div>
            </section>
        <OrderModal ref="productModal"/>
    </main>
</template>

<script>

import OrderModal from "@/components/OrderModal.vue";
import {products} from "@/products.js";

export default {
    name: 'MainPage',
    components: {
        OrderModal
    },
    data() {
        return {
            showCover: false,
            products: products,
        }
    },
    methods: {
        openOrderModal(id = null) {
            this.$refs.productModal.openModal(id);
        },
    },
};
</script>

<style scoped lang="less">

.main {
    &-banner {
        background: url("img/main-banner.png") center no-repeat;
        height: 550px;
        color: #ffffff;
        border-radius: 15px;

        @media (max-width: 991px) {
            background: url("img/main-banner-mobile.png") center no-repeat;
            background-size: cover;
            height: unset;
            text-align: center;
            padding: 45px 15px;
            margin-bottom: -1px;
        }

        &-title {
            font-size: 55px;
            font-weight: 700;
            line-height: 105%;

            @media (max-width: 767px) {
               font-size: 28px;
            }
        }

        &-description {
            margin-top: 15px;
            font-size: 20px;
            font-weight: 400;
            margin-bottom: 40px;
            line-height: 26px;

            @media (max-width: 767px) {
                margin-bottom: 25px;
                font-size: 16px;
                line-height: 19.2px;
                margin-top: 7px;
            }
        }
    }

    &-button {
        border-radius: 80px;
        box-shadow: 0px 0px 30px 0px rgb(255, 217, 0);
        background: rgb(255, 217, 0);
        font-size: 20px;
        font-weight: 600;
        width: 300px;
        height: 60px;
        transition: .3s all ease;
        border: none;

        &:hover {
            background: rgb(255, 230, 90);
        }

        @media (max-width: 767px) {
            height: 45px;
            width: 220px;
            font-size: 16px;
            font-weight: 600;
            line-height: 19.2px;
            letter-spacing: 0.005em;
        }
    }

    &-title {
        font-size: 50px;
        line-height: 55px;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 50px;

        @media (max-width: 767px) {
            font-size: 28px;
            font-weight: 800;
            line-height: 30.8px;
        }
    }

    &-solution {
        img {
            margin-bottom: 20px;

            @media (max-width: 991px) {
                margin-bottom: 15px;
            }
        }

        &-card {
            padding: 35px 25px;
            border-radius: 15px;
            box-shadow: 0px 4px 30px 0px rgba(0, 0, 0, 0.1);
            background: rgb(255, 255, 255);
            text-align: center;
            height: 100%;

            @media (max-width: 991px) {
                padding: 35px 15px;
                box-shadow: 0px 4px 25px 0px #0000001A;
            }
        }

        .main-title {
            margin-bottom: 50px;

            @media (max-width: 991px) {
                margin-bottom: 35px;
            }
        }
    }

    &-switch {
        &-text {
            font-size: 26px;
            font-weight: 400;

            @media (max-width: 991px) {
                font-size: 16px;
            }
        }

        &-toggle {
            position: relative;
            display: inline-block;
            width: 120px;
            height: 27px;
            border: 1px solid rgb(55, 146, 219);
            border-radius: 50px;

            @media (max-width: 991px) {
                width: 96px;
                height: 22px;
            }

            &-slider {
                cursor: pointer;
                transition: .4s;
            }

            &-slider:before {
                position: absolute;
                content: "";
                width: 19px;
                height: 19px;
                top: 3px;
                left: 4px;
                transition: .4s;
                border-radius: 50%;
                background: rgb(55, 146, 219);

                @media (max-width: 991px) {
                    width: 16px;
                    height: 16px;
                    top: 2px;
                }
            }

            input:checked + &-slider:before {
                transform: translateX(92px);

                @media (max-width: 991px) {
                    transform: translateX(70px);
                }
            }
        }

        &-toggle input {
            opacity: 0;
            width: 0;
            height: 0;
        }
    }

    &-advantages {
        @media (max-width: 991px) {
            .main-title {
                margin-bottom: 90px!important;
            }
        }

        &-bg {
            background-image: url("assets/img/bg-advantages.png");
            position: relative;

            @media (max-width: 991px) {
                background: none;
            }
        }

        &-housewife {
            z-index: 2;
            margin: 64px 0 43px 68px;

            @media (min-width: 991px) and (max-width: 1199px) {
                opacity: 0;
                visibility: hidden;
            }

            @media (max-width: 991px) {
                margin: 25px 0 80px;
            }
        }

        &-card {
            border-radius: 20px;
            background: rgb(55, 146, 219);
            max-width: 388px;
            max-height: 254px;
            color: rgb(255, 255, 255);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 65px 20px 30px;
            position: absolute;

            @media (max-width: 991px) {
                position: relative;
                top: unset!important;
                bottom: unset!important;
                right: unset!important;
                left: unset!important;
                border-radius: 15px;
                max-width: unset;
                max-height: unset;
                padding: 65px 15px 30px;
            }

            &-img {
                width: 140px;
                height: 140px;
                position: absolute;
                top: -96px;

                @media (max-width: 991px) {
                    width: 110px;
                    height: 110px;
                    top: -55px;
                }
            }

            &-title {
                font-size: 24px;
                line-height: 105%;
                font-weight: 800;
                max-width: 215px;
                text-align: center;
                text-transform: uppercase;
                margin-bottom: 10px;
            }

            &-description {
                font-size: 17px;
                font-weight: 400;
                text-align: center;
            }
        }

        &-card1 {
            top: 120px;
            left: 33px;

            @media (max-width: 991px) {
                margin-bottom: 85px;
            }

            &-leaf1 {
                position: absolute;
                bottom: 4px;
                left: -40px;
                width: 65px !important;
                height: 72px !important;
            }

            &-bubble1 {
                position: absolute;
                top: 25px;
                left: 35px;
                width: 35px !important;
                height: 35px !important;
                transform: rotate(50deg);
            }
        }

        &-card2 {
            bottom: 0;
            left: 0;

            &-bubble1 {
                position: absolute;
                top: -60px;
                left: -60px;

                @media (max-width: 991px) {
                    width: 50px;
                    height: 52px;
                    top: -26px;
                    left: -10px;
                }
            }

            &-bubble2 {
                position: absolute;
                top: -32px;
                right: 30px;

                @media (max-width: 991px) {
                    width: 37px;
                    height: 39px;
                    top: 29px;
                    right: 28px;
                }
            }
        }

        &-card3 {
            top: 98px;
            right: 44px;

            @media (max-width: 991px) {
                margin-bottom: 85px;
            }

            &-leaf1 {
                position: absolute;
                top: -46px;
                right: 20px;
            }

            &-leaf2 {
                position: absolute;
                bottom: -45px;
                right: -12px;

                @media (max-width: 991px) {
                    filter: blur(2px);
                    width: 73px;
                    height: 48px;
                    right: 5px;
                    bottom: -27px;
                }
            }

            &-bubble1 {
                position: absolute;
                bottom: 16px;
                left: -52px;
            }
        }

        &-card4 {
            bottom: 45px;
            right: 0;

            &-bubble1 {
                position: absolute;
                bottom: -58px;
                right: -29px;

                @media (max-width: 991px) {
                    width: 58px;
                    height: 60px;
                    left: 20px;
                    bottom: -27px;
                }
            }
        }
    }

    &-catalog {
        &-container {
            @media (max-width: 991px) {
                margin-bottom: 30px;
            }
        }

        &-card {
            box-shadow: 0px 0px 30px 0px #0000001A;
            border-radius: 15px;
            padding: 40px 25px 35px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;

            &-discount {
                background: linear-gradient(95.64deg, #FFDE20 -48.28%, #FF2929 104.8%);
                font-size: 16px;
                font-weight: 600;
                line-height: 23px;
                padding: 6px 20px;
                border-radius: 0 15px 0 15px;
                color: white;
            }

            &-title {
                font-size: 24px;
                font-weight: 700;
                line-height: 27.6px;
                margin: 45px 0 16px;
            }

            &-description {
                font-size: 16px;
                font-weight: 400;
                line-height: 20.8px;
            }

            &-price {
                font-size: 26px;
                font-weight: 700;
                line-height: 36.4px;
                margin: 22px 0 30px;

                &-old {
                    font-size: 22px;
                    font-weight: 600;
                    line-height: 30.8px;
                    text-align: left;
                    position: relative;
                    margin-left: 21px;

                    &::after {
                        content: '';
                        position: absolute;
                        left: -4px;
                        top: calc(50% + 3px);
                        height: 2px;
                        width: calc(100% + 8px);
                        background-color: #FF0000;
                        transform: translateY(-50%);
                    }
                }
            }

            &-btn {
                border-radius: 80px;
                display: flex;
                width: 100%;
                align-items: center;
                justify-content: center;
                height: 55px;
                font-size: 17px;
                font-weight: 600;
                line-height: 20.4px;
                letter-spacing: 0.005em;
                color: #000000;
                border: none;
                background: #FFD900;
                transition: .3s all ease;

                &:hover {
                    background: #FFE65A;
                }
            }
        }
    }
    &-products {
        &-background {
            position: relative;

            @media(max-width: 991px) {
                background: url("assets/img/background-benefit-forest-mobile.jpeg") center no-repeat;
                background-size: cover;
                display: flex;
                align-items: center;
                flex-direction: column;
                border-radius: 15px;
            }

            &:after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: url("assets/img/background-benefit-forest.jpeg") center bottom no-repeat;
                background-size: cover;
                border-radius: 15px;
                z-index: -1;

                @media (max-width: 991px) {
                    display: none;
                }
            }

            .main-products-img {
                position: absolute;
                bottom: 0;
                right: 30px;
                width: 490px;
                height: 287px;

                @media (max-width: 1200px) {
                    width: 450px;
                    height: auto;
                    right: 0;
                }

                @media (max-width: 991px) {
                    position: relative;
                    bottom: unset;
                    right: unset;
                    width: 100%;
                    height: auto;
                    object-fit: contain;
                }
            }
        }

        &-container {
            display: flex;
            align-items: end;

            @media(max-width: 991px) {
                align-items: center;
                max-width: 290px;
            }

            &-text {
                padding: 47px 0 47px 50px;
                color: rgb(255, 255, 255);
                font-size: 24px;
                font-weight: 400;
                line-height: 135%;
                @media(max-width: 991px) {
                    padding: 50px 0 0 0;
                    max-width: 260px;
                    font-size: 22px;
                    font-weight: 400;
                    line-height: 130%;
                    text-align: center;
                    margin-bottom: 45px;
                }
            }
        }
    }

    &-manufacturer {
        background: url("assets/img/bg-manufacturer.png") center no-repeat;
        background-size: cover;
        padding: 70px 0;

        @media (max-width: 991px) {
            background: url("img/bg-manufacturer-mb.png") center no-repeat;
            background-size: 100% 100%;
            padding: 0;
        }

        .main-title {
            margin-bottom: 24px;
            max-width: 845px;
            text-align: center;
        }

        &-description {
            max-width: 765px;
            margin-bottom: 50px;

            @media(max-width: 991px) {
                margin-bottom: 35px;
            }
        }

        &-card {
            margin-bottom: 50px;
            text-align: center;

            @media(max-width: 991px) {
                margin-bottom: 30px;
            }

            &-title {
                font-size: 22px;
                font-weight: 600;
                line-height: 140%;
                margin-bottom: 10px;

                @media(max-width: 991px) {
                    font-weight: 700;
                    line-height: 110%;
                }

                img {
                    height: 31px;
                    margin-right: 5px;
                }
            }
        }
    }
    &-feedback {
        .main-title {
            margin-bottom: 118px;

            @media(max-width: 991px) {
                margin-bottom: 85px;
            }
        }
        &-card {
            padding: 40px 25px;
            border-radius: 15px;
            box-shadow: 0px 4px 30px 0px rgba(0, 0, 0, 0.1);
            background: rgb(255, 255, 255);
            max-width: 552px;
            margin-right: 36px;
            display: flex;
            align-items: center;
            flex-direction: column;
            position: relative;

            @media(max-width: 991px) {
                padding: 20px 15px;
                margin-bottom: 90px;
                margin-right: 0;
            }

            &-title {
                font-size: 22px;
                font-weight: 600;
                line-height: 145%;
                margin-bottom: 20px;
                margin-top: 68px;

                @media(max-width: 991px) {
                    margin-top: 25px;
                    margin-bottom: 10px;
                }
            }

            &-img {
                position: absolute;
                top: -60px;

                @media(max-width: 991px) {
                    width: 100px;
                    height: 100px;
                }
            }
        }
    }

    &-order {
        &-bg {
            background: url("assets/img/bg-promotional-offer.png") center no-repeat;
            background-size: cover;
            height: 510px;

            @media (max-width: 991px) {
                background: url("assets/img/bg-promotional-offer-mb.png") center no-repeat;
                background-size: cover;
                height: 311px;
            }
        }

        &-text {
            font-style: italic;
            font-size: 36px;
            font-weight: 400;
            line-height: 130%;
            max-width: 844px;
            margin-bottom: 40px;

            @media(max-width: 991px) {
                font-size: 22px;
                line-height: 125%;
            }
        }
    }
}
</style>
