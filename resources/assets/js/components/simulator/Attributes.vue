<template>
    <div>
        <div class="page-header">
            <h3>基础属性</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="clearfix">
                    <div class="pull-left clearfix">
                        <i v-for="n in this.$store.state.dancer.rarity" @click="selectRarity=n" class="fa fa-star pull-left" :class="[selectRarity<n?'fa-star-o':'']" aria-hidden="true"></i>
                    </div>
                    <div class="pull-right">
                        <button class="btn-arrow" type="button" @click="lv>0?lv--:lv"><i class="fa fa-arrow-down"></i></button>
                        <span>Lv.<input class="lv-ipt" type="number" v-model="lv" maxlength="2" max="99" min="0"></span>
                        <button class="btn-arrow" type="button" @click="lv<99?lv++:lv"><i class="fa fa-arrow-up"></i></button>
                    </div>
                </div>
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td width="1px">火力</td>
                        <td width="1px">{{ sumFire }}</td>
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
            <h3>装备槽</h3>
        </div>
        <div class="row">
            <template v-for="n in 1">
                <div class="col-md-2">
                    <label>ceshi</label>
                </div>
                <div class="col-md-10">
                    <multiselect
                            v-model="value"
                            :options="equipment"
                            :multiple="true"
                            :searchable="true"
                            :close-on-select="false"
                            :clear-on-select="false"
                            :hide-selected="true"
                            :max="n"
                            placeholder="Pick some"
                            label="name"
                            track-by="name">
                    </multiselect>
                </div>
            </template>
        </div>

    </div>
</template>

<script>
    import {host, starIncrease} from "../../config/variables"
    import {numAdd, numSub, numMulti} from "../../plugins/arithmetic"
    import {technologyInitia} from "../../config/initia"
    import Multiselect from 'vue-multiselect'

    export default {
        components: { Multiselect },
        props: {
            'dancerId': {
                required: true,
            },
        },
        data() {
            return {
                selectRarity: 1,
                lv: 0,
                value: null,
                equipment: []
            }
        },
        mounted() {
            this.$http.get('simulator/dancerInfo/' + this.dancerId)
                .then((Response) => {
                    this.$store.commit('setDancerInfo', Response.data.data)
                })
            this.$http.get('simulator/equipment')
                .then((Response) => {
                    this.equipment = Response.data.data
                    this.$store.commit('setEquipment', Response.data.data)
                })
        },
        computed: {
            attributes() {
                return this.$store.state.dancer.attributes
            },
            equipment_number() {
                return this.$store.state.dancer.equipment_number
            }
        }
    }
</script>

<style>

</style>