<template>
    <div>
        <vue-head headTitle="车型"></vue-head>

        <vue-table :tableClass="tableClass" :fields="fields" :items="items" :itemActions="itemActions" @table-action="tableActions">
            <template slot="buttons">
                <router-link to="/dashboard/dancer/create" class="btn btn-primary">创建</router-link>
            </template>
        </vue-table>


    </div>
</template>

<script>

    export default {
        props: {},
        data() {
            return {
                tableClass: 'table-text-center',
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
//                    {name: 'view-item', icon: 'fa fa-eye', class: 'btn btn-success btn-sm'},
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
                this.$http.get('type', {}).then((response) => {
                    this.items = response.data;
                });
            },
            tableActions(action, data) {
                if (action == 'edit-item') {
                    this.$router.push('/dashboard/dancers/' + data.id + '/edit');
                } else if (action == 'delete-item') {
                    this.$http.delete('type/' + data.id)
                        .then((response) => {
                            console.log(1);
                    })
                } else if (action == 'view-item') {
                    window.open('/', '_blank');
                }
            }
        },
        computed: {},
        watch: {},
    }
</script>