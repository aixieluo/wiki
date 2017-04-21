<template>
    <div>
        <vue-head headTitle="装备信息"></vue-head>

        <vue-form>
            <template slot="buttons">
                <router-link to="/dashboard/equipment" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="create">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">名称</label>
                        <div class="col-sm-10">
                            <select name="equipment_info_id" class="form-control">
                                <option v-for="rarity in rarities" :value="rarity.id">{{ rarity.content }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">描述</label>
                        <div class="col-sm-10">
                            <input type="text" name="describe" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">火力</label>
                        <div class="col-sm-10">
                            <input type="number" name="fire" class="form-control" v-model="attributes.fire">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">穿甲</label>
                        <div class="col-sm-10">
                            <input type="number" name="penetrate" class="form-control" v-model="attributes.penetrate">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">耐久</label>
                        <div class="col-sm-10">
                            <input type="number" name="durable" class="form-control" v-model="attributes.durable">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">装甲</label>
                        <div class="col-sm-10">
                            <input type="number" name="armor" class="form-control" v-model="attributes.armor">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">命中</label>
                        <div class="col-sm-10">
                            <input type="number" name="hit" class="form-control" v-model="attributes.hit">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">闪避</label>
                        <div class="col-sm-10">
                            <input type="number" name="dodge" class="form-control" v-model="attributes.dodge">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">隐蔽</label>
                        <div class="col-sm-10">
                            <input type="number" name="concealment" class="form-control" v-model="attributes.concealment">
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">侦查</label>
                        <div class="col-sm-10">
                            <input type="number" name="spy" class="form-control" v-model="attributes.spy">
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

        },
        methods: {
            create(event) {
                let formData = new FormData(event.target)

                this.$http.post('equipment', formData)
                    .then(() => {
                        toastr.success('创建成功！')

                        this.$router.push('/dashboard/equipment')
                    })
            }
        }
    }
</script>

<style>

</style>