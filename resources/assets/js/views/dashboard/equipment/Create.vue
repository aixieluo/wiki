<template>
    <div>
        <vue-head headTitle="装备"></vue-head>

        <vue-form>
            <template slot="title">
                <h5>创建</h5>
            </template>
            <template slot="buttons">
                <router-link to="/dashboard/equipment" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="create">
                    <div class="form-group" :class="{'has-error': form.errors.has('equipment_info_id')}">
                        <label class="col-sm-2 control-label">名称</label>
                        <div class="col-sm-10">
                            <multiselect
                                    :options="equipmentInfos"
                                    :searchable="true"
                                    placeholder="选择一件装备"
                                    label="name"
                                    track-by="id"
                                    @input="selectName"
                                    @open="form.errors.clear('equipment_info_id')">
                            </multiselect>
                            <span class="help-block" v-if="form.errors.has('equipment_info_id')">{{ form.errors.get('equipment_info_id') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('lv')}">
                        <label class="col-sm-2 control-label">等级</label>
                        <div class="col-sm-10">
                            <input type="number" name="lv" class="form-control" placeholder="选择输入一个1 - 10之间的数字" v-model="form.lv">
                            <span class="help-block" v-if="form.errors.has('lv')">{{ form.errors.get('lv') }}</span>
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
    import Form from '../../../core/Form'
    import Multiselect from 'vue-multiselect'

    export default {
        components: { Multiselect },
        data() {
            return {
                equipmentInfos: [],
                slots: {},
                attributes: {},
                form: new Form({
                    equipment_info_id: '',
                    lv: null,
                    resets: true
                })
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
            selectName(value) {
                if (value) {
                    this.form.equipment_info_id = value.id
                } else {
                    this.form.equipment_info_id = null
                }
            },
            create(event) {
                let formData = new FormData(event.target)

                formData.append('attributes', JSON.stringify(this.attributes))

                this.$http.post('equipment', formData)
                    .then(() => {
                        toastr.success('创建成功！')
                    })
            }
        }
    }
</script>

<style>

</style>