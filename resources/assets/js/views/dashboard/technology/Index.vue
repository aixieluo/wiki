<template>
    <div>
        <vue-head headTitle="科技">
            <li>
                <router-link to="/dashboard/technologyCategory">科技类别（一级）</router-link>
            </li>
            <li>
                <strong>{{ $route.query.gName }}</strong>
            </li>
            <li>
                <router-link :to="{path: `/dashboard/technologyCategory/${$route.params.gId}/technologyType`, query: {gName: $route.query.gName}}">科技类型（二级）</router-link>
            </li>
            <li>
                <strong>{{ $route.query.pName }}</strong>
            </li>
        </vue-head>

        <vue-table :apiUrl="`technology/${$route.params.pId}`" :tableClass="tableClass" :fields="fields" :itemActions="itemActions"
                   @table-action="tableActions" showPagination>
            <template slot="buttons">
                <router-link :to="{path: `/dashboard/technologyCategory/${$route.params.gId}/technologyType/${$route.params.pId}/technology/create`, query: {gName: $route.query.gName, pName: $route.query.pName}}" class="btn btn-primary">创建</router-link>
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
                        name: 'place',
                        title: '位置'
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
                    {name: 'edit-item', icon: 'fa fa-edit', class: 'btn btn-warning btn-sm'},
                    {name: 'delete-item', icon: 'fa fa-trash', class: 'btn btn-danger btn-sm'}
                ]
            }
        },
        methods: {
            tableActions(action, data) {
                if (action == 'edit-item') {
                    this.$router.push({
                        path: `/dashboard/technologyCategory/${this.$route.params.gId}/technologyType/${this.$route.params.pId}/technology/${data.id}/edit`,
                        query: {
                            gName: this.$route.query.gName,
                            pName: this.$route.query.pName
                        }
                    });
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