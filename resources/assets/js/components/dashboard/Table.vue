<template>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="display: flex;justify-content: space-between;align-items: center">
                        <h5>基本属性</h5>
                        <slot name="buttons"></slot>
                    </div>

                    <div class="ibox-content">
                        <table :class="tableClass" class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <template v-for="field in fields">
                                    <th :class="field.titleClass">{{ field.title ? field.title : '' }}</th>
                                </template>
                            </tr>
                            </thead>
                            <tbody>
                            <template v-if="items.length > 0">
                                <tr v-for="item in items">
                                    <template v-for="field in fields">
                                        <template v-if="isSpecialField(field.name)">
                                            <template v-if="field.name == '__actions'">
                                                <td :class="field.dataClass" class="actions">
                                                    <template v-for="action in itemActions">
                                                        <a @click="callAction(action.name, item)" :class="action.class">
                                                            <i :class="action.icon"></i>
                                                            {{ action.label }}
                                                        </a>
                                                    </template>
                                                </td>
                                            </template>
                                        </template>
                                        <template v-else>
                                            <td :class="field.dataClass">
                                                {{ item[field.name] }}

                                            </td>
                                        </template>
                                    </template>
                                </tr>
                            </template>
                            </tbody>
                        </table>

                        <table-pagination ref="pagination" v-on:loadPage="loadPage" v-if="showPagination && items.length > 0"></table-pagination>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import TablePagination from './TablePagination.vue'

    export default {
        props: {
            apiUrl: {
                type: String,
                required: true
            },
            tableClass: {
                type: String,
            },
            fields: {
                type: Array,
                required: true
            },
            itemActions: {
                type: Array,
            },
            showPagination: {
                type: Boolean,
                default: false
            }
        },
        data() {
            return {
                items: [],
                totalPage: 0,
                currentPage: 0,
                pagination: null
            }
        },
        mounted() {
            this.$parent.$on('reload', () => {
                this.loadData()
            })
        },
        created() {
            this.currentPage = this.$route.query.page
            this.loadData()
        },
        watch: {
            $route() {
                let pageNum = 1

                if (this.$route.query.page) {
                    pageNum = this.$route.query.page
                }

                this.loadPage(pageNum)
            }
        },
        components: {
            TablePagination
        },
        methods: {
            loadPage(page) {
                  if (page == 'prev') {
                      this.goPreviousPage()
                  } else if (page == 'next') {
                      this.goNextPage()
                  } else {
                      this.goPage(page)
                  }
            },
            loadData() {
                let url = this.apiUrl

                if (this.currentPage) {
                    let page = ''
                    if (url.indexOf('?') != -1) {
                        page = '&page='
                    } else {
                        page = '?page='
                    }
                    url = url + page + this.currentPage
                    this.$router.push(page + this.currentPage)
                }

                this.$http.get(url)
                    .then((response) => {
                        this.pagination = response.data
                        this.items = response.data.data
                        this.totalPage = response.data.last_page
                        this.currentPage = response.data.current_page

                        if (this.showPagination && this.items.length > 0) {
                            this.$nextTick(() => {
                                this.$refs.pagination.$data.pagination = this.pagination
                            })
                        }
                    });
            },
            goPreviousPage() {
                if (this.currentPage > 1) {
                    this.currentPage--
                    this.loadData()
                }
            },
            goNextPage() {
                if (this.currentPage < this.totalPage) {
                    this.currentPage++
                    this.loadData()
                }
            },
            goPage(page) {
                if (this.currentPage != page && (page > 0 && page <= this.totalPage)) {
                    this.currentPage = page
                    this.loadData()
                }
            },
            isSpecialField(name) {
                return name.slice(0, 2) === '__'
            },
            callAction(action, data) {
                this.$emit('table-action', action, data)
            }
        }
    }
</script>

<style>

</style>