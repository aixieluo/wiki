<template>
    <div>
        <vue-head headTitle="科技"></vue-head>

        <vue-table apiUrl="technology" :tableClass="tableClass" :fields="fields" :itemActions="itemActions"
                   @table-action="tableActions" showPagination>
            <template slot="buttons">
                <router-link to="/dashboard/technology/create" class="btn btn-primary">创建</router-link>
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
                        name: 'rank',
                        title: '级别'
                    },
                    {
                        name: 'technology_category',
                        title: '科技类别（一级）'
                    },
                    {
                        name: 'technology_type',
                        title: '科技类型（二级）'
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
                    {name: 'edit-item', icon: 'fa fa-edit', class: 'btn btn-info'},
                    {name: 'delete-item', icon: 'fa fa-trash', class: 'btn btn-danger'}
                ],
                items: {}
            }
        },
        methods: {
            tableActions(action, data) {
                if (action == 'edit-item') {
                    this.$router.push('/dashboard/technology/' + data.id + '/edit');
                } else if (action == 'delete-item') {
                    this.$http.delete('technology/' + data.id)
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