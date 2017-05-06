<template>
    <div>
        <div class="xbtn-wrapper">
            <div class="btn-group">
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        {{ tacticSelected }}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li v-for="tacticName in tacticNames" @click="tacticSelected=tacticName.name"><a href="javascript:;">{{ tacticName.name }}</a></li>
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
    export default {
        props: {

        },
        mounted () {
            this.ready();
        },
        data() {
            return {
                tacticNames: [],
                tacticSelected: '请选择一个战术',
                lv: 1,
                attributes: {},
            }
        },
        methods: {
            ready() {
                this.$http.post(host+'/api/tactic/names', {}).then((response)=>{
                    this.tacticNames = response.data;
                });
            },
            getAttributes() {
                this.$http.post(host+'/api/tactic/attributes', {
                name: this.tacticSelected,
                lv: this.lv
            }).then((response)=>{
                    this.attributes = response.data;
                    this.sendAttributes();
                });
            },
            sendAttributes() {
                this.$emit('setTacticAttributes', this.attributes);
            }
        },
        watch: {
            tacticSelected() {
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