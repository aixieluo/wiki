<template>
    <div>
        <div class="page-header">
            <h3>基础属性</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="clearfix">
                    <div class="pull-left clearfix">
                        <i v-for="n in 3" @click="selectRarity=n" class="fa fa-star pull-left" :class="[selectRarity<n?'fa-star-o':'']" aria-hidden="true"></i>
                    </div>
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
            <equipment @setEquipment="equipmentList" v-for="num in equipmentSlots.barbette" :id="'barbette'+num" type="炮座" :dancerId="dancerId">
                <span>炮座{{ num }}</span>
            </equipment>
            <equipment @setEquipment="equipmentList" v-for="num in equipmentSlots.refit" :id="'refit'+num" type="改装" :dancerId="dancerId">
                <span>改装{{ num }}</span>
            </equipment>
            <equipment @setEquipment="equipmentList" v-for="num in equipmentSlots.outside" :id="'outside'+num" type="外身" :dancerId="dancerId">
                <span>外身{{ num }}</span>
            </equipment>
            <equipment @setEquipment="equipmentList" v-for="num in equipmentSlots.inwall" :id="'inwall'+num" type="内壁" :dancerId="dancerId">
                <span>内壁{{ num }}</span>
            </equipment>
            <equipment @setEquipment="equipmentList" v-for="num in equipmentSlots.inwarehouse" :id="'inwarehouse'+num" type="内仓" :dancerId="dancerId">
                <span>内仓{{ num }}</span>
            </equipment>
            <equipment @setEquipment="equipmentList" v-for="num in equipmentSlots.carriage" :id="'carriage'+num" type="炮架" :dancerId="dancerId">
                <span>炮架{{ num }}</span>
            </equipment>
            <equipment @setEquipment="equipmentList" v-for="num in equipmentSlots.special" :id="'special'+num" type="特殊" :dancerId="dancerId">
                <span>特殊{{ num }}</span>
            </equipment>
        </div>

        <div class="page-header">
            <h3>科技</h3>
        </div>
        <div class="panel-group" id="technologies" role="tablist" aria-multiselectable="true">
            <div v-for="(maxNum, part) in technologyPartMaxNum" class="btn-group mt5">
                <button class="btn btn-default tec-name">{{ part }}</button>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        一期Lv.{{ technology[part].lv1 }}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li @click="technology[part].lv1=0"><a href="javascript:;">{{ 0 }}</a></li>
                        <li v-for="n in 16" @click="technology[part].lv1=n"><a href="javascript:;">{{ n }}</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        一期GET:{{ technology[part].get1 }}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li @click="technology[part].get1=0"><a href="javascript:;">{{ 0 }}</a></li>
                        <li v-for="n in maxNum['rank1']" @click="technology[part].get1=n"><a href="javascript:;">{{ n }}</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        二期Lv.{{ technology[part].lv2 }}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li @click="technology[part].lv2=0"><a href="javascript:;">{{ 0 }}</a></li>
                        <li v-for="n in 16" @click="technology[part].lv2=n"><a href="javascript:;">{{ n }}</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        二期GET:{{ technology[part].get2 }}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li @click="technology[part].get2=0"><a href="javascript:;">{{ 0 }}</a></li>
                        <li v-for="n in maxNum['rank2']" @click="technology[part].get2=n"><a href="javascript:;">{{ n }}</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        三期Lv.{{ technology[part].lv3 }}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li @click="technology[part].lv3=0"><a href="javascript:;">{{ 0 }}</a></li>
                        <li v-for="n in 16" @click="technology[part].lv3=n"><a href="javascript:;">{{ n }}</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        三期GET:{{ technology[part].get3 }}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li @click="technology[part].get3=0"><a href="javascript:;">{{ 0 }}</a></li>
                        <li v-for="n in maxNum['rank3']" @click="technology[part].get3=n"><a href="javascript:;">{{ n }}</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <technology @setTechnology="technologyList" id="artillery" :dancerId="dancerId" category="主炮">
            <span>主炮</span>
        </technology>

        <technology @setTechnology="technologyList" id="guard" :dancerId="dancerId" category="防护">
            <span>防护</span>
        </technology>

        <technology @setTechnology="technologyList" id="bodywork" :dancerId="dancerId" category="车体">
            <span>车体</span>
        </technology>

        <technology @setTechnology="technologyList" id="engine" :dancerId="dancerId" category="引擎">
            <span>引擎</span>
        </technology>



        <div class="page-header">
            <h3>战术</h3>
        </div>
        <tactic @setTacticAttributes="getTacticAttributes"></tactic>

        <div class="page-header">
            <h3>辎械</h3>
        </div>
        <skill @setSkillAttributes="getSkillAttributes"></skill>


    </div>
</template>

<script>
    //域名路由
    import {host, starIncrease} from "../../config/variables"
    import {numAdd, numSub, numMulti} from "../../plugins/arithmetic"
    import {technologyInitia} from "../../config/initia"

    export default {
        props: {
            'dancerId': {
                required: true,
            },
        },
        mounted() {
            this.$http.get('simulator/dancerInfo/' + this.dancerId)
                .then((Response) => {
                    this.$store.state.dancer = Response.data.data;
                    console.log(this.$store.state.dancer);
                })
            this.ready();
        },
        data() {
            return {
                dancer: {},
                //舞姬基础属性
                attributes: {},
                //舞姬成长属性
                grows: {},
                //稀有度默认1
                rarity: 1,
                //亮星等级，默认1
                selectRarity: 1,
                //舞姬等级，默认0
                lv: 0,
                //装备槽个数
                equipmentSlots: {},
                //存储当前页面上舞姬所装备的装备
                equipment: [],
                //存储当前页面上舞姬所装备的装备所有的属性加成之和
                //此处存在疑惑，为什么此处子节点必须定义出来computed才能检测到变化，而战术和辎械出不需要预先定义子节点
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
                //存储当前选择的战术的属性
                tacticAttributes: {},
                //存储当前选择的辎械的属性
                skillAttributes: {},
                //舞姬科技大件最大GET个数
                technologyPartMaxNum: [],
                //获取与舞姬相关联的科技种类
                technologyParts: [],
                //科技等级和GET量
                technology: technologyInitia,
                //存储当前页面舞姬装备的科技大件
                technologySlots: [],
                //存储当前装备主炮大件属性
                technologyArtillery: {
                    fire: 0,
                    penetrate: 0,
                    durable: 0,
                    armor: 0,
                    hit: 0,
                    dodge: 0,
                    concealment: 0,
                    spy: 0,
                },
                //存储当前装备防护大件属性
                technologyGuard: {
                    fire: 0,
                    penetrate: 0,
                    durable: 0,
                    armor: 0,
                    hit: 0,
                    dodge: 0,
                    concealment: 0,
                    spy: 0,
                },
                //存储当前装备车体大件
                technologyBodywork: {
                    fire: 0,
                    penetrate: 0,
                    durable: 0,
                    armor: 0,
                    hit: 0,
                    dodge: 0,
                    concealment: 0,
                    spy: 0,
                },
                //存储当前装备引擎大件属性
                technologyEngine: {
                    fire: 0,
                    penetrate: 0,
                    durable: 0,
                    armor: 0,
                    hit: 0,
                    dodge: 0,
                    concealment: 0,
                    spy: 0,
                },
                //存储当前页面上舞姬所装备的科技大件所有的属性加成之和
                //此处存在疑惑，为什么此处子节点必须定义出来computed才能检测到变化，而战术和辎械出不需要预先定义子节点
                technologyAttributes: {
                    fire: 0,
                    penetrate: 0,
                    durable: 0,
                    armor: 0,
                    hit: 0,
                    dodge: 0,
                    concealment: 0,
                    spy: 0,
                },
            }
        },
        methods: {
            ready () {
                //获取基础属性
                this.$http.get('dancer/attributes/' + this.dancerId)
                    .then((Response)=>{
                    this.attributes = Response.data.data;
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
                //获取舞姬稀有度
                this.$http.post(host+'/api/dancer/rarity', {
                    id: this.dancerId,
                }).then((response)=>{
                    this.rarity = response.data.level;
                });
                //获取舞姬科技大件最大GET个数
                this.$http.post(host+'/api/dancer/technologyPartNumber', {
                    id: this.dancerId,
                }).then((response)=>{
                    this.technologyPartMaxNum = response.data;
                });
                //获取与舞姬相关联的科技种类
                this.$http.post(host+'/api/dancer/technologyParts', {
                    id: this.dancerId,
                }).then((response)=>{
                    this.technologyParts = response.data;
                });
            },

            //存储目前装备的装备列表
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
                //将存储下来的装备列表中的装备的属性加成计算出来
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
            technologyList(attribute, category, type) {
                switch (category) {
                    case '主炮': this.technologyArtillery = {
                        fire: attribute.fire,
                        penetrate: attribute.penetrate,
                        durable: attribute.durable,
                        armor: attribute.armor,
                        hit: attribute.hit,
                        dodge: attribute.dodge,
                        concealment: attribute.concealment,
                        spy: attribute.spy,
                    };
                        break;
                    case '防护': this.technologyGuard = {
                        fire: attribute.fire,
                        penetrate: attribute.penetrate,
                        durable: attribute.durable,
                        armor: attribute.armor,
                        hit: attribute.hit,
                        dodge: attribute.dodge,
                        concealment: attribute.concealment,
                        spy: attribute.spy,
                    };
                        break;
                    case '车体': this.technologyBodywork = {
                        fire: attribute.fire,
                        penetrate: attribute.penetrate,
                        durable: attribute.durable,
                        armor: attribute.armor,
                        hit: attribute.hit,
                        dodge: attribute.dodge,
                        concealment: attribute.concealment,
                        spy: attribute.spy,
                    };
                        break;
                    case '引擎': this.technologyEngine = {
                        fire: attribute.fire,
                        penetrate: attribute.penetrate,
                        durable: attribute.durable,
                        armor: attribute.armor,
                        hit: attribute.hit,
                        dodge: attribute.dodge,
                        concealment: attribute.concealment,
                        spy: attribute.spy,
                    };
                        break;
                }
                let sumFire = 0,
                    sumPenetrate = 0,
                    sumDurable = 0,
                    sumArmor = 0,
                    sumHit = 0,
                    sumDodge = 0,
                    sumConcealment = 0,
                    sumSpy = 0;
                this.technologyAttributes.fire = this.technologyArtillery.fire + this.technologyGuard.fire + this.technologyBodywork.fire + this.technologyEngine.fire;
                this.technologyAttributes.penetrate = this.technologyArtillery.penetrate + this.technologyGuard.penetrate + this.technologyBodywork.penetrate + this.technologyEngine.penetrate;
                this.technologyAttributes.durable = this.technologyArtillery.durable + this.technologyGuard.durable + this.technologyBodywork.durable + this.technologyEngine.durable;
                this.technologyAttributes.armor = this.technologyArtillery.armor + this.technologyGuard.armor + this.technologyBodywork.armor + this.technologyEngine.armor;
                this.technologyAttributes.hit = this.technologyArtillery.hit + this.technologyGuard.hit + this.technologyBodywork.hit + this.technologyEngine.hit;
                this.technologyAttributes.dodge = this.technologyArtillery.dodge + this.technologyGuard.dodge + this.technologyBodywork.dodge + this.technologyEngine.dodge;
                this.technologyAttributes.concealment = this.technologyArtillery.concealment + this.technologyGuard.concealment + this.technologyBodywork.concealment + this.technologyEngine.concealment;
                this.technologyAttributes.spy = this.technologyArtillery.spy + this.technologyGuard.spy + this.technologyBodywork.spy + this.technologyEngine.spy;
            },
            getTacticAttributes(attributes) {
                this.tacticAttributes = attributes;
            },
            getSkillAttributes(attributes) {
                this.skillAttributes = attributes;
            },
        },
        computed: {
            sumFire () {
                let basic = this.attributes.fire;
                let sum = basic;
                sum = numAdd(sum, numMulti(basic, this.tacticAttributes.fire_up));
                sum = numAdd(sum, numMulti(basic, this.skillAttributes.fire_up));
                sum = numAdd(sum, numMulti(basic, starIncrease[this.selectRarity-1].fire));
                sum = numAdd(sum, numMulti(this.lv, this.grows.grow_fire));
                sum = numAdd(sum, numMulti(this.equipmentAttributes.fire, numSub(1, this.tacticAttributes.fire_down)));
                sum = numAdd(sum, this.technologyAttributes.fire);
                return sum;
            },
            sumPenetrate () {
                let basic = this.attributes.penetrate;
                let sum = basic;
                sum = numAdd(sum, numMulti(basic, this.tacticAttributes.penetrate_up));
                sum = numAdd(sum, numMulti(basic, this.skillAttributes.penetrate_up));
                sum = numAdd(sum, numMulti(basic, starIncrease[this.selectRarity-1].penetrate));
                sum = numAdd(sum, numMulti(this.lv, this.grows.grow_penetrate));
                sum = numAdd(sum, numMulti(this.equipmentAttributes.penetrate, numSub(1, this.tacticAttributes.penetrate_down)));
                sum = numAdd(sum, this.technologyAttributes.penetrate);
                return sum;
            },
            sumDurable () {
                let basic = this.attributes.durable;
                let sum = basic;
                sum = numAdd(sum, numMulti(basic, this.tacticAttributes.durable_up));
                sum = numAdd(sum, numMulti(basic, this.skillAttributes.durable_up));
                sum = numAdd(sum, numMulti(basic, starIncrease[this.selectRarity-1].durable));
                sum = numAdd(sum, numMulti(this.lv, this.grows.grow_durable));
                sum = numAdd(sum, numMulti(this.equipmentAttributes.durable, numSub(1, this.tacticAttributes.durable_down)));
                sum = numAdd(sum, this.technologyAttributes.durable);
                return sum;
            },
            sumArmor () {
                let basic = this.attributes.armor;
                let sum = basic;
                sum = numAdd(sum, numMulti(basic, this.tacticAttributes.armor_up));
                sum = numAdd(sum, numMulti(basic, this.skillAttributes.armor_up));
                sum = numAdd(sum, numMulti(basic, starIncrease[this.selectRarity-1].armor));
                sum = numAdd(sum, numMulti(this.lv, this.grows.grow_armor));
                sum = numAdd(sum, numMulti(this.equipmentAttributes.armor, numSub(1, this.tacticAttributes.armor_down)));
                sum = numAdd(sum, this.technologyAttributes.armor);
                return sum;
            },
            sumHit () {
                let basic = this.attributes.hit;
                let sum = basic;
                sum = numAdd(sum, numMulti(basic, this.tacticAttributes.hit_up));
                sum = numAdd(sum, numMulti(basic, this.skillAttributes.hit_up));
                sum = numAdd(sum, numMulti(basic, starIncrease[this.selectRarity-1].hit));
                sum = numAdd(sum, numMulti(this.equipmentAttributes.hit, numSub(1, this.tacticAttributes.hit_down)));
                sum = numAdd(sum, this.technologyAttributes.hit);
                return sum;
            },
            sumDodge () {
                let basic = this.attributes.dodge;
                let sum = basic;
                sum = numAdd(sum, numMulti(basic, this.tacticAttributes.dodge_up));
                sum = numAdd(sum, numMulti(basic, this.skillAttributes.dodge_up));
                sum = numAdd(sum, numMulti(basic, starIncrease[this.selectRarity-1].dodge));
                sum = numAdd(sum, numMulti(this.equipmentAttributes.dodge, numSub(1, this.tacticAttributes.dodge_down)));
                sum = numAdd(sum, this.technologyAttributes.dodge);
                return sum;
            },
            sumConcealment () {
                let basic = this.attributes.concealment;
                let sum = basic;
                sum = numAdd(sum, numMulti(basic, this.tacticAttributes.concealment_up));
                sum = numAdd(sum, numMulti(basic, this.skillAttributes.concealment_up));
                sum = numAdd(sum, numMulti(basic, starIncrease[this.selectRarity-1].concealment));
                sum = numAdd(sum, numMulti(this.equipmentAttributes.concealment, numSub(1, this.tacticAttributes.concealment_down)));
                sum = numAdd(sum, this.technologyAttributes.concealment);
                return sum;
            },
            sumSpy () {
                let basic = this.attributes.spy;
                let sum = basic;
                sum = numAdd(sum, numMulti(basic, this.tacticAttributes.spy_up));
                sum = numAdd(sum, numMulti(basic, this.skillAttributes.spy_up));
                sum = numAdd(sum, numMulti(basic, starIncrease[this.selectRarity-1].spy));
                sum = numAdd(sum, numMulti(this.equipmentAttributes.spy, numSub(1, this.tacticAttributes.spy_down)));
                sum = numAdd(sum, this.technologyAttributes.spy);
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