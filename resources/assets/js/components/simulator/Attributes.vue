<template>
    <div>
        <div class="page-header">
            <h3>基础属性</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="clearfix">
                    <div class="pull-left clearfix">
                        <i v-for="n in rarity" @click="selectRarity=n" class="fa fa-star pull-left"
                           :class="[selectRarity<n?'fa-star-o':'']" aria-hidden="true"></i>
                    </div>
                    <div class="pull-right">
                        <button class="btn-arrow" type="button" @click="lv>0?lv--:lv"><i class="fa fa-arrow-down"></i>
                        </button>
                        <span>Lv.<input class="lv-ipt" type="number" v-model="lv" maxlength="2" max="99" min="0"></span>
                        <button class="btn-arrow" type="button" @click="lv<99?lv++:lv"><i class="fa fa-arrow-up"></i>
                        </button>
                    </div>
                </div>
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td width="1px">火力</td>
                        <td width="1px">{{ 1 }}</td>
                        <td width="1px">穿甲</td>
                        <td width="1px">{{ 1 }}</td>
                        <td width="1px">命中</td>
                        <td width="1px">{{ 1 }}</td>

                    </tr>
                    <tr>
                        <td>耐久</td>
                        <td>{{ 1 }}</td>
                        <td>装甲</td>
                        <td>{{ 1 }}</td>
                        <td>闪避</td>
                        <td>{{ 1 }}</td>
                    </tr>
                    <tr>
                        <td>隐蔽</td>
                        <td>{{ 1 }}</td>
                        <td>侦查</td>
                        <td>{{ 1 }}</td>
                        <td>射程</td>
                        <td>{{ 555 }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="page-header">
            <h3>装备</h3>
        </div>
        <div class="form-horizontal">
            <div v-for="(value, key, index) in equipment_number" v-if="value.num!=0 && value.num" class="form-group">
                <label class="col-md-2 control-label">{{ `${value.name}(${value.num}个)` }}</label>
                <div class="col-md-10">
                    <multiselect
                            v-model="equipped[index]"
                            :options="filterEquipment(value.name)"
                            :multiple="true"
                            :searchable="true"
                            :close-on-select="false"
                            :clear-on-select="false"
                            :hide-selected="true"
                            :options-limit="5"
                            :max="value.num"
                            :custom-label="nameWithLang"
                            placeholder=""
                            label="name"
                            track-by="id">
                    </multiselect>
                </div>
            </div>
        </div>

        <div class="page-header">
            <h3>科技</h3>
        </div>

        <div class="form-horizontal">
            <div class="form-group" v-for="(value, key) in technologyInitia">
                <label class="col-md-2 control-label">{{ key }}</label>
                <div class="col-md-10">
                    <div class="btn-group" role="group" aria-label="...">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                初期Lv.{{ value.lv1 }}
                                    <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li @click="value.lv1 = 0"><a href="javascript:void(0);">Lv.{{ 0 }}</a></li>
                                <li v-for="n in 16" @click="value.lv1 = n"><a href="javascript:void(0);">Lv.{{ n }}</a></li>
                            </ul>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                GET（{{ value.get1 }}个）
                                    <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li @click="value.get1 = 0"><a href="javascript:void(0);">{{ 0 }}个</a></li>
                                <li v-for="n in value.amount1" @click="value.get1 = n"><a href="javascript:void(0);">{{ n }}个</a></li>
                            </ul>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                二期Lv.{{ value.lv2 }}
                                    <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li @click="value.lv2 = 0"><a href="javascript:void(0);">Lv.{{ 0 }}</a></li>
                                <li v-for="n in 16" @click="value.lv2 = n"><a href="javascript:void(0);">Lv.{{ n }}</a></li>
                            </ul>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                GET（{{ value.get2 }}个）
                                    <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li @click="value.get2 = 0"><a href="javascript:void(0);">{{ 0 }}个</a></li>
                                <li v-for="n in value.amount2" @click="value.get2 = n"><a href="javascript:void(0);">{{ n }}个</a></li>
                            </ul>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                三期Lv.{{ value.lv3 }}
                                    <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li @click="value.lv3 = 0"><a href="javascript:void(0);">Lv.{{ 0 }}</a></li>
                                <li v-for="n in 16" @click="value.lv3 = n"><a href="javascript:void(0);">Lv.{{ n }}</a></li>
                            </ul>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                GET（{{ value.get3 }}个）
                                    <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li @click="value.get3 = 0"><a href="javascript:void(0);">{{ 0 }}个</a></li>
                                <li v-for="n in value.amount3" @click="value.get3 = n"><a href="javascript:void(0);">{{ n }}个</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <template v-for="(technologyCategory, key) in technologyCategories">
                <div class="form-group">
                    <label class="col-md-2 control-label">{{ technologyCategory }}</label>
                    <div class="col-md-10">
                        <multiselect
                                v-model="equippedTechnology[key]"
                                :options="filterTechnologies(technologyCategory)"
                                :searchable="true"
                                :options-limit="5"
                                placeholder=""
                                label="name"
                                track-by="id">
                        </multiselect>
                    </div>
                </div>
            </template>
        </div>

        <div class="page-header">
            <h3>战术</h3>
        </div>
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 control-label">战术</label>
                <div class="col-md-10">
                    <multiselect
                            v-model="equippedTactic"
                            :options="tactics"
                            :searchable="true"
                            :options-limit="5"
                            placeholder=""
                            label="name"
                            track-by="id">
                    </multiselect>
                </div>
            </div>
        </div>

        <div class="page-header">
            <h3>辎械</h3>
        </div>
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 control-label">辎械</label>
                <div class="col-md-10">
                    <multiselect
                            v-model="equippedSkill"
                            :options="skills"
                            :searchable="true"
                            :options-limit="5"
                            placeholder=""
                            label="name"
                            track-by="id">
                    </multiselect>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import {host, starIncrease} from "../../config/variables"
    import {numAdd, numSub, numMulti} from "../../plugins/arithmetic"
    import {technologyInitia} from "../../config/initia"
    import Multiselect from 'vue-multiselect'
    import {mapState} from 'vuex'

    export default {
        components: {Multiselect},
        props: {
            'dancerId': {
                required: true,
            },
        },
        data() {
            return {
                selectRarity: 1,
                lv: 0,
                equipped: new Array(7), //暂无很好解决办法，次数数组个数值传入方式待解决
                equippedTechnology: new Array(5), //同上
                equippedTactic: {},
                equippedSkill: {}
            }
        },
        mounted() {
            this.$http.get('simulator/dancerInfo/' + this.dancerId)
                .then((Response) => {
                    this.$store.commit('setDancerInfo', Response.data.data)
                })
            this.$http.get('simulator/equipment')
                .then((Response) => {
                    this.$store.commit('setEquipment', Response.data.data)
                })
            this.$http.get('relation/dancer/getTechnologies/' + this.dancerId)
                .then((Response) => {
                    this.$store.commit('setTechnologies', Response.data.data)
                })
            this.$http.get('simulator/technologyTypes')
                .then((Response) => {
                    this.$store.dispatch('setTechnologyTypes', Response.data.data)
                })
            this.$http.get('simulator/tactics')
                .then((Response) => {
                    this.$store.commit('setTactics', Response.data.data)
                })
            this.$http.get('simulator/skills')
                .then((Response) => {
                    this.$store.commit('setSkills', Response.data.data)
                })
        },
        methods: {
            nameWithLang({name, lv}) {
                return `${name} - S${lv}`
            },
            filterEquipment(slot) {
                return this.equipment.filter(equipment => equipment.slot == slot)
            },
            filterTechnologies(category) {
                return this.technologies.filter(technology => technology.technology_category == category)
            }
        },
        computed: {
            ...mapState([
                'type',
                'rarity',
                'attributes',
                'grow_attributes',
                'equipment_number',
                'equipment',
                'technologies',
                'technologyCategories',
                'technologyTypes',
                'technologyInitia',
                'tactics',
                'skills'
            ]),
        }
    }
</script>

<style>

</style>