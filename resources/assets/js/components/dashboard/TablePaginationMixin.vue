<script>
    export default {
        props: {
            disabledClass : {
                type: String,
                default() {
                    return 'disabled'
                }
            }
        },
        data() {
            return {
                pagination: null
            }
        },
        computed: {
            totalPage() {
                return this.pagination == null ? 0 : this.pagination.total_pages
            },
            isOnFirstPage() {
                return this.pagination == null ? false : this.pagination.current_page == 1
            },
            isOnLastPage() {
                return this.pagination == null ?　false : this.pagination.current_page == this.pagination.total_pages
            }
        },
        methods:　{
            loadPage(page) {
                this.$emit('loadPage', page)
            },
            isCurrentPage(page) {
                return page == this.pagination.current_page
            }
        }
    }
</script>