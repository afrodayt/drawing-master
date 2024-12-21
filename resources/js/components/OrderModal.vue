<template>
    <div>
        <div v-show="isVisible" class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="btn-close" @click="closeModal" aria-label="Close"></button>

                        <h5 class="modal-title" id="exampleModalLabel">Ваше замовлення</h5>
                    </div>
                    <div class="modal-body p-0">
                        <form @submit.prevent="submitOrder">
                            <div>
                                <label for="name-input" class="modal-label">Ім'я</label>
                                <input type="text" placeholder="Наприклад: Ірина" v-model="name" class="modal-input" required>
                            </div>
                            <div>
                                <label for="phone-input" class="modal-label">Телефон</label>
                                <input type="tel" v-model="phone" placeholder="+38 (___) ___-__-__" class="modal-input" required>
                            </div>
                            <div>
                                <label for="address-input" class="modal-label">Адреса доставки</label>
                                <input type="text" v-model="address" placeholder="Наприклад: місто Київ, відділення нової пошти 52" class="modal-input mb-50" required>
                            </div>
                            <div class="modal-form-title">Вибір продукту</div>
                            <div class="d-flex flex-column gap-4 mb-50">
                                <div class="d-flex justify-content-between" v-for="product in products" :key="'order-modal-product-' + product.id">
                                    <div class="d-flex align-items-center">
                                        <input :id="'product-checkbox' + product.id" type="checkbox" v-model="product.selected" @change="updateProductSelection(product)" class="modal-form-checkbox">
                                        <label :for="'product-checkbox' + product.id" class="modal-form-label"></label>
                                        <div class="modal-form-text">{{ product.productShortName }}</div>
                                    </div>
                                    <div class="d-flex align-items-center modal-form-calculate">
                                        <div class="modal-form-calculate-text">Кількість</div>
                                        <div class="d-flex align-items-center">
                                            <button class="modal-form-calculate-button" @click.prevent="minus(product.id)" :disabled="!product.selected || product.count <= 0">-</button>
                                            <input type="number" readonly v-model="product.count" :disabled="!product.selected" min="0" class="modal-form-calculate-input">
                                            <button class="modal-form-calculate-button" @click.prevent="plus(product.id)" :disabled="!product.selected">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-info mb-50">🚚 Доставка за тарифами нової пошти або укрпочти</div>
                            <div class="modal-summary mb-50">Сума до сплати: {{ summary }} <span class="modal-summary-small">грн</span></div>
                            <button type="submit" :disabled="loading || summary === 0" class="modal-btn">Оформити замовлення</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="isVisible" class="modal-backdrop fade show" @click="closeModal"></div>
    </div>
</template>

<script>
import {products} from "@/products.js";
import { EventBus } from '@/eventBus';

export default {
    name: 'OrderModal',
    data() {
        return {
            name: '',
            phone: '',
            address: '',
            summary: 0,
            isVisible: false,
            products: products,
            loading: false
        };
    },



    methods: {
        openModal(id) {
            if (id) {
                const product = this.products.find((product) => product.id === id);
                if (product) {
                    product.count += 1;
                    product.selected = true;
                    this.countSum();
                }
            }
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
            this.address = '';
            this.products.forEach(product => {
                product.count = 0;
                product.selected = false;
            });
            this.summary = 0;
        },
        plus(id) {
            const product = this.products.find(product => product.id === id);
            if (product) {
                product.count += 1;
            }
            this.countSum();
        },
        minus(id) {
            const product = this.products.find(product => product.id === id);
            if (product && product.count > 0) {
                product.count -= 1;
            }
            this.countSum();
        },
        countSum() {
            this.summary = this.products.reduce((total, product) => {
                if (product.selected && product.count > 0) {
                    return total + product.price * product.count;
                }
                return total;
            }, 0);
        },
        updateProductSelection(product) {
            if (!product.selected) {
                product.count = 0;
            }
            this.countSum();
        },
        async submitOrder() {
            this.loading = true;

            const leadData = {
                name: this.name,
                phone: this.phone,
                address: this.address,
                products: this.products,
                summary: this.summary.toString()
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
                        window.location.href = '/thank-you';
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
.mb-50 {
    margin-bottom: 50px !important;
    @media (max-width: 991px) {
        margin-bottom: 40px !important;
    }
}

.modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.5);
}

.btn-close {
    position: absolute;
    right: 25px;
    top: 25px;
}

.modal {
    &-dialog {
        max-width: 580px;
    }

    &-content {
        padding: 55px 40px;
        border-radius: 20px;
        border: unset;
        @media (max-width: 991px) {
            padding: 55px 15px;
        }
    }

    &-header {
        border: unset;
        flex-direction: column;
        padding: 0;
    }

    &-title {
        font-size: 32px;
        font-weight: 700;
        line-height: 125%;
        margin-bottom: 50px;

        @media (max-width: 991px) {
            font-size: 28px;
            margin-bottom: 35px;
        }
    }

    &-label {
        font-size: 16px;
        font-weight: 600;
        line-height: 22px;
        margin-bottom: 10px;
        @media (max-width: 991px) {
            font-size: 12px;
            margin-bottom: 8px;
        }
    }

    &-input {
        border: 1px solid rgb(194, 194, 194);;
        border-radius: 10px;
        background: rgb(255, 255, 255);
        padding: 14px;
        margin-bottom: 20px;
        width: 100%;
    }

    &-form {
        &-title {
            font-size: 18px;
            font-weight: 600;
            line-height: 25px;
            margin-bottom: 20px;
            @media (max-width: 991px) {
                font-size: 17px;
            }
        }
        &-checkbox {
            display: none;
            &:checked + .modal-form-label {
                background: rgb(55, 146, 219);
                border-color: rgb(55, 146, 219);
            }
            &:checked + .modal-form-label::after {
                content: '';
                position: absolute;
                top: 4px;
                left: 8px;
                width: 6px;
                height: 12px;
                border: solid white;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
                @media (max-width: 991px) {
                    top: 1px;
                    left: 6px;
                }
            }

        }
        &-label {
            width: 24px;
            height: 24px;
            border: 2px solid rgb(194, 194, 194);;
            border-radius: 4px;
            display: inline-block;
            position: relative;
            cursor: pointer;
            margin-right: 12px;
            @media (max-width: 991px) {
                width: 20px;
                height: 20px;
            }
        }
        &-text {
            font-size: 17px;
            font-weight: 400;
            line-height: 22px;
            width: 180px;
            @media (max-width: 991px) {
                font-size: 16px;
                width: 140px;
            }
        }
        &-calculate {
            &-input {
                width: 46px;
                height: 34px;
                border: 1px solid rgb(185, 185, 185);
                border-radius: 5px;
                @media (max-width: 991px) {
                    width: 38px;
                    height: 28px;
                }
            }
            &-text {
                font-size: 17px;
                font-weight: 400;
                line-height: 22px;
                margin-right: 22px;
                @media (max-width: 991px) {
                    display: none;
                }
            }
            &-button {
                border: unset;
                background: unset;
                font-size: 35px;
                font-weight: 400;
                color: rgb(55, 146, 219);
                padding: 0;
                margin-right: 14px;
                @media (max-width: 991px) {
                    margin-right: 3.5px;
                    width: 16px;
                    height: 19px;
                }

                &:disabled {
                    color: rgb(185, 185, 185);
                }

                &:last-child {
                    margin-right: 0;
                    margin-left: 14px;
                    @media (max-width: 991px) {
                        margin-left: 3.5px;
                    }
                }
            }
        }
    }
    &-info {
        border-radius: 15px;
        padding: 20px;
        background: rgb(213, 236, 255);
        font-size: 18px;
        font-weight: 600;
        line-height: 25px;
        @media (max-width: 991px) {
            font-size: 16px;
        }
    }
    &-summary {
        font-size: 26px;
        font-weight: 600;
        line-height: 35px;
        @media (max-width: 991px) {
            font-size: 22px;
        }

        &-small {
            font-size: 20px;
            line-height: 27px;
            @media (max-width: 991px) {
                font-size: 16px;
            }
        }
    }
    &-btn {
        border-radius: 80px;
        background: rgb(255, 217, 0);
        border: none;
        font-size: 17px;
        font-weight: 600;
        line-height: 120%;
        height: 55px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        @media (max-width: 991px) {
            font-size: 16px;
        }
    }
}
</style>
