<template>
    <div id="app"
         class="flex flex-col flex-auto flex-shrink-0 min-h-screen antialiased text-black bg-white dark:bg-gray-800 dark:text-white">
        <Sidebar />
        <Header />
        <div class="h-full mb-10 ml-16 mt-14 md:ml-52">
            <slot />
        </div>
    </div>
</template>

<script>
import Sidebar from "./Sidebar.vue";
import Header from "./Header.vue";
export default {
    components: {
        Sidebar, Header
    }
}
</script>

<style scoped>

</style>
