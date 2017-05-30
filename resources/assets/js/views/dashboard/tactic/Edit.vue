<template>
    <div>
        <vue-head headTitle="战术">
            <li>
                <router-link to="/dashboard/tacticInfo">战术</router-link>
            </li>
            <li>
                <strong>{{ $route.query.pName }}</strong>
            </li>
        </vue-head>

        <vue-form>
            <template slot="title">
                <h5>编辑</h5>
            </template>
            <template slot="buttons">
                <router-link :to="{path: `/dashboard/tacticInfo/${$route.params.pId}/tactic`, query: {pName: $route.query.pName}}" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="edit" @keydown="form.errors.clear($event.target.name)">
                    <div class="form-group" :class="{'has-error': form.errors.has('lv')}">
                        <label class="col-sm-2 control-label">等级</label>
                        <div class="col-sm-10">
                            <input type="number" name="lv" class="form-control" placeholder="输入一个1 - 10之间的数字" v-model="form.lv">
                            <span class="help-block" v-if="form.errors.has('lv')">{{ form.errors.get('lv') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <template v-for="item in attributeLabels">
                        <div class="form-group">
                            <div class="col-sm-6" :class="{'has-error': form.errors.has(`${item.name}_up`)}">
                                <label class="col-sm-4 control-label">提升基础{{ item.label }}</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" :name="`${item.name}_up`" class="form-control" placeholder="不填默认0，表示没有提升" v-model="form[`${item.name}_up`]">
                                    <span class="help-block" v-if="form.errors.has(`${item.name}_up`)">{{ form.errors.get(`${item.name}_up`) }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6" :class="{'has-error': form.errors.has(`${item.name}_down`)}">
                                <label class="col-sm-4 control-label">降低装备{{ item.label }}至</label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01" :name="`${item.name}_down`" class="form-control" placeholder="不填默认1，表示没有降低" v-model="form[`${item.name}_down`]">
                                    <span class="help-block" v-if="form.errors.has(`${item.name}_down`)">{{ form.errors.get(`${item.name}_down`) }}</span>
                                </div>
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
                    tactic_info_id: this.$route.params.pId,
                    lv: null,
                    fire_up: null,
                    penetrate_up: null,
                    durable_up: null,
                    armor_up: null,
                    hit_up: null,
                    dodge_up: null,
                    concealment_up: null,
                    spy_up: null,
                    fire_down: null,
                    penetrate_down: null,
                    durable_down: null,
                    armor_down: null,
                    hit_down: null,
                    dodge_down: null,
                    concealment_down: null,
                    spy_down: null,
                })
            }
        },
        mounted() {
            this.$http.get('tactic/'+ this.$route.params.id + '/edit')
                .then(response => {
                    let data = response.data.data
                    for (let k in this.form.originalData) {
                        this.form[k] = data[k]
                    }
                })
        },
        methods: {
            edit(event) {
                this.form.put('tactic/' + this.$route.params.id)
                    .then(() => {
                        toastr.success('修改成功！')
                    })
            }
        }
    }
</script>

<style>

</style>