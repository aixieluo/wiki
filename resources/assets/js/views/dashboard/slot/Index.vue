<template>
    <div>
        <vue-head headTitle="装备槽"></vue-head>

        <vue-table apiUrl="slot" :tableClass="tableClass" :fields="fields" :itemActions="itemActions"
                   @table-action="tableActions" showPagination>
            <template slot="buttons">
                <router-link to="/dashboard/slot/create" class="btn btn-primary">创建</router-link>
            </template>
        </vue-table>
    </div>
</template>

<script>
    export default {
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
                        name: 'name',
                        title: '名称'
                    },
                    {
                        name: 'created_at',
                        title: '创建时间'
                    },
                    {
                        name: '__actions',
                        title: '操作'
                    }
                ],
                itemActions: [
//                    {name: 'view-item', icon: 'fa fa-eye', class: 'btn btn-success'},
                    {name: 'edit-item', icon: 'fa fa-edit', class: 'btn btn-warning'},
                    {name: 'delete-item', icon: 'fa fa-trash', class: 'btn btn-danger'}
                ],
                items: {}
            }
        },
        methods: {
            tableActions(action, data) {
                if (action == 'edit-item') {
                    this.$router.push('/dashboard/slot/' + data.id + '/edit');
                } else if (action == 'delete-item') {
                    this.$http.delete('slot/' + data.id)
                        .then((response) => {
                            toastr.success('删除成功！')
                            this.$emit('reload')
                        })
                } else if (action == 'view-item') {
                    window.open('/', '_blank');
                }
            }
        },
    }
</script>