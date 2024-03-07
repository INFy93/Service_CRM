<template>
<AppLayout>
    <Title>Заказы</Title>
    <div v-if="orders.data"
         class="right-0 flex items-center w-full h-10 max-w-xl p-2 mb-2 bg-white border border-gray-200 rounded shadow-sm">
        <svg class="w-5 h-5 text-gray-500 cursor-pointer" fill="none" stroke-linecap="round" stroke-linejoin="round"
             stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
        <input type="text" v-model="search" name="" id="" placeholder="Логин, модель/полная модель, код заказа"
               class="w-full pl-3 text-sm text-black bg-transparent border-transparent border-none focus:border-transparent focus:outline-none focus:ring-0" />
    </div>
    <table class="w-full">
        <thead>
        <tr>
            <th
                class="px-2 py-4 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                №
            </th>
            <th
                class="px-2 py-1 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                Статус
            </th>
            <th
                class="px-2 py-1 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                Создан
            </th>
            <th
                class="px-2 py-1 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                Изделие
            </th>
            <th
                class="px-2 py-1 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                Модель
            </th>
            <th
                class="px-2 py-1 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                Комплектация
            </th>
            <th
                class="px-2 py-1 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                Неисправность
            </th>
            <th
                class="px-2 py-1 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                Клиент
            </th>
        </tr>
        </thead>
        <tbody>
            <tr class="transition-all number hover:bg-gray-200 duration-400" v-for="order in orders.data">
                <td class="px-2 py-1 text-sm whitespace-no-wrap border-b border-gray-200 w-20">{{order.service.service_code}}-{{ leadingZeros(order.id) }}</td>
                <td class="px-2 py-1 text-sm whitespace-no-wrap border-b border-gray-200 w-52">{{ order.status.name }} </td>
                <td class="px-2 py-1 text-sm whitespace-no-wrap border-b border-gray-200 w-52">
                    <div class="flex items-center">
                        <div>
                            <div class="text-sm font-medium leading-5 text-gray-700">
                                {{ order.user.name }}
                            </div>
                            <div class="text-sm leading-5 text-gray-500">
                                {{ formatDate(order.created_at, 'LLL') }}
                            </div>
                            <div class="flex flex-row space-x-1" v-if="order.status.status_id !== 6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ fromNow(order.created_at) }}</span>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-2 py-1 text-sm whitespace-no-wrap border-b border-gray-200 w-52">{{ order.product }} </td>
                <td class="px-2 py-1 text-sm whitespace-no-wrap border-b border-gray-200 w-52">{{ order.model }} </td>
                <td class="px-2 py-1 text-sm whitespace-no-wrap border-b border-gray-200 w-52">{{ order.product_complection }} </td>
                <td class="px-2 py-1 text-sm whitespace-no-wrap border-b border-gray-200 w-52">{{ order.malfunction }} </td>
                <td class="px-2 py-1 text-sm whitespace-no-wrap border-b border-gray-200 w-52">{{ order.client_login }} </td>
            </tr>
        </tbody>
    </table>
</AppLayout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout.vue"
import Title from "../../Layouts/Elements/Title.vue";
import {router } from "@inertiajs/vue3"
import {ref, watch} from "vue";
import useHelpers from "../../composables/helpers/helper.js";

import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue"
import { ChevronDownIcon } from "@heroicons/vue/20/solid"
export default {
    components: {
        AppLayout, Title, Menu, MenuButton, MenuItem, MenuItems, ChevronDownIcon
    },
    props: {
        orders: Object
    },

    setup() {
        const search = ref('');

        const url = route('orders.index');

        const { formatDate, leadingZeros, fromNow } = useHelpers();

        watch(search, async () => {
            await router.get(url, {search: search.value}, {preserveState: true, preserveScroll: true, only: ['orders']} )
        });

        return {
            search,
            formatDate,
            leadingZeros,
            fromNow
        }
    }

}
</script>

