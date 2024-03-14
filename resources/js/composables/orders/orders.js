import { useToast } from "vue-toastification";
import { router } from "@inertiajs/vue3";
export default function useOrders() {

    const toast = useToast();
    const currentUser = window.User;
    const newStatus = async (order_id, status_id, service) => {

        const url = route('orders.change-status');
        if (status_id === 6 && service !== currentUser.service_id)
            return toast.error("Невозможно закрыть заказ: не твой сервис.");
        await router.put(url, {
            status: status_id,
            order_id: order_id
            }, {preserveState: true, preserveScroll: true, only: ['orders']} )
    }

    const storeOrder = async () => {
        return toast.success("Заказ успешно добавлен.");
    }

    return {
        newStatus,
        storeOrder
    }
}
