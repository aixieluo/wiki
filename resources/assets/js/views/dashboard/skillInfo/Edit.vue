<template>
    <div>
        <vue-head headTitle="辎械信息"></vue-head>

        <vue-form>
            <template slot="buttons">
                <router-link to="/dashboard/skillInfo" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="edit">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" v-model="skillInfo.name">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">描述</label>
                        <div class="col-sm-10">
                            <input type="text" name="describe" class="form-control" v-model="skillInfo.describe">
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
                skillInfo: {}
            }
        },
        mounted() {
            this.$http.get('skillInfo/' + this.$route.params.id + '/edit')
                .then((response) => {
                    this.skillInfo = response.data.data
                })
        },
        methods: {
            edit(event) {

                this.$http.put('skillInfo/' + this.$route.params.id, this.skillInfo)
                    .then(() => {
                        toastr.success('修改成功！')

                        this.$router.push('/dashboard/skillInfo')
                    })
            }
        }
    }
</script>

<style>

</style>