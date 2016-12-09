<template>
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
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        mounted () {
            this.demo();
        },
        data () {
            return {
                dancer: {},
                attributes: {},
                lv: 0,
            }
        },
        computed: {
            sumFire () {
                return this.lv*this.dancer.grow_fire+this.attributes.fire;
            },
            sumPenetrate () {
                return this.lv*this.dancer.grow_penetrate+this.attributes.penetrate;
            },
            sumDurable () {
                return this.lv*this.dancer.grow_durable+this.attributes.durable;
            },
            sumArmor () {
                return this.lv*this.dancer.grow_armor+this.attributes.armor;
            },
            sumHit () {
                return this.attributes.hit;
            },
            sumDodge () {
                return this.attributes.dodge;
            },
            sumConcealment () {
                return this.attributes.concealment;
            },
            sumSpy () {
                return this.attributes.spy;
            },
        },
        methods: {
            demo () {
                this.$http.get('http://localhost/api/dancer/attributes', {
                    params: {
                        id: 5,
                    }
                }).then((response)=>{
                    this.dancer = response.data;
                    this.attributes = response.data.attributes[0];
                });
            }
        },
        watch: {
            lv: function (val, oldVal) {
                console.log(!isNaN(val));
                this.lv = !isNaN(val)&&val>=0?val:oldVal;
            }
        }
    }
</script>