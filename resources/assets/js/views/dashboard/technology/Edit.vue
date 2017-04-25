<template>
    <div>
        <vue-head headTitle="科技"></vue-head>

        <vue-form>
            <template slot="buttons">
                <router-link to="/dashboard/technology" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="edit">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">科技类型（二级）</label>
                        <div class="col-sm-10">
                            <select name="technology_type_id" class="form-control" v-model="technology.technology_type_id">
                                <option v-for="technologyType in technologyTypes"
                                        :value="technologyType.id">
                                    {{ technologyType.content }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" v-model="technology.name">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">级别</label>
                        <div class="col-sm-10">
                            <select name="rank" class="form-control" v-model="technology.rank">
                                <option v-for="n in 3" :value="n">{{ n }}</option>
                            </select>
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
                technologyTypes: {},
                technology: {}
            }
        },
        mounted() {
            this.$http.get('technologyTypes')
                .then((Response) => {
                    this.technologyTypes = Response.data.data
                })
            this.$http.get('technology/' + this.$route.params.id + '/edit')
                .then((response) => {
                    this.technology = response.data.data
                })
        },
        methods: {
            edit(event) {

                this.$http.put('technology/' + this.$route.params.id, this.technology)
                    .then(() => {
                        toastr.success('修改成功！')

                        this.$router.push('/dashboard/technology')
                    })
            }
        }
    }
</script>

<style>

</style>