<template>
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
                isActive: false,
            }
        },
        mounted() {
            this.ready();
        },
        methods: {
            ready() {
                this.$http.post(host+'/api/equipment/part/list', {
                    slot: this.type,
                }).then((response)=>{
                    this.equipment = response.data;
                });
            },
            equip(aEquipment) {
                this.equipped = aEquipment;
            }
        }
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