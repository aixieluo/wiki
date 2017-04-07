<template>
    <div id="wrapper">
        <sidebar></sidebar>
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <navbar></navbar>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import Sidebar from '../components/dashboard/particals/Sidebar.vue'
    import Navbar from  '../components/dashboard/particals/Navbar.vue'
    import FooterBar from  '../components/dashboard/particals/FooterBar.vue'

    export default {
        components: {
            Sidebar,
            Navbar,
            FooterBar
        },

    }

</script>