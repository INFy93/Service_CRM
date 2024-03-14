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
            <form @submit.prevent="" class="mt-3">
                <label class="block">
                    <span class="block mb-2 text-sm font-semibold text-gray-900">
                        Логин / ФИО
                    </span>
                </label>
                <input v-model="form.client_login"
                    type="text" class="mt-1 block w-full text-sm rounded-lg border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="Логин / ФИО"
                />
                <div>

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
            client_form: '',
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
