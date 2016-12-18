<template>
    <div>
        <div class="page-header">
            <h3>基础属性</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="clearfix">
                    <div class="pull-left"><i class="fa fa-star" aria-hidden="true"></i></div>
                    <div class="pull-right">
                        <button class="btn-arrow" type="button" @click="lv>0?lv--:lv"><i class="fa fa-arrow-down"></i></button>
                        <span>Lv.<input class="lv-ipt" type="tel" v-model="lv" maxlength="2" max="99" min="0"></span>
                        <button class="btn-arrow" type="button" @click="lv<99?lv++:lv"><i class="fa fa-arrow-up"></i></button>
                    </div>
                </div>
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td width="1px">火力</td>
                        <td width="1px">{{ sumFire }}</td>
                        <td width="1px">穿甲</td>
                        <td width="1px">{{ sumPenetrate }}</td>
                        <td width="1px">耐久</td>
                        <td width="1px">{{ sumDurable }}</td>
                    </tr>
                    <tr>
                        <td>装甲</td>
                        <td>{{ sumArmor }}</td>
                        <td>命中</td>
                        <td>{{ sumHit }}</td>
                        <td>闪避</td>
                        <td>{{ sumDodge }}</td>
                    </tr>
                    <tr>
                        <td>隐蔽</td>
                        <td>{{ sumConcealment }}</td>
                        <td>侦查</td>
                        <td>{{ sumSpy }}</td>
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
        <div class="panel-group" id="equipments" role="tablist" aria-multiselectable="true">
            <equipment @getEquipment="equipmentList" v-for="num in equipmentSlots.barbette" :id="'barbette'+num" type="炮座" :dancerId="dancerId">
                <span>炮座{{ num }}</span>
            </equipment>
            <equipment @getEquipment="equipmentList" v-for="num in equipmentSlots.refit" :id="'refit'+num" type="改装" :dancerId="dancerId">
                <span>改装{{ num }}</span>
            </equipment>
            <equipment @getEquipment="equipmentList" v-for="num in equipmentSlots.outside" :id="'outside'+num" type="外身" :dancerId="dancerId">
                <span>外身{{ num }}</span>
            </equipment>
            <equipment @getEquipment="equipmentList" v-for="num in equipmentSlots.inwall" :id="'inwall'+num" type="内壁" :dancerId="dancerId">
                <span>内壁{{ num }}</span>
            </equipment>
            <equipment @getEquipment="equipmentList" v-for="num in equipmentSlots.inwarehouse" :id="'inwarehouse'+num" type="内仓" :dancerId="dancerId">
                <span>内仓{{ num }}</span>
            </equipment>
            <equipment @getEquipment="equipmentList" v-for="num in equipmentSlots.carriage" :id="'carriage'+num" type="炮架" :dancerId="dancerId">
                <span>炮架{{ num }}</span>
            </equipment>
            <equipment @getEquipment="equipmentList" v-for="num in equipmentSlots.special" :id="'special'+num" type="特殊" :dancerId="dancerId">
                <span>特殊{{ num }}</span>
            </equipment>
        </div>


    </div>
</template>

<script>
    //域名路由
    import {host} from "../variables"

    export default {
        props: {
            'dancerId': {
                required: true,
            },
        },
        mounted () {
            this.ready();
        },
        data () {
            return {
                dancer: {},
                attributes: {},
                grows: {},
                equipmentSlots: {},
                equipment: [],
                equipmentAttributes: {
                    fire: 0,
                    penetrate: 0,
                    durable: 0,
                    armor: 0,
                    hit: 0,
                    dodge: 0,
                    concealment: 0,
                    spy: 0,
                },
                lv: 0,
            }
        },
        methods: {
            ready () {
                //获取基础属性
                this.$http.post(host+'/api/dancer/attributes', {
                    id: this.dancerId,
                }).then((response)=>{
                    this.attributes = response.data;
                });
                //获取成长属性
                this.$http.post(host+'/api/dancer/growAttributes', {
                    id: this.dancerId,
                }).then((response)=>{
                    this.grows = response.data;
                });
                //获取舞姬各装备槽个数
                this.$http.post(host+'/api/dancer/equipmentSlots', {
                    id: this.dancerId,
                }).then((response)=>{
                    this.equipmentSlots = response.data;
                });
            },
            equipmentList(equipment) {
                let flag = true;
                this.equipment.forEach((item, key)=>{
                    if(item.slot==equipment.slot) {
                        this.equipment[key] = equipment;
                        flag = false;
                    }
                });
                if(flag) {
                    this.equipment.push(equipment);
                }
                let sumFire = 0,
                    sumPenetrate = 0,
                    sumDurable = 0,
                    sumArmor = 0,
                    sumHit = 0,
                    sumDodge = 0,
                    sumConcealment = 0,
                    sumSpy = 0;
                this.equipment.forEach((item)=>{
                    sumFire += item.fire;
                    sumPenetrate += item.penetrate;
                    sumDurable += item.durable;
                    sumArmor += item.armor;
                    sumHit += item.hit;
                    sumDodge += item.dodge;
                    sumConcealment += item.concealment;
                    sumSpy += item.spy;
                });


                this.equipmentAttributes.fire = sumFire;
                this.equipmentAttributes.penetrate = sumPenetrate;
                this.equipmentAttributes.durable = sumDurable;
                this.equipmentAttributes.armor = sumArmor;
                this.equipmentAttributes.hit = sumHit;
                this.equipmentAttributes.dodge = sumDodge;
                this.equipmentAttributes.concealment = sumConcealment;
                this.equipmentAttributes.spy = sumSpy;

            },
        },
        computed: {
            sumFire () {
                let sum = this.attributes.fire;
                sum += this.lv*this.grows.grow_fire;
                sum += this.equipmentAttributes.fire;
                return sum;
            },
            sumPenetrate () {
                let sum = this.attributes.penetrate;
                sum += this.lv*this.grows.grow_penetrate;
                sum += this.equipmentAttributes.penetrate;
                return sum;
            },
            sumDurable () {
                let sum = this.attributes.durable;
                sum += this.lv*this.grows.grow_durable;
                sum += this.equipmentAttributes.durable;
                return sum;
            },
            sumArmor () {
                let sum = this.attributes.armor;
                sum += this.lv*this.grows.grow_armor;
                sum += this.equipmentAttributes.armor;
                return sum;
            },
            sumHit () {
                let sum = this.attributes.hit;
                sum += this.equipmentAttributes.hit;
                return sum;
            },
            sumDodge () {
                let sum = this.attributes.dodge;
                sum += this.equipmentAttributes.dodge;
                return sum;
            },
            sumConcealment () {
                let sum = this.attributes.concealment;
                sum += this.equipmentAttributes.concealment;
                return sum;
            },
            sumSpy () {
                let sum = this.attributes.spy;
                sum += this.equipmentAttributes.spy;
                return sum;
            },
        },
        watch: {
            //监听lv的变化，当lv不是数字时，还原原先的值
            lv: function (val, oldVal) {
                this.lv = !isNaN(val)&&val>=0?val:oldVal;
            }
        }
    }
</script>

<style>

</style>