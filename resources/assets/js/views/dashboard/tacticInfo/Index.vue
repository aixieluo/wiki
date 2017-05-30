<template>
    <div>
        <vue-head headTitle="战术信息"></vue-head>

        <vue-table apiUrl="tacticInfo" :tableClass="tableClass" :fields="fields" :itemActions="itemActions"
                   @table-action="tableActions" showPagination>
            <template slot="buttons">
                <router-link to="/dashboard/tacticInfo/create" class="btn btn-primary">创建</router-link>
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
//                    {name: 'view-item', icon: 'fa fa-eye', class: 'btn btn-success btn-sm'},
                    {name: 'list-item', icon: 'fa fa-bars', class: 'btn btn-info btn-sm'},
                    {name: 'edit-item', icon: 'fa fa-edit', class: 'btn btn-warning btn-sm'},
                    {name: 'delete-item', icon: 'fa fa-trash', class: 'btn btn-danger btn-sm'}
                ]
            }
        },
        methods: {
            tableActions(action, data) {
                if (action == 'edit-item') {
                    this.$router.push('/dashboard/tacticInfo/' + data.id + '/edit');
                } else if (action == 'delete-item') {
                    this.$http.delete('tacticInfo/' + data.id)
                        .then((response) => {
                            toastr.success('删除成功！')
                            this.$emit('reload')
                        }).catch((error) => {
                            toastr.error(error.response.data.error.message)
                        })
                } else if (action == 'view-item') {
                    window.open('/', '_blank');
                } else if (action == 'list-item') {
                    this.$router.push({
                        path: `/dashboard/tacticInfo/${data.id}/tactic`,
                        query: {
                            pName: data.name
                        }
                    });
                }
            }
        },
    }
</script>