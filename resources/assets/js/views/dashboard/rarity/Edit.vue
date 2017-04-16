<template>
    <div>
        <vue-head headTitle="稀有度"></vue-head>

        <vue-form>
            <template slot="buttons">
                <router-link to="/dashboard/rarity" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="edit">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">稀有级别</label>
                        <div class="col-sm-10">
                            <input type="number" name="level" class="form-control" v-model="rarity.level">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">稀有度</label>
                        <div class="col-sm-10">
                            <input type="text" name="content" class="form-control" v-model="rarity.content">
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
                rarity: {}
            }
        },
        mounted() {
            this.$http.get('rarity/' + this.$route.params.id + '/edit')
                .then((response) => {
                    this.rarity = response.data
                })
        },
        methods: {
            edit(event) {

                this.$http.put('rarity/' + this.$route.params.id, this.rarity)
                    .then(() => {
                        toastr.success('修改成功！')

                        this.$router.push('/dashboard/rarity')
                    })
            }
        }
    }
</script>

<style>

</style>