<template>
    <div>
        <vue-head headTitle="钢舞姬"></vue-head>

        <vue-form>
            <template slot="title">
                <h5>编辑</h5>
            </template>
            <template slot="buttons">
                <router-link to="/dashboard/dancer" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="edit" @keydown="form.errors.clear($event.target.name)">
                    <div class="form-group" :class="{'has-error': form.errors.has('name')}">
                        <label class="col-sm-2 control-label">舞姬姓名</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" placeholder="如:蕾娜•巴洛特"
                                   v-model="form.name">
                            <span class="help-block" v-if="form.errors.has('name')">{{ form.errors.get('name') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('dance_outfit')}">
                        <label class="col-sm-2 control-label">舞装名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="dance_outfit" class="form-control" placeholder="如:豹式F型"
                                   v-model="form.dance_outfit">
                            <span class="help-block"
                                  v-if="form.errors.has('dance_outfit')">{{ form.errors.get('dance_outfit') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('type_id')}">
                        <label class="col-sm-2 control-label">车型</label>
                        <div class="col-sm-10">
                            <multiselect
                                    v-model="type"
                                    :options="types"
                                    :searchable="true"
                                    placeholder="选择一个车型"
                                    label="name"
                                    track-by="id"
                                    @input="form.type_id=type.id"
                                    @open="form.errors.clear('type_id')">
                            </multiselect>
                            <span class="help-block" v-if="form.errors.has('type_id')">{{ form.errors.get('type_id')
                                }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('country_id')}">
                        <label class="col-sm-2 control-label">国籍</label>
                        <div class="col-sm-10">
                            <multiselect
                                    v-model="country"
                                    :options="countries"
                                    :searchable="true"
                                    placeholder="选择一个国籍"
                                    label="name"
                                    track-by="id"
                                    @input="form.country_id=country.id"
                                    @open="form.errors.clear('country_id')">
                            </multiselect>
                            <span class="help-block"
                                  v-if="form.errors.has('country_id')">{{ form.errors.get('country_id') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('rarity_id')}">
                        <label class="col-sm-2 control-label">稀有度</label>
                        <div class="col-sm-10">
                            <multiselect
                                    v-model="rarity"
                                    :options="rarities"
                                    :searchable="true"
                                    placeholder="选择一个稀有度"
                                    label="name"
                                    track-by="id"
                                    @input="form.rarity_id=rarity.id"
                                    @open="form.errors.clear('rarity_id')">
                            </multiselect>
                            <span class="help-block" v-if="form.errors.has('rarity_id')">{{ form.errors.get('rarity_id')
                                }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('subjection')}">
                        <label class="col-sm-2 control-label">隶属机构</label>
                        <div class="col-sm-10">
                            <input type="text" name="subjection" class="form-control" placeholder="不填默认S.V.S."
                                   v-model="form.subjection">
                            <span class="help-block"
                                  v-if="form.errors.has('subjection')">{{ form.errors.get('subjection') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('introduction')}">
                        <label class="col-sm-2 control-label">舞姬介绍</label>
                        <div class="col-sm-10">
                            <input type="text" name="introduction" class="form-control" placeholder="不填默认暂无"
                                   v-model="form.introduction">
                            <span class="help-block"
                                  v-if="form.errors.has('introduction')">{{ form.errors.get('introduction') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('character')}">
                        <label class="col-sm-2 control-label">舞姬性格</label>
                        <div class="col-sm-10">
                            <input type="text" name="character" class="form-control" placeholder="不填默认暂无"
                                   v-model="form.character">
                            <span class="help-block" v-if="form.errors.has('character')">{{ form.errors.get('character')
                                }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('grow_fire')}">
                        <label class="col-sm-2 control-label">60级火力</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="grow_fire" class="form-control" placeholder="如:100 (不填默认为0)" v-model="fire60">
                            <span class="help-block" v-if="form.errors.has('grow_fire')">{{ form.errors.get('grow_fire') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('grow_penetrate')}">
                        <label class="col-sm-2 control-label">60级穿甲</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="grow_penetrate" class="form-control" placeholder="如:100 (不填默认为0)" v-model="penetrate60">
                            <span class="help-block" v-if="form.errors.has('grow_penetrate')">{{ form.errors.get('grow_penetrate') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('grow_durable')}">
                        <label class="col-sm-2 control-label">60级耐久</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="grow_durable" class="form-control" placeholder="如:100 (不填默认为0)" v-model="durable60">
                            <span class="help-block" v-if="form.errors.has('grow_durable')">{{ form.errors.get('grow_durable') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('grow_armor')}">
                        <label class="col-sm-2 control-label">60级装甲</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="grow_armor" class="form-control" placeholder="如:100 (不填默认为0)" v-model="armor60">
                            <span class="help-block" v-if="form.errors.has('grow_armor')">{{ form.errors.get('grow_armor') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <template v-for="item in attributeLabels">
                        <div class="form-group" :class="{'has-error': form.errors.has(item.name)}">
                            <label class="col-sm-2 control-label">{{ `1级${item.label}` }}</label>
                            <div class="col-sm-10">
                                <input type="number" step="0.01" :name="item.name" class="form-control"
                                       placeholder="如:100 (不填默认为0)" v-model="form[item.name]">
                                <span class="help-block" v-if="form.errors.has(item.name)">{{ form.errors.get(item.name)
                                    }}</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                    </template>

                    <template v-for="(item, key) in slots">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ `${item.name}个数` }}</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control"
                                       placeholder="输入舞姬拥有的装备槽数(不填默认无该装备槽)" v-model="editedSlots[key].count">
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
    import Multiselect from 'vue-multiselect'
    import {attributeLabels} from '../../../config/variables'

    export default {
        components: {Multiselect},
        data() {
            return {
                attributeLabels,
                type: null,
                types: [],
                country: null,
                countries: [],
                rarity: null,
                rarities: [],
                slots: [],
                editedSlots: null,
                fire60: null,
                penetrate60: null,
                durable60: null,
                armor60: null,
                form: new Form({
                    name: '',
                    dance_outfit: '',
                    type_id: null,
                    country_id: null,
                    rarity_id: null,
                    subjection: null,
                    introduction: null,
                    character: null,
                    grow_fire: null,
                    grow_penetrate: null,
                    grow_durable: null,
                    grow_armor: null,
                    fire: null,
                    penetrate: null,
                    durable: null,
                    armor: null,
                    hit: null,
                    dodge: null,
                    concealment: null,
                    spy: null,
                    slots: null
                })
            }
        },
        mounted(){
            this.$http.get('dancer/' + this.$route.params.id + '/edit?include=attributes,types,countries,rarities,slots,slotCollection')
                .then((response) => {
                    let data = response.data.data
                    this.types = data.types.data
                    this.countries = data.countries.data
                    this.rarities = data.rarities.data
                    this.form.name = data.name
                    this.form.dance_outfit = data.dance_outfit
                    this.form.type_id = data.type_id
                    this.form.country_id = data.country_id
                    this.form.rarity_id = data.rarity_id
                    this.form.subjection = data.subjection
                    this.form.introduction = data.introduction
                    this.form.character = data.character
                    this.form.grow_fire = data.grow_fire
                    this.form.grow_penetrate = data.grow_penetrate
                    this.form.grow_durable = data.grow_durable
                    this.form.grow_armor = data.grow_armor
                    this.form.fire = data.attributes.data.fire + data.grow_fire
                    this.form.penetrate = data.attributes.data.penetrate + data.grow_penetrate
                    this.form.durable = data.attributes.data.durable + data.grow_durable
                    this.form.armor = data.attributes.data.armor + data.grow_armor
                    this.form.hit = data.attributes.data.hit
                    this.form.dodge = data.attributes.data.dodge
                    this.form.concealment = data.attributes.data.concealment
                    this.form.spy = data.attributes.data.spy
                    this.type = this.types.filter(type => type.id === this.form.type_id)[0]
                    this.country = this.countries.filter(country => country.id === this.form.country_id)[0]
                    this.rarity = this.rarities.filter(rarity => rarity.id === this.form.rarity_id)[0]
                    this.slots = data.slotCollection.data
                    this.relationSlots = data.slots.data
                    this.fire60 = data.attributes.data.fire + data.grow_fire * 60
                    this.penetrate60 = data.attributes.data.penetrate + data.grow_penetrate * 60
                    this.durable60 = data.attributes.data.durable + data.grow_durable * 60
                    this.armor60 = data.attributes.data.armor + data.grow_armor * 60
                    this.editedSlots = []
                    let count = null
                    this.slots.forEach((v, k) => {
                        count = null
                        this.relationSlots.forEach((v2, k2) => {
                            if (!count) {
                                count = (v.id == v2.id ? v2.pivot.count : null)
                            }
                        })
                        this.editedSlots.push({
                            id: v.id,
                            name: v.name,
                            count: count || null
                        })
                    })
                });
        },
        methods: {
            edit(event) {
                this.form.grow_fire = ((this.fire60 - this.form.fire) / 59).toFixed(2)
                this.form.grow_penetrate = ((this.penetrate60 - this.form.penetrate) / 59).toFixed(2)
                this.form.grow_durable = ((this.durable60 - this.form.durable) / 59).toFixed(2)
                this.form.grow_armor = ((this.armor60 - this.form.armor) / 59).toFixed(2)
                this.form.fire -= this.form.grow_fire
                this.form.penetrate -= this.form.grow_penetrate
                this.form.durable -= this.form.grow_durable
                this.form.armor -= this.form.grow_armor
                this.form.slots = this.editedSlots
                this.form.put('dancer/' + this.$route.params.id)
                    .then(() => {
                        toastr.success('修改成功！')
                    })
            }
        }
    }
</script>

<style>

</style>