<script>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

export default {
    components: {
        MainLayout,
        Head,
        Link
    },
    data() {
        return {
            message: 'This is page 1'
        }
    }
}

</script>

<template>
    <Head title="Example page title" />

    <MainLayout>
        <h1>{{ message }}</h1>
        <Link :href="route('example2')">Go to page 2</Link>
    </MainLayout>
</template>
