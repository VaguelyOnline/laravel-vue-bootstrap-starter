<script>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

export default {
    components: {
        MainLayout,
        Head,
        Link
    },

    props: {
        initialNames: {
            required: true,
            type: Array
        }
    },

    data() {
        return {
            message: 'This is page 1',

            // Props ought to be readonly, clone array - see: https://vuejs.org/guide/components/props.html
            names: [...this.initialNames],

            loading: false
        }
    },

    methods: {
        getAnotherName() {
            this.loading = true;
            axios.get(route('api.name'))
                .then(response => this.names.push(response.data))
                
                // handle any AJAX errors
                .catch(error => {})

                // in any case (success or failure)...
                .then(() => this.loading = false)
        },

        removeNameAtIndex(index) {
            this.names.splice(index, 1);
        }
    }
}

</script>

<template>
    <Head title="Example page title" />

    <MainLayout>
        <h1>{{ message }}</h1>
        
        <Link class="btn btn-outline-secondary me-2" :href="route('example2')">Go to page 2</Link>

        <div class="row">
            <div class="col-6">
                <ul class="list-group mt-4">
                    <li class="list-group-item" v-for="(name, index) in names" :key="name">
                        {{ name }}

                        <button @click="removeNameAtIndex(index)" class="btn btn-sm btn-outline-danger float-end">
                            Remove
                        </button>
                    </li>  
                </ul>

                <button class="btn btn-outline-secondary mt-3" @click="getAnotherName">
                    Load another name through policy-protected API route 
                </button>
                <div v-if="loading" class="spinner-grow spinner-grow-sm" role="status"></div>

            </div>
        </div>
    </MainLayout>
</template>
