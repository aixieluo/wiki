<template>
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>车型</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="type in types">
            <th>{{ type.id }}</th>
            <th>{{ type.type }}</th>
            <th>
                <a href="javascript:;">修改</a>
                <span>/</span>
                <a href="javascript:;">删除</a>
            </th>
        </tr>
        </tbody>
    </table>
</template>

<script>
    //域名路由
    import {host, starIncrease} from "../../public/variables"

    export default {
        props: {

        },
        data() {
            return {
                types: {},
            }
        },
        mounted () {
            this.ready();
        },
        methods: {
            ready() {
                this.$http.post(host+'/api/admin/type/list', {}).then((response)=>{
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