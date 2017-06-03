<template>
    <div>
        <div class="page-header">
            <h3>基础属性</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="clearfix">
                    <div class="pull-left clearfix">
                        <i v-for="n in rarity" @click="changeRarity(n)" class="fa fa-star pull-left"
                           :class="[selectRarity<n?'fa-star-o':'']" aria-hidden="true"></i>
                    </div>
                    <div class="pull-right">
                        <button class="btn-arrow" type="button" @click="subLv"><i class="fa fa-arrow-down"></i>
                        </button>
                        <span>Lv.<input class="lv-ipt" type="number" v-model="lv" maxlength="2" max="99" min="0"></span>
                        <button class="btn-arrow" type="button" @click="addLv"><i class="fa fa-arrow-up"></i>
                        </button>
                    </div>
                </div>
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td width="1px">火力</td>
                        <td width="1px">{{ sumFire }}</td>
                        <td width="1px">穿甲</td>
                        <td width="1px">{{ sumPenetrate }}</td>
                        <td width="1px">命中</td>
                        <td width="1px">{{ sumHit }}</td>
                    </tr>
                    <tr>
                        <td>耐久</td>
                        <td>{{ sumDurable }}</td>
                        <td>装甲</td>
                        <td>{{ sumArmor }}</td>
                        <td>闪避</td>
                        <td>{{ sumDodge }}</td>
                    </tr>
                    <tr>
                        <td>隐蔽</td>
                        <td>{{ sumConcealment }}</td>
                        <td>侦查</td>
                        <td>{{ sumSpy }}</td>
                        <td>射程</td>
                        <td>/</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="page-header">
            <h3>强殖</h3>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default">{{ strongBondLv }}级</button>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li @click="strongBondLv = 0"><a href="JavaScript:void(0)">{{ 0 }}级</a></li>
                <li v-for="n in 12" @click="strongBondLv = n"><a href="JavaScript:void(0)">{{ n }}级</a></li>
            </ul>
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
                            :custom-label="nameWithEquipment"
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
            <template v-for="(technologyCategory, key) in technologyCategories" v-if="filterTechnologies(technologyCategory).length > 0">
                <div class="form-group">
                    <label class="col-md-2 control-label">{{ technologyCategory }}</label>
                    <div class="col-md-10">
                        <multiselect
                                v-model="equippedTechnology[key]"
                                :options="filterTechnologies(technologyCategory)"
                                :searchable="true"
                                :options-limit="5"
                                :custom-label="nameWithTechnology"
                                placeholder=""
                                label="name"
                                track-by="id">
                        </multiselect>
                    </div>
                </div>
                <technology-levels v-on:refreshTechnologyLevels="refreshTechnologyLevels" :type="equippedTechnology[key].technology_type" v-if="equippedTechnology[key]"></technology-levels>
            </template>
            <input type="hidden" v-model="lv1">
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
                            :custom-label="nameWithTactic"
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
                            :custom-label="nameWithSkill"
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
    import {starIncrease, technologyIncrease, strongBond} from "../../config/variables"
    import {numAdd, numSub, numMulti} from "../../plugins/arithmetic"
    import Multiselect from 'vue-multiselect'
    import TechnologyLevels from './TechnologyLevels.vue'
    import {mapState} from 'vuex'

    export default {
        components: {
            Multiselect,
            TechnologyLevels
        },
        props: {
            'dancerId': {
                required: true,
            },
        },
        data() {
            return {
                lv: 1,
                refreshAttributes: {},
                equipped: new Array(7), //暂无很好解决办法，次数数组个数值传入方式待解决
                equippedTechnology: new Array(5), //同上
                equippedTactic: null,
                equippedSkill: null,
                strongBondLv: 0
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
            //vuex数据不能及时更新问题，暂时处理办法，待改进（急！！！！！！！！！）
            refreshTechnologyLevels() {
                for (var key in this.attributes) {
                    this.attributes[key]++
                    this.attributes[key]--
                }
            },
            isEmpty(obj) {
                for (var name in obj)
                {
                    return false;
                }
                return true;
            },
            nameWithEquipment({name, lv}) {
                return `${name} - S${lv}`
            },
            nameWithTechnology({name, rank}) {
                return `${name} - ${rank}阶`
            },
            nameWithTactic({name, lv}) {
                return `${name} - ${lv}级`
            },
            nameWithSkill({name, lv}) {
                return `${name} - ${lv}级`
            },
            filterEquipment(slot) {
                return this.equipment.filter(equipment => equipment.slot == slot)
            },
            filterTechnologies(category) {
                return this.technologies.filter(technology => technology.technology_category == category)
            },
            subLv() {
                this.lv > 0 ? this.lv-- : this.lv
            },
            addLv() {
                this.lv < 99 ? this.lv++ : this.lv
            },
            changeRarity(n) {
                this.$store.commit('changeRarity', n)
            }
        },
        computed: {
//            ...mapState([
//                'type',
//                'rarity',
//                'selectRarity',
//                'attributes',
//                'grow_attributes',
//                'equipment_number',
//                'equipment',
//                'technologies',
//                'technologyCategories',
//                'technologyTypes',
//                'technologyLevels',
//                'tactics',
//                'skills'
//            ]),
            equipmentAttributes() {
                let ea = {
                    fire: 0,
                    penetrate: 0,
                    durable: 0,
                    armor: 0,
                    hit: 0,
                    dodge: 0,
                    concealment: 0,
                    spy: 0,
                }
                this.equipped.forEach((item1, key1) => {
                    item1.forEach((item2, ke2) => {
                        ea.fire += item2.attributes.fire
                        ea.penetrate += item2.attributes.penetrate
                        ea.durable += item2.attributes.durable
                        ea.armor += item2.attributes.armor
                        ea.hit += item2.attributes.hit
                        ea.dodge += item2.attributes.dodge
                        ea.concealment += item2.attributes.concealment
                        ea.spy += item2.attributes.spy
                    })
                })
                return ea
            },
            technologyAttributes() {
                let ta = {
                    fire: 0,
                    penetrate: 0,
                    durable: 0,
                    armor: 0,
                    hit: 0,
                    dodge: 0,
                    concealment: 0,
                    spy: 0,
                }
                this.equippedTechnology.forEach((item, key) => {
                    if (item) {
                        ta.fire += item.attributes.fire
                        ta.penetrate += item.attributes.penetrate
                        ta.durable += item.attributes.durable
                        ta.armor += item.attributes.armor
                        ta.hit += item.attributes.hit
                        ta.dodge += item.attributes.dodge
                        ta.concealment += item.attributes.concealment
                        ta.spy += item.attributes.spy
                    }
                })
                return ta
            },
            equippedTechnologyTypes() {
                let ett = {}
                this.equippedTechnology.forEach((item, key) => {
                    if (item) {
                        ett[item.technology_category] = item.technology_type
                    }
                })
                return ett
            },
            tacticAttributes() {
                return !this.isEmpty(this.equippedTactic) ? this.equippedTactic
                    :
                    {
                        fire_up: 0,
                        penetrate_up: 0,
                        durable_up: 0,
                        armor_up: 0,
                        hit_up: 0,
                        dodge_up: 0,
                        concealment_up: 0,
                        spy_up: 0,
                        fire_down: 1,
                        penetrate_down: 1,
                        durable_down: 1,
                        armor_down: 1,
                        hit_down: 1,
                        dodge_down: 1,
                        concealment_down: 1,
                        spy_down: 1,
                    }
            },
            skillAttributes() {
                return !this.isEmpty(this.equippedSkill) ? this.equippedSkill
                    :
                    {
                        fire_up: 0,
                        penetrate_up: 0,
                        durable_up: 0,
                        armor_up: 0,
                        hit_up: 0,
                        dodge_up: 0,
                        concealment_up: 0,
                        spy_up: 0,
                    }
            },
            sumFire () {
                let basic = this.attributes.fire;
                let sum = basic;
                sum = numAdd(sum, numMulti(this.lv, this.grow_attributes.grow_fire));
                sum = numAdd(sum, numMulti(basic, this.skillAttributes.fire_up));
                sum = numAdd(sum, numMulti(basic, this.tacticAttributes.fire_up));
                sum = numAdd(sum, numMulti(this.equipmentAttributes.fire, this.tacticAttributes.fire_down));
                sum = numAdd(sum, this.technologyAttributes.fire);
                sum = numAdd(sum, numMulti(basic, numMulti(technologyIncrease[this.equippedTechnologyTypes['主炮'] || "AP"].fire_up, this.technologyLevels[this.equippedTechnologyTypes['主炮']])))
//                sum = numAdd(sum, numMulti(basic, starIncrease[this.selectRarity-1].fire));
                sum = numAdd(sum, numMulti(strongBond[this.type || "重型坦克"].fire, this.strongBondLv))
                return Math.round(sum)
            },
            sumPenetrate () {
                let basic = this.attributes.penetrate;
                let sum = basic;
                sum = numAdd(sum, numMulti(this.lv, this.grow_attributes.grow_penetrate));
                sum = numAdd(sum, numMulti(basic, starIncrease[this.selectRarity-1].penetrate));
                sum = numAdd(sum, numMulti(basic, this.skillAttributes.penetrate_up));
                sum = numAdd(sum, numMulti(basic, this.tacticAttributes.penetrate_up));
                sum = numAdd(sum, numMulti(this.equipmentAttributes.penetrate, this.tacticAttributes.penetrate_down));
                sum = numAdd(sum, this.technologyAttributes.penetrate);
                sum = numAdd(sum, numMulti(basic, numMulti(technologyIncrease[this.equippedTechnologyTypes['主炮'] || "AP"].penetrate_up, this.technologyLevels[this.equippedTechnologyTypes['主炮']])))
                sum = numAdd(sum, numMulti(strongBond[this.type || "重型坦克"].penetrate, this.strongBondLv))
                return Math.round(sum)
            },
            sumDurable () {
                let basic = this.attributes.durable;
                let sum = basic;
                sum = numAdd(sum, numMulti(this.lv, this.grow_attributes.grow_durable));
                sum = numAdd(sum, numMulti(basic, starIncrease[this.selectRarity-1].durable));
                sum = numAdd(sum, numMulti(basic, this.skillAttributes.durable_up));
                sum = numAdd(sum, numMulti(basic, this.tacticAttributes.durable_up));
                sum = numAdd(sum, numMulti(this.equipmentAttributes.durable, this.tacticAttributes.durable_down));
                sum = numAdd(sum, this.technologyAttributes.durable);
                sum = numAdd(sum, numMulti(basic, numMulti(technologyIncrease[this.equippedTechnologyTypes['防护'] || "重装防护"].durable_up, this.technologyLevels[this.equippedTechnologyTypes['防护']])))
                sum = numAdd(sum, numMulti(strongBond[this.type || "重型坦克"].durable, this.strongBondLv))
                return Math.round(sum)
            },
            sumArmor () {
                let basic = this.attributes.armor;
                let sum = basic;
                sum = numAdd(sum, numMulti(this.lv, this.grow_attributes.grow_armor));
                sum = numAdd(sum, numMulti(basic, starIncrease[this.selectRarity-1].armor));
                sum = numAdd(sum, numMulti(basic, this.skillAttributes.armor_up));
                sum = numAdd(sum, numMulti(basic, this.tacticAttributes.armor_up));
                sum = numAdd(sum, numMulti(this.equipmentAttributes.armor, this.tacticAttributes.armor_down));
                sum = numAdd(sum, this.technologyAttributes.armor);
                sum = numAdd(sum, numMulti(basic, numMulti(technologyIncrease[this.equippedTechnologyTypes['防护'] || "重装防护"].armor_up, this.technologyLevels[this.equippedTechnologyTypes['防护']])))
                sum = numAdd(sum, numMulti(strongBond[this.type || "重型坦克"].armor, this.strongBondLv))
                return Math.round(sum)
            },
            sumHit () {
                let basic = this.attributes.hit;
                let sum = basic;
                sum = numAdd(sum, numMulti(basic, starIncrease[this.selectRarity-1].hit));
                sum = numAdd(sum, numMulti(basic, this.skillAttributes.hit_up));
                sum = numAdd(sum, numMulti(basic, this.tacticAttributes.hit_up));
                sum = numAdd(sum, numMulti(this.equipmentAttributes.hit, this.tacticAttributes.hit_down));
                sum = numAdd(sum, this.technologyAttributes.hit);
                sum = numAdd(sum, numMulti(basic, numMulti(technologyIncrease[this.equippedTechnologyTypes['车体'] || "综合车体"].hit_up, this.technologyLevels[this.equippedTechnologyTypes['车体']])))
                sum = numAdd(sum, numMulti(strongBond[this.type || "重型坦克"].hit, this.strongBondLv))
                return Math.round(sum)
            },
            sumDodge () {
                let basic = this.attributes.dodge;
                let sum = basic;
                sum = numAdd(sum, numMulti(basic, starIncrease[this.selectRarity-1].dodge));
                sum = numAdd(sum, numMulti(basic, this.skillAttributes.dodge_up));
                sum = numAdd(sum, numMulti(basic, this.tacticAttributes.dodge_up));
                sum = numAdd(sum, numMulti(this.equipmentAttributes.dodge, this.tacticAttributes.dodge_down));
                sum = numAdd(sum, this.technologyAttributes.dodge);
                sum = numAdd(sum, numMulti(basic, numMulti(technologyIncrease[this.equippedTechnologyTypes['引擎'] || "综合引擎"].dodge_up, this.technologyLevels[this.equippedTechnologyTypes['引擎']])))
                sum = numAdd(sum, numMulti(strongBond[this.type || "重型坦克"].dodge, this.strongBondLv))
                return Math.round(sum)
            },
            sumConcealment () {
                let basic = this.attributes.concealment;
                let sum = basic;
                sum = numAdd(sum, numMulti(basic, this.skillAttributes.concealment_up));
                sum = numAdd(sum, numMulti(basic, this.tacticAttributes.concealment_up));
                sum = numAdd(sum, numMulti(this.equipmentAttributes.concealment, this.tacticAttributes.concealment_down));
                sum = numAdd(sum, this.technologyAttributes.concealment);
//                sum = numAdd(sum, numMulti(basic, starIncrease[this.selectRarity-1].concealment));
                sum = numAdd(sum, numMulti(basic, numMulti(technologyIncrease[this.equippedTechnologyTypes['侦查'] || '综合索敌'].concealment_up, this.technologyLevels[this.equippedTechnologyTypes['侦查']])))
                return Math.round(sum)
            },
            sumSpy () {
                let basic = this.attributes.spy;
                let sum = basic;
                sum = numAdd(sum, numMulti(basic, this.skillAttributes.spy_up));
                sum = numAdd(sum, numMulti(basic, this.tacticAttributes.spy_up));
                sum = numAdd(sum, numMulti(this.equipmentAttributes.spy, this.tacticAttributes.spy_down));
                sum = numAdd(sum, this.technologyAttributes.spy);
//                sum = numAdd(sum, numMulti(basic, starIncrease[this.selectRarity-1].spy));
                sum = numAdd(sum, numMulti(basic, numMulti(technologyIncrease[this.equippedTechnologyTypes['侦查'] || '综合索敌'].spy_up, this.technologyLevels[this.equippedTechnologyTypes['侦查']])))
                return Math.round(sum)
            },
        },
        watch: {
            //监听lv的变化，当lv不是数字时，还原原先的值
            lv: function (val, oldVal) {
                this.lv = !isNaN(val) && val >= 0 && val <= 99 ? val : oldVal;
            }
        }
    }
</script>

<style>

</style>