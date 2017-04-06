<template>
    <div class="row">
        <div class="col-md-9 mt5">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#equipments" :href="'#'+id" aria-expanded="true" :aria-controls="id">
                            <slot></slot>
                            <span v-if="equipped.name">{{ equipped.name }}</span>
                        </a>
                    </h4>
                </div>
                <div :id="id" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li @click="resetEquipmentInfo()" v-show="equipped.name" class="pull-left equipment-wrap">卸下装备</li>
                            <li @click="equip(aEquipment)" v-for="aEquipment in equipment" class="pull-left equipment-wrap" :class="{active: isActive}">
                                {{ aEquipment.name }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt5">
            <div v-show="equipped.name" class="btn-group" :class="id">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    S{{ lv }} <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li v-for="n in 10"><a href="javascript:;" @click="lv=n">S{{ n }}</a></li>
                </ul>
            </div>
            <div v-show="equipped.name" class="btn-group">
                <span @click="rank=0" class="btn btn-default" :class="{ active: !rank }">普通</span>
                <span @click="rank=1" class="btn btn-default" :class="{ active: rank }">高级</span>
            </div>
        </div>
    </div>

</template>

<script>
    //域名路由
    import {host} from "../../config/variables"

    export default {
        props: {
            id: {
                required: true,
            },
            type: {
                required: true,
            },
            dancerId: {
                required: true,
            }
        },
        data() {
            return {
                equipment: {},
                equipped: {},
                equipmentInfo: {
                    fire: 0,
                    penetrate: 0,
                    durable: 0,
                    armor: 0,
                    hit: 0,
                    dodge: 0,
                    concealment: 0,
                    spy: 0,
                    slot: this.id
                },
                lv: 1,
                rank: 0,
                isActive: false,
            }
        },
        mounted() {
            this.ready();
        },
        methods: {
            ready() {
                //根据装备的槽位获取该槽位所有的装备
                this.$http.post(host+'/api/equipment/part/list', {
                    slot: this.type,
                }).then((response)=>{
                    this.equipment = response.data;
                });
            },
            //装备一件装备，并将其属性存储下来
            equip(aEquipment) {
                this.equipped = aEquipment;
                this.attributes();
            },
            //获取存储装备的属性
            attributes() {
                this.$http.post(host+'/api/equipment/attributes', {
                    name: this.equipped.name,
                    lv: this.lv,
                    rank: this.rank,
                }).then((response)=>{
                    this.equipmentInfo = response.data;
                    this.equipmentInfo.slot = this.id;
                    this.sendEquipment();
                });
            },
            //触发父页面的setEquipment事件，将装备属性传回父页面
            sendEquipment() {
                this.$emit('setEquipment', this.equipmentInfo);
            },
            //卸下装备后重置属性为空
            resetEquipmentInfo() {
                this.equipped = {};
                this.equipmentInfo = {
                    fire: 0,
                    penetrate: 0,
                    durable: 0,
                    armor: 0,
                    hit: 0,
                    dodge: 0,
                    concealment: 0,
                    spy: 0,
                    slot: this.id
                };
                this.sendEquipment();
            },
        },
        watch: {
            //当装备等级发生改变时重新获取装备属性
            lv() {
                this.attributes();
            },
            //当装备级别发生改变时重新获取装备属性
            rank() {
                this.attributes();
            }
        },
    }
</script>

<style>
    .panel a[data-toggle="collapse"] {
        text-decoration: none;
        display: block;
    }
    .equipment-wrap {
        padding-left: 5px;
        padding-right: 5px;
    }
</style>