<template>
    <nav class="text-center">
        <ul class="pagination pagination-primary">
            <li :class="isOnFirstPage? disabledClass : ''">
                <a @click="loadPage('prev')">上一页</a>
            </li>
            <template v-for="n in totalPage">
                <li :class="isCurrentPage(n) ? 'active' : ''">
                    <a @click="loadPage(n)">{{ n }}</a>
                </li>
            </template>
            <li :class="isOnLastPage? disabledClass : ''">
                <a @click="loadPage('next')">下一页</a>
            </li>
        </ul>
    </nav>
</template>

<script>
    import PaginationMixin from './TablePaginationMixin.vue'

    export default {
        mixins: [PaginationMixin],
        methods: {
            loadPage(page) {
                this.$emit('loadPage', page)
            }
        }
    }
</script>

<style>

</style>

