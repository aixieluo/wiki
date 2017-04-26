<template>
    <div class="row">
        <div class="col-md-9 mt5">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#equipments" href="#demo" aria-expanded="true" aria-controls="demo">
                            <slot></slot>
                        </a>
                    </h4>
                </div>
                <div id="demo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li class="pull-left equipment-wrap">卸下装备</li>
                            <li v-for="n in 10" class="pull-left equipment-wrap">{{ n }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt5">
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    S{{ lv }} <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li v-for="n in 10"><a href="javascript:;" @click="lv=n">S{{ n }}</a></li>
                </ul>
            </div>
        </div>
    </div>

</template>

<script>
    //域名路由
    import {host} from "../../config/variables"

    export default {
        props: {
        },
        data() {
            return {
                lv: 0,
            }
        },
        mounted() {

        },
        methods: {

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