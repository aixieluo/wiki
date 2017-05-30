<template>
    <div>
        <vue-head headTitle="战术">
            <li>
                <router-link to="/dashboard/tacticInfo">战术</router-link>
            </li>
            <li>
                <strong>{{ $route.query.pName }}</strong>
            </li>
        </vue-head>

        <vue-table :apiUrl="`tactic/${$route.params.pId}`" :tableClass="tableClass" :fields="fields" :itemActions="itemActions"
                   @table-action="tableActions" showPagination>
            <template slot="buttons">
                <router-link :to="{path: `/dashboard/tacticInfo/${$route.params.pId}/tactic/create`, query: {pName: $route.query.pName}}" class="btn btn-primary">创建</router-link>
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
                        path: `/dashboard/tacticInfo/${this.$route.params.pId}/tactic/${data.id}/edit`,
                        query: {
                            pName: this.$route.query.pName
                        }
                    });
                } else if (action == 'delete-item') {
                    this.$http.delete('tactic/' + data.id)
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