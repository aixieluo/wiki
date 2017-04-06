<template>
    <div>
        <div class="xbtn-wrapper">
            <div class="btn-group">
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        {{ skillSelected }}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li v-for="skillName in skillNames" @click="skillSelected=skillName.name"><a href="javascript:;">{{ skillName.name }}</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Lv.{{ lv }}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li v-for="n in 10" @click="lv=n"><a href="javascript:;">Lv.{{ n }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div v-show="attributes.describe" class="well">{{ attributes.describe }}</div>
    </div>
</template>

<script>

    //域名路由
    import {host, starIncrease} from "../../public/variables"

    export default {
        props: {

        },
        mounted () {
            this.ready();
        },
        data() {
            return {
                skillNames: [],
                skillSelected: '请选择一个辎械',
                lv: 1,
                attributes: {},
            }
        },
        methods: {
            ready() {
                this.$http.post(host+'/api/skill/names', {}).then((response)=>{
                    this.skillNames = response.data;
                });
            },
            getAttributes() {
                this.$http.post(host+'/api/skill/attributes', {
                    name: this.skillSelected,
                    lv: this.lv
                }).then((response)=>{
                    this.attributes = response.data;
                    this.sendAttributes();
                });
            },
            sendAttributes() {
                this.$emit('setSkillAttributes', this.attributes);
            }
        },
        watch: {
            skillSelected() {
                this.getAttributes();
            },
            lv() {
                this.getAttributes();
            }
        },
    }

</script>

<style>
    .xbtn-wrapper{
        padding-bottom: 10px;
    }
</style>