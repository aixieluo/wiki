<template>
    <div>
        <vue-head headTitle="战术信息"></vue-head>

        <vue-form>
            <template slot="buttons">
                <router-link to="/dashboard/tacticInfo" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="create">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">描述</label>
                        <div class="col-sm-10">
                            <input type="text" name="describe" class="form-control" placeholder="不填即暂无">
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
        methods: {
            create(event) {
                let formData = new FormData(event.target)

                this.$http.post('tacticInfo', formData)
                    .then(() => {
                        toastr.success('创建成功！')

                        this.$router.push('/dashboard/tacticInfo')
                    })
            }
        }
    }
</script>

<style>

</style>