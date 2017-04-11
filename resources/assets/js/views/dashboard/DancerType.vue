<template>
    <div>
        <vue-head headTitle="车型"></vue-head>

        <vue-table :fields="fields" :items="items" :itemActions="itemActions" @table-action="tableActions">
            <template slot="buttons">
                <router-link to="/dashboard/dancer/create" class="btn btn-primary">创建</router-link>
            </template>
        </vue-table>


    </div>
</template>

<script>
    //域名路由
    import {host, starIncrease} from "../../config/variables"

    export default {
        props: {},
        data() {
            return {
                fields: [
                    {
                        name: 'id',
                        title: 'ID',
                        titleClass: 'width-5-percent'
                    },
                    {
                        name: 'type',
                        title: '车型'
                    },
                    {
                        name: '__actions',
                        title: '操作'
                    }
                ],
                itemActions: [
                    {name: 'view-item', icon: 'fa fa-eye', class: 'btn btn-success btn-sm'},
                    {name: 'edit-item', icon: 'fa fa-edit', class: 'btn btn-info btn-sm'},
                    {name: 'delete-item', icon: 'fa fa-trash', class: 'btn btn-danger btn-sm'}
                ],
                items: {}
            }
        },
        mounted () {
            this.ready();
        },
        methods: {
            ready() {
                this.$http.post('/api/admin/type/list', {}).then((response) => {
                    this.items = response.data;
                });
            },
            tableActions(action, data) {
                if (action == 'edit-item') {
                    this.$router.push('/dashboard/dancers/' + data.id + '/edit');
                } else if (action == 'delete-item') {
                    console.log('进行了删除命令');
                } else if (action == 'view-item') {
                    window.open('/', '_blank');
                }
            }
        },
        computed: {},
        watch: {},
    }
</script>