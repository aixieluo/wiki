<template>
    <div>
        <vue-head headTitle="科技类型（二级）"></vue-head>

        <vue-form>
            <template slot="buttons">
                <router-link to="/dashboard/technologyType" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="create">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">科技类别（一级）</label>
                        <div class="col-sm-10">
                            <select name="technology_category_id" class="form-control">
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
                            <input type="text" name="content" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">1级大件总数</label>
                        <div class="col-sm-10">
                            <input type="number" name="amount1" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">2级大件总数</label>
                        <div class="col-sm-10">
                            <input type="number" name="amount2" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">3级大件总数</label>
                        <div class="col-sm-10">
                            <input type="number" name="amount3" class="form-control">
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
        data(){
            return {
                technologyCategories: {}
            }
        },
        mounted() {
            this.$http.get('technologyCategories')
                .then((Response) => {
                    this.technologyCategories = Response.data.data
                })
        },
        methods: {
            create(event) {
                let formData = new FormData(event.target)

                this.$http.post('technologyType', formData)
                    .then(() => {
                        toastr.success('创建成功！')

                        this.$router.push('/dashboard/technologyType')
                    })
            }
        }
    }
</script>

<style>

</style>