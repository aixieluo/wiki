<template>
    <div>
        <vue-head headTitle="稀有度"></vue-head>

        <vue-form>
            <template slot="buttons">
                <router-link to="/dashboard/rarity" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="create">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">稀有级别</label>
                        <div class="col-sm-10">
                            <input type="number" name="level" class="form-control" placeholder="例如1,2,3">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">稀有度</label>
                        <div class="col-sm-10">
                            <input type="text" name="content" class="form-control" placeholder="例如蓝，紫，橙">
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

                this.$http.post('rarity', formData)
                    .then(() => {
                        toastr.success('创建成功！')

                        this.$router.push('/dashboard/rarity')
                    })
            }
        }
    }
</script>

<style>

</style>