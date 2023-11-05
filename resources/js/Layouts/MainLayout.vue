<script>

import Navbar from '@/Widgets/Navbar.vue'

export default {
    name: 'MainLayout',
    components: {
        Navbar
    }
}
    
</script>

<template>
    <div>
        <!-- Navbar -->
        <Navbar />

        <div class="container">
            
            <slot />
        </div>
    </div>
</template>