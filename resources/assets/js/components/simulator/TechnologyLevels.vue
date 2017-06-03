<template>
    <div class="form-group">
        <label class="col-md-2 control-label">{{ type }}</label>
        <div class="col-md-10">
            <div class="btn-group" role="group" aria-label="...">
                <template v-for="i in 3">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            {{ names[i-1] }}Lv.{{ level['lv' + i] }}
                                    <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li @click="level['lv' + i] = 0"><a href="javascript:void(0);">Lv.{{ 0 }}</a></li>
                            <li v-for="n in 16" @click="level['lv' + i] = n"><a href="javascript:void(0);">Lv.{{ n }}</a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            GET（{{ level['get' + i] }}个）
                                    <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li @click="level['get' + i] = 0"><a href="javascript:void(0);">{{ 0 }}个</a></li>
                            <li v-for="n in amount[i - 1]" @click="level['get' + i] = n"><a href="javascript:void(0);">{{ n }}个</a></li>
                        </ul>
                    </div>
                </template>
                <div class="btn-group" role="group">
                    <button @click="totalReset" type="button" class="btn btn-default">全初始化</button>
                </div>
                <div class="btn-group" role="group">
                    <button @click="totalMax" type="button" class="btn btn-default">全MAX</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex'

    export default {
        props: [
            'type',
        ],
        data() {
            return {
                names: ['初期', '二期', '三期'],
                level: {
                    lv1: 0,
                    lv2: 0,
                    lv3: 0,
                    get1: 0,
                    get2: 0,
                    get3: 0,
                },
            }
        },
        methods: {
            totalMax() {
                for (let i=1; i <= 3; i++) {
                    this.level['lv' + i] = 16
                    this.level['get' + i] = this.amount[i - 1]
                }
            },
            totalReset() {
                for (let i=1; i <= 3; i++) {
                    this.level['lv' + i] = 0
                    this.level['get' + i] = 0
                }
            }
        },
        computed: {
//            ...mapState(['technologyAmounts', 'selectRarity', 'technologyLevels']),
            amount() {
                return [
                    this.technologyAmounts == [] ? 1 : this.technologyAmounts.filter((ti) => ti.content == this.type)[0].amount1,
                    this.technologyAmounts == [] ? 1 : this.technologyAmounts.filter((ti) => ti.content == this.type)[0].amount2,
                    this.technologyAmounts == [] ? 1 : this.technologyAmounts.filter((ti) => ti.content == this.type)[0].amount3,
                ]
            },
            countLv() {
                let count = 0
                for (let i = 1; i <= this.selectRarity; i++) {
                    if (this.amount[i - 1] == 0) {
                        count += this.level['lv' + i]
                    } else {
                        count += this.level['lv' + i] + this.level['get' + i] / this.amount[i - 1] * 3
                    }
                }
                return count
            }
        },
        watch: {
            type() {
                return this.totalReset()
            },
            countLv(val, oldVal) {
                this.$store.dispatch('updateTechnologyLevels', {
                    type: this.type,
                    lv: val
                })
                this.$emit('refreshTechnologyLevels')
            }
        }
    }
</script>