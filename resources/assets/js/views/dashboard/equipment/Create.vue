<template>
    <div>
        <vue-head headTitle="装备">
            <li>
                <router-link to="/dashboard/equipmentInfo">装备</router-link>
            </li>
            <li>
                <strong>{{ $route.query.pName }}</strong>
            </li>
        </vue-head>

        <vue-form>
            <template slot="title">
                <h5>创建</h5>
            </template>
            <template slot="buttons">
                <router-link :to="{path: `/dashboard/equipmentInfo/${$route.params.pId}/equipment`, query: {pName: $route.query.pName}}" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="create" @keydown="form.errors.clear($event.target.name)">
                    <div class="form-group" :class="{'has-error': form.errors.has('lv')}">
                        <label class="col-sm-2 control-label">等级</label>
                        <div class="col-sm-10">
                            <input type="number" name="lv" class="form-control" placeholder="输入一个1 - 10之间的数字" v-model="form.lv">
                            <span class="help-block" v-if="form.errors.has('lv')">{{ form.errors.get('lv') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('price')}">
                        <label class="col-sm-2 control-label">售价</label>
                        <div class="col-sm-10">
                            <input type="number" name="price" class="form-control" placeholder="如:100" v-model="form.price">
                            <span class="help-block" v-if="form.errors.has('price')">{{ form.errors.get('price') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <template v-for="item in attributeLabels">
                        <div class="form-group" :class="{'has-error': form.errors.has(item.name)}">
                            <label class="col-sm-2 control-label">{{ item.label }}</label>
                            <div class="col-sm-10">
                                <input type="number" step="0.01" :name="item.name" class="form-control" placeholder="如:100 (不填默认为0)" v-model="form[item.name]">
                                <span class="help-block" v-if="form.errors.has(item.name)">{{ form.errors.get(item.name) }}</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                    </template>

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
    import {attributeLabels} from '../../../config/variables'

    export default {
        data() {
            return {
                attributeLabels,
                form: new Form({
                    equipment_info_id: this.$route.params.pId,
                    lv: null,
                    price: null,
                    fire: null,
                    penetrate: null,
                    durable: null,
                    armor: null,
                    hit: null,
                    dodge: null,
                    concealment: null,
                    spy: null,
                    resets: true
                })
            }
        },
        methods: {
            create(event) {
                this.form.post('equipment')
                    .then(() => {
                        toastr.success('创建成功！')
                        this.form.equipment_info_id = this.$route.params.pId
                    })
            }
        }
    }
</script>

<style>

</style>