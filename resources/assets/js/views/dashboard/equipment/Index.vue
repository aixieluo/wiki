<template>
    <div>
        <vue-head headTitle="装备">
            <li>
                <router-link to="/dashboard/equipmentInfo">装备</router-link>
            </li>
            <li>
                <strong>{{ $route.query.pName }}</strong>
            </li>
        </vue-head>

        <vue-table :apiUrl="`equipment/${$route.params.pId}`" :tableClass="tableClass" :fields="fields" :itemActions="itemActions"
                   @table-action="tableActions" showPagination>
            <template slot="buttons">
                <router-link :to="{path: `/dashboard/equipmentInfo/${$route.params.pId}/equipment/create`, query: {pName: $route.query.pName}}" class="btn btn-primary">创建</router-link>
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
                    name: 'lv',
                    title: '等级'
                    },
                    {
                        name: 'price',
                        title: '售价'
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
                        path: `/dashboard/equipmentInfo/${this.$route.params.pId}/equipment/${data.id}/edit`,
                        query: {
                            pName: this.$route.query.pName
                        }
                    });
                } else if (action == 'delete-item') {
                    this.$http.delete('equipment/' + data.id)
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