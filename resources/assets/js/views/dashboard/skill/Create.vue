<template>
    <div>
        <vue-head headTitle="辎械"></vue-head>

        <vue-form>
            <template slot="buttons">
                <router-link to="/dashboard/skill" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="create">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">名称</label>
                        <div class="col-sm-10">
                            <select name="skill_info_id" class="form-control">
                                <option v-for="skillInfo in skillInfos" :value="skillInfo.id">{{ skillInfo.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">等级</label>
                        <div class="col-sm-10">
                            <select name="lv" class="form-control">
                                <option v-for="n in 10" :value="n">Lv.{{ n }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">提升基础火力</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="fire_up" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">提升基础穿甲</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="penetrate_up" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">提升基础耐久</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="durable_up" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">提升基础装甲</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="armor_up" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">提升基础命中</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="hit_up" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">提升基础闪避</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="dodge_up" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">提升基础隐蔽</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="concealment_up" class="form-control">
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">提升基础侦查</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="spy_up" class="form-control">
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
                skillInfos: {},
            }
        },
        mounted() {
            this.$http.get('skillInfos')
                .then(Response => {
                    this.skillInfos = Response.data.data
                })
        },
        methods: {
            create(event) {
                let formData = new FormData(event.target)

                this.$http.post('skill', formData)
                    .then(() => {
                        toastr.success('创建成功！')

                        this.$router.push('/dashboard/skill')
                    })
            }
        }
    }
</script>

<style>

</style>