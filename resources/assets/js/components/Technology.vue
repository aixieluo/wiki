<template>
    <div class="btn-group mt5">
        <button class="btn btn-default"><slot></slot></button>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                一期Lv.{{ technology.lv1 }}
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li v-for="n in 17" @click="technology.lv1=n-1"><a href="javascript:;">{{ n-1 }}</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                一期GET:{{ technology.get1 }}
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li v-for="n in 11" @click="technology.get1=n-1"><a href="javascript:;">{{ n-1 }}</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                二期Lv.{{ technology.lv2 }}
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li v-for="n in 17" @click="technology.lv2=n-1"><a href="javascript:;">{{ n-1 }}</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                二期GET:{{ technology.get2 }}
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li v-for="n in 11" @click="technology.get2=n-1"><a href="javascript:;">{{ n-1 }}</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                三期Lv.{{ technology.lv3 }}
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li v-for="n in 17" @click="technology.lv3=n-1"><a href="javascript:;">{{ n-1 }}</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                三期GET:{{ technology.get3 }}
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li v-for="n in 11" @click="technology.get3=n-1"><a href="javascript:;">{{ n-1 }}</a></li>
            </ul>
        </div>
    </div>
</template>

<script>
    //域名路由
    import {host} from "../variables"

    export default {
        props: {
            technologyName: {
                required: true,
            },
            dancerId: {
                required: true,
            }
        },
        data() {
            return {
                technology: {
                    name: this.technologyName,
                    lv1: 0,
                    get1: 0,
                    lv2: 0,
                    get2: 0,
                    lv3: 0,
                    get3: 0,
                }
            }
        },
        mounted() {

        },
        methods: {

        }
    }

</script>