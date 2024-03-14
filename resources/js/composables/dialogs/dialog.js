import { ref } from "vue";
export default function useDialogs() {
    const isOpened = ref(false);

    function closeModal() {
        return isOpened.value = false;
    }

    function openModal() {
        return isOpened.value = true;
    }

    return {
        isOpened,
        closeModal,
        openModal
    };
}
