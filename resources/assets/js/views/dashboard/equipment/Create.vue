<template>
    <div>
        <vue-head headTitle="装备"></vue-head>

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
                                <option v-for="equipmentInfo in equipmentInfos" :value="equipmentInfo.id">{{ equipmentInfo.name }}</option>
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
                        <label class="col-sm-2 control-label">售价</label>
                        <div class="col-sm-10">
                            <input type="number" name="price" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">装备槽位</label>
                        <div class="col-sm-10">
                            <select name="slot_id" class="form-control">
                                <option v-for="slot in slots" :value="slot.id">{{ slot.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">是否为主槽位</label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="main" value="0" checked>否
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="main" value="1">是
                            </label>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">火力</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="fire" class="form-control" v-model.number="attributes.fire">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">穿甲</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="penetrate" class="form-control" v-model.number="attributes.penetrate">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">耐久</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="durable" class="form-control" v-model.number="attributes.durable">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">装甲</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="armor" class="form-control" v-model.number="attributes.armor">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">命中</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="hit" class="form-control" v-model.number="attributes.hit">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">闪避</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="dodge" class="form-control" v-model.number="attributes.dodge">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">隐蔽</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="concealment" class="form-control" v-model.number="attributes.concealment">
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">侦查</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="spy" class="form-control" v-model.number="attributes.spy">
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
                equipmentInfos: {},
                slots: {},
                attributes: {}
            }
        },
        mounted() {
            this.$http.get('equipmentInfos')
                .then(Response => {
                    this.equipmentInfos = Response.data.data
                })
            this.$http.get('slots')
                .then(Response => {
                    this.slots = Response.data.data
                })
        },
        methods: {
            create(event) {
                let formData = new FormData(event.target)

                formData.append('attributes', JSON.stringify(this.attributes))

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