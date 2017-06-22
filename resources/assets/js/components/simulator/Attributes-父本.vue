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

            }
        },
        mounted() {

        },
        methods: {

        },
        computed: {

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