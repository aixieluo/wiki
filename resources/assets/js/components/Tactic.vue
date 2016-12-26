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
                        <li v-for="tacticName in tacticNames"><a href="javascript:;">{{ tacticName.name }}</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Lv.1
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="javascript:;">Lv.2</a></li>
                        <li><a href="javascript:;">Lv.3</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="well">123123</div>
    </div>
</template>

<script>

    //域名路由
    import {host, starIncrease} from "../variables"

    export default {
        props: {
            'dancerId': {
                required: true,
            },
        },
        mounted () {
            this.ready();
        },
        data() {
            return {
                tacticNames: [],
                tacticSelected: '请选择一个战术',
            }
        },
        methods: {
            ready() {
                this.$http.post(host+'/api/tactic/names', {}).then((response)=>{
                    this.tacticNames = response.data;
                });
            }
        }
    }

</script>

<style>
    .xbtn-wrapper{
        padding-bottom: 10px;
    }
</style>