<template>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#equipments" :href="'#'+id" aria-expanded="true" :aria-controls="id">
                    <slot></slot>
                    <span v-if="equipped.name">{{ equipped.name }}</span>
                    <div v-show="equipped.name" class="btn-group" :class="id">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            S{{ lv }} <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li v-for="n in 10"><a href="javascript:;" @click.stop="lvToggle(n)">S{{ n }}</a></li>
                        </ul>
                    </div>
                    <div v-show="equipped.name" class="btn-group">
                        <span @click.stop.prevent="rank=0" class="btn btn-default" :class="{ active: !rank }">普通</span>
                        <span @click.stop.prevent="rank=1" class="btn btn-default" :class="{ active: rank }">高级</span>
                    </div>
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
</template>

<script>
    //域名路由
    import {host} from "../variables"

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
            lvToggle(n) {
                this.lv = n;
                document.querySelector('.'+this.id).classList.remove('open');
            },
            ready() {
                this.$http.post(host+'/api/equipment/part/list', {
                    slot: this.type,
                }).then((response)=>{
                    this.equipment = response.data;
                });
            },
            equip(aEquipment) {
                this.equipped = aEquipment;
                this.attributes();
            },
            attributes() {
                this.$http.post(host+'/api/equipment/attributes', {
                    name: this.equipped.name,
                    lv: this.lv,
                    rank: this.rank,
                }).then((response)=>{
                    this.equipmentInfo = response.data;
                    this.equipmentInfo.slot = this.id;
                    this.getEquipment();
                });
            },
            getEquipment() {
                this.$emit('getEquipment', this.equipmentInfo);
            },
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
                this.getEquipment();
            },
        },
        watch: {
            lv() {
                this.attributes();
            },
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