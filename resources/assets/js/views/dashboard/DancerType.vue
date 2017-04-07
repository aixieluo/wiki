<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Wiki编辑</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="">首页</a>
                    </li>
                    <li>
                        <a href="">车型</a>
                    </li>
                    <li>
                        <strong>列表</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="display: flex;justify-content: space-between;align-items: center">
                            <h5>基本属性</h5>
                            <a href="dashboard" class="btn btn-primary">添加</a>
                        </div>

                        <div class="ibox-content">
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>车型</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="n in 5">
                                    <th>{{ n }}</th>
                                    <th>{{ n }}</th>
                                    <th>
                                        <a href="">修改</a>
                                    </th>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    //域名路由
    import {host, starIncrease} from "../../config/variables"

    export default {
        props: {

        },
        data() {
            return {
                types: {},
            }
        },
        mounted () {
//            this.ready();
        },
        methods: {
            ready() {
                this.$http.post('/api/admin/type/list', {}).then((response)=>{
                    this.types = response.data;
                });
            },
        },
        computed: {

        },
        watch: {

        },
    }
</script>