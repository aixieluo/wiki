<template>
    <div>
        <vue-head headTitle="车型"></vue-head>

        <vue-form>
            <template slot="buttons">
                <router-link to="/dashboard/type" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="edit">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">车型</label>
                        <div class="col-sm-10">
                            <input type="text" name="content" class="form-control" v-model="type.content">
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
                type: {}
            }
        },
        mounted() {
            this.$http.get('type/' + this.$route.params.id + '/edit')
                .then((response) => {
                    this.type = response.data
                })
        },
        methods: {
            edit(event) {

                this.$http.put('type/' + this.$route.params.id, this.type)
                    .then(() => {
                        toastr.success('修改成功！')

                        this.$router.push('/dashboard/type')
                    })
            }
        }
    }
</script>

<style>

</style>