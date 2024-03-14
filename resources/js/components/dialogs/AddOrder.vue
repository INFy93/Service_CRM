<template>
    <VueSidePanel
        v-model="isOpened"
        lock-scroll
        hide-close-btn
        width="900px"
    >
        <div class="ml-3">
            <Title>Добавить заказ</Title>
        </div>
        <div class="mt-4 ml-3 mr-3">
            <form @submit.prevent="form.post(route('orders.store'))" class="mt-3">
                <label class="block">
                    <span class="block mb-2 text-sm font-semibold text-gray-900">
                        Логин / ФИО
                    </span>
                </label>
                <input v-model="form.client_login"
                    type="text" class="mt-1 block w-full text-sm rounded-lg border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="Логин / ФИО"
                />
                <div class="text-sm text-red-500" v-if="form.errors.client_login">
                    {{ form.errors.client_login }}
                </div>
                <label class="block mt-3">
                    <span class="block mb-2 text-sm font-semibold text-gray-900">
                        Телефон
                    </span>
                </label>
                <input v-model="form.client_phone"
                       type="text" class="mt-1 block w-full text-sm rounded-lg border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       placeholder="+7xxxxxxxxxx"
                />
                <div class="text-sm text-red-500" v-if="form.errors.client_phone">
                    {{ form.errors.client_phone }}
                </div>
                <div class="mt-4 flex space-x-4 float-right">
                    <button
                        type="button"
                        class="inline-flex justify-items-end px-4 py-2 text-sm font-semibold text-blue-900 bg-red-300 border border-transparent rounded-md hover:bg-red-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-500"
                        @click="closeModal"
                    >
                        Закрыть
                    </button>
                    <button
                        class="inline-flex justify-end px-4 py-2 text-sm font-semibold text-blue-900 bg-blue-300 border border-transparent rounded-md hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-500"
                    >
                        Добавить
                    </button>
                </div>
            </form>
        </div>
    </VueSidePanel>
</template>

<script>
import { VueSidePanel } from 'vue3-side-panel';
import 'vue3-side-panel/dist/vue3-side-panel.css';
import Title from "../../Layouts/Elements/Title.vue";
import { useForm } from "@inertiajs/vue3";
import useDialogs from "../../composables/dialogs/dialog.js";
import useHelpers from "../../composables/helpers/helper.js";
import useOrders from "../../composables/orders/orders.js";
import {reactive} from "vue";
export default {
    components: {
        VueSidePanel, Title
    },
    setup() {
        const { isOpened, openModal, closeModal } = useDialogs();
        const { currentUser } = useHelpers();
        const { storeOrder } = useOrders();

        const form = useForm({
            status: 1,
            manager_id: currentUser.id,
            service: currentUser.service_id,
            product: '',
            product_complection: '',
            model: '',
            model_full_name: '',
            malfunction: '',
            appearance: '',
            client_login: '',
            client_phone: '',
        })

        const addOrder = async() => {
            await storeOrder();
            closeModal();
        }

        return {
            isOpened,
            form,
            openModal,
            closeModal,
            addOrder
        }
    }
}
</script>
