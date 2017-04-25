<template>
    <div>
        <vue-head headTitle="战术信息"></vue-head>

        <vue-form>
            <template slot="buttons">
                <router-link to="/dashboard/tacticInfo" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="edit">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" v-model="tacticInfo.name">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">描述</label>
                        <div class="col-sm-10">
                            <input type="text" name="describe" class="form-control" v-model="tacticInfo.describe">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button type="submit" class="btn btn-primary">保存内容</button>
                        </div>
                    </div>
                </form>
            </template>
        </vue-form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tacticInfo: {}
            }
        },
        mounted() {
            this.$http.get('tacticInfo/' + this.$route.params.id + '/edit')
                .then((response) => {
                    this.tacticInfo = response.data.data
                })
        },
        methods: {
            edit(event) {

                this.$http.put('tacticInfo/' + this.$route.params.id, this.tacticInfo)
                    .then(() => {
                        toastr.success('修改成功！')

                        this.$router.push('/dashboard/tacticInfo')
                    })
            }
        }
    }
</script>

<style>

</style>