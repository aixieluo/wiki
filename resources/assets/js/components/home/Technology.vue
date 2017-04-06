<template>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab">
            <h4 class="panel-title">
                <a data-toggle="collapse" :href="'#'+id" aria-expanded="true" :aria-controls="id">
                    <slot></slot>
                    <span v-if="name">{{ name }}</span>
                </a>
            </h4>
        </div>
        <div :id="id" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <ul class="list-unstyled">
                    <li  v-if="name" @click="resetTechnology()" class="pull-left technology-wrap">卸下装备</li>
                    <li @click="setTechnology1(technology)" v-for="technology in technologies" class="pull-left technology-wrap">
                        {{ technology.name }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    //域名路由
    import {host} from "../../public/variables"

    export default {
        props: {
            id: {
                required: true,
            },
            dancerId: {
                required: true,
            },
            category: {
                required: true,
            }
        },
        data() {
            return {
                name: "",
                type: "",
                technologies: {},
                technologyInfo: {},
                resetTechnologyInfo: {
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
        mounted() {
            this.ready();
        },
        methods: {
            ready() {
                //根据装备的槽位获取该槽位所有的装备
                this.$http.post(host+'/api/dancer/technologySlots', {
                    id: this.dancerId,
                    category: this.category,
                }).then((response)=>{
                    this.technologies = response.data;
                });
            },
            setTechnology1(technology) {
                this.name = technology.name;
                this.type = technology.type;
                this.technologyInfo = technology.attributes[0];
                this.sendTechnology();
            },
            resetTechnology() {
                this.name = "";
                this.$emit('setTechnology', this.resetTechnologyInfo, this.category, this.type);
            },
            sendTechnology() {
                this.$emit('setTechnology', this.technologyInfo, this.category, this.type);
            }
        },
        watch: {

        }
    }

</script>

<style>
    .technology-wrap{
        padding-left: 5px;
        padding-right: 5px;
    }
</style>