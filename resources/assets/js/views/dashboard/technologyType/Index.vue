<template>
    <div>
        <vue-head headTitle="科技类型（二级）">
            <li>
                <router-link to="/dashboard/technologyCategory">科技类别（一级）</router-link>
            </li>
            <li>
                <strong>{{ $route.query.gName }}</strong>
            </li>
        </vue-head>

        <vue-table :apiUrl="`technologyType/${$route.params.gId}`" :tableClass="tableClass" :fields="fields" :itemActions="itemActions"
                   @table-action="tableActions" showPagination>
            <template slot="buttons">
                <router-link :to="{path: `/dashboard/technologyCategory/${$route.params.gId}/technologyType/create`, query: {gName: $route.query.gName}}" class="btn btn-primary">创建</router-link>
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
                    this.$router.push({
                        path: `/dashboard/technologyCategory/${this.$route.params.gId}/technologyType/${data.id}/edit`,
                        query: {
                            gName: this.$route.query.gName
                        }
                    });
                } else if (action == 'delete-item') {
                    this.$http.delete('technologyType/' + data.id)
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
                        path: `/dashboard/technologyCategory/${this.$route.params.gId}/technologyType/${data.id}/technology`,
                        query: {
                            gName: this.$route.query.gName,
                            pName: data.name
                        }
                    });
                }
            }
        },
    }
</script>