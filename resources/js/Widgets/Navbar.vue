<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link
    },

    data() {
        return {
            routes: [
                {
                    label: 'Example page 1',
                    name: 'example1'
                },
                {
                    label: 'Example page 2',
                    name: 'example2'
                }
            ]
        }
    },

    methods: {
        isCurrent(aRoute) {
            return route().current(aRoute.name);
        }
    }
}

</script>


<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <Link class="navbar-brand" :href="route('example1')">
                <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                Example app
            </Link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li v-for="(currentRoute, index) in routes" class="nav-item" :key="index">
                        <Link class="nav-link" :class="{active: isCurrent(currentRoute)}" aria-current="page" :href="route(currentRoute.name)">
                            {{ currentRoute.label }}
                        </Link>
                    </li>
                </ul>
            </div>
            <span v-if="$page.props.auth.user" class="navbar-text me-2">
                {{ $page.props.auth.user.name }}
            </span>
            <span class="navbar-text">
                <form class="d-flex" v-if="$page.props.auth.user" :action="route('logout')" method="post">
                    <input type="hidden" name="_token" :value="$page.props.csrf_token">
                    <button class="btn btn-outline-secondary">
                        Log out
                    </button>
                </form>
            </span>
        </div>
    </nav>
</template>