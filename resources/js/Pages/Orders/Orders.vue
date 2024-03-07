<template>
    <Head>
        <title>Заказы</title>
    </Head>
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
                <td class="px-2 py-1 text-sm whitespace-no-wrap border-b border-gray-200 w-52">
                    <Menu as="div" class="relative inline-block text-left">
                        <div>
                            <MenuButton
                                class="inline-flex items-center px-4 py-1 text-xs font-medium leading-5 text-white rounded-lg"
                                :class="'bg-' + order.status.color">
                                {{ order.status.name }}
                                <ChevronDownIcon class="w-5 h-5 ml-2 -mr-1" aria-hidden="true" />
                            </MenuButton>
                        </div>
                        <Transition enter-active-class="transition duration-100 ease-out"
                                    enter-from-class="transform scale-95 opacity-0"
                                    enter-to-class="transform scale-100 opacity-100"
                                    leave-active-class="transition duration-75 ease-in"
                                    leave-from-class="transform scale-100 opacity-100"
                                    leave-to-class="transform scale-95 opacity-0">
                            <MenuItems
                                class="absolute left-0 z-10 w-56 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <div class="px-1 py-1">
                                    <MenuItem>
                                        <a
                                           class="block px-4 py-2 text-sm text-gray-700 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Новый</a>
                                    </MenuItem>
                                    <MenuItem>
                                        <a
                                           class="block px-4 py-2 text-sm text-gray-700 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">В
                                            работе</a>
                                    </MenuItem>
                                </div>
                                <div class="px-1 py-1">
                                    <MenuItem>
                                        <a
                                           class="block px-4 py-2 text-sm text-gray-700 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">На
                                            согласовании</a>
                                    </MenuItem>
                                    <MenuItem>
                                        <a
                                           class="block px-4 py-2 text-sm text-gray-700 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Ждет
                                            запчасть</a>
                                    </MenuItem>
                                </div>
                                <div class="px-1 py-1">
                                    <MenuItem>
                                        <a
                                           class="block px-4 py-2 text-sm text-gray-700 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Готов</a>
                                    </MenuItem>
                                    <MenuItem>
                                        <a
                                           class="block px-4 py-2 text-sm text-gray-700 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Закрыт</a>
                                    </MenuItem>
                                </div>
                                <div class="px-1 py-1">
                                    <MenuItem>
                                        <a
                                           class="block px-4 py-2 text-sm text-gray-700 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Отказ</a>
                                    </MenuItem>
                                </div>
                            </MenuItems>
                        </Transition>
                    </Menu>
                </td>
                <td class="px-2 py-1 text-sm whitespace-no-wrap border-b border-gray-200 w-52">
                    <div class="flex items-center">
                        <div>
                            <div class="text-sm font-medium leading-5 text-gray-700">
                                {{ order.user.name }}
                            </div>
                            <div class="text-sm leading-5 text-gray-500">
                                {{ formatDate(order.created_at, 'LL LT') }}
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
                <td class="px-2 py-1 text-sm whitespace-no-wrap border-b border-gray-200 w-52">
                    <div class="flex items-center">
                        <div>
                            <div class="text-sm font-medium leading-5 text-gray-700">
                                {{ order.client_login }}
                            </div>
                            <div class="text-sm leading-5 text-gray-500">
                                {{ nicePhone(order.client_phone) }}
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

</AppLayout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout.vue"
import Title from "../../Layouts/Elements/Title.vue";
import { router, Head } from "@inertiajs/vue3"
import {ref, watch} from "vue";
import useHelpers from "../../composables/helpers/helper.js";

import {DialogOverlay, Menu, MenuButton, MenuItem, MenuItems} from "@headlessui/vue"
import { ChevronDownIcon } from "@heroicons/vue/20/solid"
export default {
    components: {
        DialogOverlay,
        AppLayout, Title, Menu, MenuButton, MenuItem, MenuItems, ChevronDownIcon, Head
    },
    props: {
        orders: Object
    },

    setup() {
        const search = ref('');

        const url = route('orders.index');

        const { formatDate, leadingZeros, fromNow, nicePhone } = useHelpers();

        watch(search, async () => {
            await router.get(url, {search: search.value}, {preserveState: true, preserveScroll: true, only: ['orders']} )
        });

        return {
            search,
            formatDate,
            leadingZeros,
            fromNow,
            nicePhone
        }
    }

}
</script>

