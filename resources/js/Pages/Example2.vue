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
            message: 'This is page 2'
        }
    }
}

</script>

<template>
    <Head title="Example page title" />

    <MainLayout>
        <h1>{{ message }}</h1>
        <Link :href="route('example1')">Go to page 1</Link>
    </MainLayout>
</template>
