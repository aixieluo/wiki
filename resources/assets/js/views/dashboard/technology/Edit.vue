<template>
    <div>
        <vue-head headTitle="科技">
            <li>
                <router-link to="/dashboard/technologyCategory">科技类别（一级）</router-link>
            </li>
            <li>
                <strong>{{ $route.query.gName }}</strong>
            </li>
            <li>
                <router-link to="/dashboard/technologyCategory">科技类型（二级）</router-link>
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
                <router-link :to="{path: `/dashboard/technologyCategory/${$route.params.gId}/technologyType/${$route.params.pId}/technology`, query: {gName: $route.query.gName, pName: $route.query.pName}}" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="edit" @keydown="form.errors.clear($event.target.name)">
                    <div class="form-group" :class="{'has-error': form.errors.has('name')}">
                        <label class="col-sm-2 control-label">名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" placeholder="如：耐寒防尘模块化引擎" v-model="form.name">
                            <span class="help-block" v-if="form.errors.has('name')">{{ form.errors.get('name') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('rank')}">
                        <label class="col-sm-2 control-label">阶级</label>
                        <div class="col-sm-10">
                            <input type="number" name="rank" class="form-control" placeholder="输入一个1 - 3之间的数字" v-model="form.rank">
                            <span class="help-block" v-if="form.errors.has('rank')">{{ form.errors.get('rank') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('row')}">
                        <label class="col-sm-2 control-label">行数</label>
                        <div class="col-sm-10">
                            <input type="number" name="row" class="form-control" placeholder="科技页面的实际行数（数字）（空着的也算）" v-model="form.row">
                            <span class="help-block" v-if="form.errors.has('row')">{{ form.errors.get('rank') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('column')}">
                        <label class="col-sm-2 control-label">列数</label>
                        <div class="col-sm-10">
                            <input type="number" name="column" class="form-control" placeholder="科技页面的实际列数（数字）（空着的也算）" v-model="form.column">
                            <span class="help-block" v-if="form.errors.has('column')">{{ form.errors.get('column') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('place')}">
                        <label class="col-sm-2 control-label">位置</label>
                        <div class="col-sm-10">
                            <input type="text" name="place" class="form-control" placeholder="如：3-2-1（非实际位置，空着的不算）" v-model="form.place">
                            <span class="help-block" v-if="form.errors.has('place')">{{ form.errors.get('place') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <template v-for="item in attributeLabels">
                        <div class="form-group" :class="{'has-error': form.errors.has(item.name)}">
                            <label class="col-sm-2 control-label">{{ item.label }}</label>
                            <div class="col-sm-10">
                                <input type="number" step="0.01" :name="item.name" class="form-control" placeholder="如:100" v-model="form[item.name]">
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
                    technology_type_id: this.$route.params.pId,
                    name: null,
                    rank: null,
                    row: null,
                    column: null,
                    place: null,
                    fire: null,
                    penetrate: null,
                    durable: null,
                    armor: null,
                    hit: null,
                    dodge: null,
                    concealment: null,
                    spy: null,
                })
            }
        },
        mounted() {
            this.$http.get('technology/' + this.$route.params.id + '/edit?include=attributes')
                .then((response) => {
                    let data = response.data.data
                    this.form.name = data.name
                    this.form.rank = data.rank
                    this.form.row = data.row
                    this.form.column = data.column
                    this.form.place = data.place
                    this.form.fire = data.attributes.data.fire
                    this.form.penetrate = data.attributes.data.penetrate
                    this.form.durable = data.attributes.data.durable
                    this.form.armor = data.attributes.data.armor
                    this.form.hit = data.attributes.data.hit
                    this.form.dodge = data.attributes.data.dodge
                    this.form.concealment = data.attributes.data.concealment
                    this.form.spy = data.attributes.data.spy
                })
        },
        methods: {
            edit(event) {
                this.form.put('technology/' + this.$route.params.id)
                    .then(() => {
                        toastr.success('创建成功！')
                    })
            }
        }
    }
</script>

<style>

</style>