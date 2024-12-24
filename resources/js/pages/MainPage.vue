<template>
    <main class="main">
        <div class="banner mb-200">
            <HeaderComponent></HeaderComponent>
            <div class="container d-flex align-items-center flex-column">
                <div class="banner-title">
                    “Art washes away from the<br> soul the dust <br> of everyday life”
                </div>
                <div class="banner-description">
                    Pablo Picasso
                </div>
                <a href="#events" class="main-button">
                    View events
                </a>
            </div>
        </div>
        <div class="container">
            <div class="why mb-200 d-flex align-items-center flex-column">
                <div class="main-title">
                    Let’s get creative!<br>
                    Art classes for all
                </div>
                <div class="d-flex">
                    <div class="why-block">
                        <div class="why-block-title">
                            Visual arts & creative classes
                        </div>
                        <div class="why-block-description">
                            <img src="assets/img/icon-checkmark.png" alt="checkmark">
                            individual lessons
                        </div>
                        <div class="why-block-description">
                            <img src="assets/img/icon-checkmark.png" alt="checkmark">
                            group workshops for children and adults
                        </div>
                        <div class="why-block-description">
                            <img src="assets/img/icon-checkmark.png" alt="checkmark">
                            corporate events
                        </div>
                        <div class="why-block-description mb-0">
                            <img src="assets/img/icon-checkmark.png" alt="checkmark">
                            courses in the visual arts for all levels of training and much more
                        </div>
                    </div>
                    <div class="why-block me-0">
                        <div class="why-block-title">
                            Why me?
                        </div>
                        <div class="why-block-description">
                            <img src="assets/img/icon-checkmark.png" alt="checkmark">
                            professional experience teaching fine arts for over 12 years
                        </div>
                        <div class="why-block-description">
                            <img src="assets/img/icon-checkmark.png" alt="checkmark">
                            friendly and inspiring atmosphere at the classes
                        </div>
                        <div class="why-block-description">
                            <img src="assets/img/icon-checkmark.png" alt="checkmark">
                            provision of high quality materials
                        </div>
                        <div class="why-block-description">
                            <img src="assets/img/icon-checkmark.png" alt="checkmark">
                            individual approach to each student
                        </div>
                        <div class="why-block-description">
                            <img src="assets/img/icon-checkmark.png" alt="checkmark">
                            flexible schedule
                        </div>
                        <div class="why-block-description mb-0">
                            <img src="assets/img/icon-checkmark.png" alt="checkmark">
                            convenient location
                        </div>
                    </div>
                </div>
                <a href="#contact" class="main-button">Contact us</a>
            </div>
            <div class="events mb-200" id="events">
                <div class="main-title">Upcoming events</div>
                <div class="f-carousel" id="myCarousel">
                    <div class="f-carousel__viewport">
                        <div class="f-carousel__track">
                            <div class="f-carousel__slide" v-for="event in events" v-if="expiredEvent(event.date)">
                                <div class="events-block">
                                    <img :src="'assets/img/'+ event.img" alt="event.img" class="events-block-img">
                                    <div class="events-block-container d-flex flex-column">
                                        <div class="events-block-title">{{ event.eventName }}</div>
                                        <div class="events-block-information">
                                            <img src="assets/img/icon-date.png" alt="date">
                                            {{ event.day }} {{ event.startDate }} {{ getFormatedDate(event.date) }},
                                            {{ event.time }}
                                        </div>
                                        <div class="events-block-information">
                                            <img src="assets/img/icon-price.png" alt="price">
                                            ${{ event.price }}
                                        </div>
                                        <div class="events-block-information mb-0">
                                            <img src="assets/img/icon-location.png" alt="location">
                                            {{ event.location }}
                                        </div>
                                        <div class="events-block-description">{{ event.description }}</div>
                                        <button class="main-button" @click="openEventModal(event.id)">Sign up</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gallery d-flex align-items-center flex-column mb-200">
                <div class="main-title">GALLERY</div>
                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    <button
                        class="gallery-btn btn btn-outline-primary"
                        :class="{ active: studentWorks }"
                        @click="studentWorks = !studentWorks"
                    >
                        student artwork
                    </button>
                    <button
                        class="gallery-btn btn btn-outline-primary"
                        :class="{ active: !studentWorks }"
                        @click="studentWorks = !studentWorks"
                    >
                        my artwork
                    </button>
                </div>
                <div v-if="studentWorks">
                    <Fancybox
                        :options="{
                            Carousel: {
                              infinite: false,
                            },
                         }"
                    >
                        <div class="gallery-wrapper">
                            <a v-for="(img, index) in images.student" class="gallery-item" data-fancybox="gallery-students" :href="img">
                                <img
                                    :src="img"
                                    :alt="'students-paintings'+index"
                                    class="adaptive-img"
                                />
                            </a>
                        </div>
                    </Fancybox>
                </div>
                <div v-else>
                    <Fancybox
                        :options="{
                            Carousel: {
                              infinite: false,
                            },
                         }"
                    >
                        <div class="gallery-wrapper">
                            <a v-for="(img, index) in images.my" class="gallery-item" data-fancybox="gallery-my" :href="img">
                                <img
                                    :src="img"
                                    :alt="'my-paintings'+index"
                                    class="adaptive-img"
                                />
                            </a>
                        </div>
                    </Fancybox>
                </div>
            </div>
            <div class="about mb-200">
                <div class="row">
                    <div class="col-6 mb-">
                        <div class="main-title">About me</div>
                        <div class="about-description">
                            Good to see you here! My name is Alevtyna, I am a professional fine arts teacher
                            based in Calgary. I am continuously inspired by world we live in and can never resist
                            putting this beauty
                            on a canvas.
                        </div>
                        <div class="about-description">
                            My preferred art style is realism and I have academic knowledge and practical experience of
                            applying it in
                            painting, drawing, and compositions. Along with my students I work on creating portraits,
                            landscapes,
                            architecture stills, and a lot more.
                        </div>
                        <div class="about-description">
                            However, I’m always open to exploring new styles, approaches, and techniques. I believe that
                            there are
                            limitless possibilities when it comes to art and I want to inspire my students to experiment
                            and express
                            themselves.
                        </div>
                        <div class="about-description">
                            Let’s get creative!
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-5">
                        <img src="assets/img/photo-about-the-author.png" alt="photo-about-the-author"
                             class="adaptive-img">
                    </div>
                </div>
            </div>
        </div>
        <div class="subscribe mb-200 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-5">
                        <div class="subscribe-title">Subscribe Our Newsletter</div>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-6 d-flex align-items-end">
                        <div class="input-group">
                            <input type="text" class="subscribe-input form-control" placeholder="enter your email"
                                   aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="subscribe-button btn btn-outline-secondary" type="button" id="button-addon2">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="message mb-200" id="contact">
                <div class="row">
                    <div class="col-5">
                        <img src="assets/img/paint-photo.png" alt="paint-photo" class="adaptive-img">
                    </div>
                    <div class="col-2"></div>
                    <div class="col-5">
                        <div class="main-title">Let’s get in touch</div>
                        <form class="d-flex flex-column">
                            <label for="name" class="message-label">
                                Name<span class="required">*</span>
                            </label>
                            <input type="text" id="name" v-model="form.name" class="message-input" required/>
                            <label for="email" class="message-label">
                                Email<span class="required">*</span>
                            </label>
                            <input type="email" id="email" v-model="form.email" class="message-input" required/>
                            <label for="message" class="message-label">
                                Add Your Message<span class="required">*</span>
                            </label>
                            <textarea id="message" v-model="form.message" class="message-input message-input-text"
                                      required></textarea>
                            <button type="submit" :disabled="!isFormValid" class="message-button">Send</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="faq mb-200">
                <div class="row">
                    <div class="col-6">
                        <div class="main-title">Frequently asked questions</div>
                    </div>
                    <div class="col-6">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                        What if I don’t have any experience with painting?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Don’t worry! I will find an individual approach to each student based on their
                                        level of experience.»
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                        Do I need to bring my own materials or supplies ?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        All materials and supplies are included in the cost of the workshop. The high
                                        quality
                                        of the materials provided is guaranteed.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-0">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                        What if I can't complete the work in the allotted time or draw it faster?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        The average length of the class is 3 hours, but of course students can work at
                                        different paces.
                                        I will monitor the process so that you have a finished work. The remaining time
                                        can be spent
                                        socializing with other students, having drinks and snacks).
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <OrderModal ref="productModal"/>
        <thank-you-modal></thank-you-modal>
    </main>
</template>

<script>
import moment from "moment";
import {events} from "@/events.js";
import HeaderComponent from "@/components/HeaderComponent.vue";
import {Carousel} from "@fancyapps/ui/dist/carousel/carousel.esm.js";
import {Autoplay} from "@fancyapps/ui/dist/carousel/carousel.autoplay.esm.js";
import {EventBus} from "@/eventBus.js";
import OrderModal from "@/components/OrderModal.vue";
import ThankYouModal from "@/components/ThankYouModal.vue";

import Fancybox from "@/components/FancyBox.vue";

export default {
    name: "MainPage",
    components: {
        Fancybox,
        ThankYouModal,
        HeaderComponent,
        OrderModal,
    },
    data() {
        return {
            events: events,
            studentWorks: true,
            form: {
                name: "",
                email: "",
                message: "",
            },
            images: {
                student: [
                    "assets/img/gallery/student_artwork/IMG_0552.JPG",
                    "assets/img/gallery/student_artwork/IMG_1014.jpg",
                    "assets/img/gallery/student_artwork/IMG_1819.jpg",
                    "assets/img/gallery/student_artwork/IMG_3963.jpg",
                ],
                my : [
                    "assets/img/gallery/my_artwork/IMG_3931.jpg",
                    "assets/img/gallery/my_artwork/IMG_5363.jpg",
                    "assets/img/gallery/my_artwork/IMG_1469.JPG",
                    "assets/img/gallery/my_artwork/IMG_7640.jpg",
                ]
            }
        };
    },
    computed: {
        isFormValid() {
            return this.form.name.trim() !== "" &&
                this.form.email.trim() !== "" &&
                this.form.message.trim() !== "";
        },
    },
    methods: {
        getFormatedDate(date) {
            return moment(date).format("MMMM D");
        },
        expiredEvent(date) {
            const eventDate = moment(date, "YYYY-MM-DD");
            const tomorrow = moment().add(1, "days");
            return !tomorrow.isAfter(eventDate);
        },
        openEventModal(id) {
            this.$refs.productModal.openModal(id);
        },
    },
    mounted() {
        const container = document.getElementById("myCarousel");
        const options = {

            slidesPerPage: 2,
            center: false,
            Autoplay: {
                timeout: 3000,
            },
        };

        new Carousel(container, options, {Autoplay});
    }
};
</script>

<style scoped lang="less">
@import "@fancyapps/ui/dist/carousel/carousel.autoplay.css";

.f-carousel {
    --f-carousel-slide-width: calc((100% - 40px) / 2);
    --f-carousel-spacing: 40px;
    --f-carousel-dot-color: rgb(255, 141, 60) !important;
    --f-carousel-dot-height: 12px;
    --f-carousel-dot-width: 12px;
    --f-button-prev-pos: -40px;
    --f-button-next-pos: -40px;
    --f-button-width: 45px;
    --f-button-height: 45px;
    --f-button-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.1);
    --f-button-border-radius: 50%;


    @media (max-width: 991px) {
        --f-carousel-slide-width: 100%;
        --f-carousel-spacing: 10px;
    }

    &__viewport {
        padding: 20px;
    }

    &-slide {
        margin: -20px;
    }

    ::v-deep .f-progress {
        display: none!important;
    }
}

.main-title {
    font-family: "Bodoni Moda", serif;
    font-size: 70px;
    font-weight: 400;
    line-height: 105%;
    text-align: center;
    text-transform: uppercase;
}

.main-button {
    width: 280px;
    height: 60px;
    border-radius: 80px;
    background: rgb(255, 183, 133);
    color: rgb(0, 0, 0);
    font-family: Montserrat, serif;
    font-size: 22px;
    font-weight: 500;
    line-height: 120%;
    border: none;
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none;
}


.banner {
    background: url("assets/img/bg-main-banner.png") center bottom no-repeat;
    background-size: cover;
    height: 700px;

    &-title {
        color: rgb(255, 255, 255);
        margin-top: 77px;
        margin-bottom: 21px;
        font-family: "Bodoni Moda", serif;
        font-size: 69px;
        font-weight: 700;
        line-height: 100%;
        text-align: center;
        text-transform: uppercase;
        font-style: italic;
    }

    &-description {
        color: rgb(255, 255, 255);
        font-family: Montserrat, serif;
        font-size: 30px;
        font-weight: 400;
        line-height: 120%;
        margin-bottom: 60px;
    }
}

.why {
    &-block {
        margin-top: 50px;
        margin-right: 40px;
        border-radius: 50px;
        box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.1);
        background: rgb(255, 255, 255);
        padding: 40px 30px;
        margin-bottom: 30px;

        &-title {
            font-family: Montserrat, serif;
            font-size: 20px;
            font-weight: 600;
            line-height: 145%;
            margin-bottom: 25px;
        }

        &-description {
            font-family: Montserrat, serif;
            font-size: 20px;
            font-weight: 400;
            line-height: 150%;
            display: flex;
            gap: 10px;
            align-items: start;
            margin-bottom: 15px;
        }
    }
}

.events {
    &-block {
        border-radius: 50px;
        box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.1);
        background: rgb(255, 255, 255);


        &-img {
            object-fit: cover;
            height: 400px;
            width: 100%;
            border-radius: 50px 50px 0 0;
        }

        &-container {
            padding: 30px 30px 40px 30px;

            .main-button {
                width: unset;
            }
        }

        &-title {
            font-family: Bodoni Moda, serif;
            font-size: 36px;
            font-weight: 400;
            line-height: 115%;
            margin-bottom: 20px;
        }

        &-description, &-information {
            font-family: Montserrat, serif;
            font-size: 15px;
            font-weight: 400;
            line-height: 150%;
            margin-bottom: 7px;
        }

        &-description {
            margin-bottom: 30px;
            margin-top: 15px;
        }
    }
}

.gallery {
    &-wrapper {
        display: grid;
        grid-template-areas:
        "photo1 photo2 photo3"
        "photo4 photo4 photo3";
        gap: 25px;
        grid-template-columns: 1fr 1fr 1fr;
    }

    &-item {
        border-radius: 50px;
        overflow: hidden;
    }

    &-item:nth-child(1) {
        grid-area: photo1;

        img {
            height: 292px;
            object-fit: cover;
        }
    }

    &-item:nth-child(2) {
        grid-area: photo2;

        img {
            height: 292px;
            object-fit: cover;
        }
    }

    &-item:nth-child(3) {
        grid-area: photo3;

        img {
            height: 100%;
            object-fit: cover;
        }
    }

    &-item:nth-child(4) {
        grid-area: photo4;

        img {
            height: 292px;
            object-fit: cover;
        }

    }

    &-btn {
        margin-top: 50px;
        margin-bottom: 30px;
        background: transparent;
        color: rgb(0, 0, 0) !important;
        font-family: Montserrat, serif;
        font-size: 22px;
        font-weight: 400;
        line-height: 110%;
        padding: unset;
        width: 239px;
        height: 45px;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid rgb(255, 201, 139);
        transition: background-color 0.3s ease, color 0.3s ease;

        &.active {
            background: rgb(255, 201, 139) !important;
            border: none;
        }

        &:first-of-type {
            border-radius: 90px 0 0 90px;
        }

        &:last-of-type {
            border-radius: 0 90px 90px 0;
        }
    }
}

.about {
    .main-title {
        margin-bottom: 30px;
        text-align: left;
    }

    &-description {
        font-family: Montserrat, serif;
        font-size: 17px;
        font-weight: 400;
        line-height: 150%;
        margin-bottom: 15px;
    }
}

.subscribe {
    background: url("assets/img/subscribe-to-the-newsletter.png") center no-repeat;
    background-size: cover;
    height: 227px;

    &-title {
        font-family: Bodoni Moda, serif;
        font-size: 54px;
        font-weight: 400;
        line-height: 90%;
    }

    &-input {
        border: 1px solid rgb(255, 183, 133);
        border-radius: 50px;
        background: rgb(255, 255, 255);
        color: rgb(89, 89, 89);
        font-family: Montserrat, serif;
        font-size: 16px;
        font-weight: 500;
        line-height: 20px;
        padding: 16px 26px 16px 16px;

        &:focus {
            box-shadow: none;
            z-index: 1;
        }
    }

    &-button {
        color: black;
        border: none;
        right: 25px;
        border-radius: 50px !important;
        background: rgb(255, 183, 133);
        font-family: Montserrat, serif;
        font-size: 22px;
        font-weight: 500;
        line-height: 120%;
        padding: 15px 68px;
    }
}

.message {
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

    .main-title {
        text-align: left;
    }
}

.faq {
    .main-title {
        text-align: left;
    }

    .accordion-item, .accordion-header, .accordion-button {
        background: rgb(255, 183, 133);
        border-radius: 40px !important;
        border: none !important;
        box-shadow: none;
    }

    .collapsed {
        border-radius: 40px !important;
        border: none !important;
        box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.1);
        background: rgb(255, 255, 255);
        padding: 40px 35px !important;

    }

    .accordion-button {
        font-family: Bodoni Moda, serif;
        font-size: 34px !important;
        font-weight: 400 !important;
        line-height: 100% !important;
        padding: 40px 35px 0 35px;
    }

    .accordion-body {
        font-family: Montserrat, serif;
        font-size: 17px;
        font-weight: 400;
        line-height: 140%;
        padding: 40px 35px;
    }

    .accordion-item {
        margin-bottom: 30px;
    }
}
</style>
