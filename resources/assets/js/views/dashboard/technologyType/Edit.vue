<template>
    <div>
        <vue-head headTitle="科技类型（二级）"></vue-head>

        <vue-form>
            <template slot="buttons">
                <router-link to="/dashboard/technologyType" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="edit">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">科技类别（一级）</label>
                        <div class="col-sm-10">
                            <select name="technology_category_id" class="form-control" v-model="technologyType.technology_category_id">
                                <option v-for="technologyCategory in technologyCategories"
                                        :value="technologyCategory.id">
                                    {{ technologyCategory.content }}
                            </option>
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="content" class="form-control" v-model="technologyType.content">
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
                technologyCategories: {},
                technologyType: {}
            }
        },
        mounted() {
            this.$http.get('technologyCategories')
                .then((Response) => {
                    this.technologyCategories = Response.data.data
                })
            this.$http.get('technologyType/' + this.$route.params.id + '/edit')
                .then((response) => {
                    this.technologyType = response.data.data
                })
        },
        methods: {
            edit(event) {

                this.$http.put('technologyType/' + this.$route.params.id, this.technologyType)
                    .then(() => {
                        toastr.success('修改成功！')

                        this.$router.push('/dashboard/technologyType')
                    })
            }
        }
    }
</script>

<style>

</style>