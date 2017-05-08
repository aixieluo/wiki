<template>
    <div>
        <label class="col-md-2 control-label">{{ 1 }}</label>
        <div class="col-md-10">
            <div class="btn-group" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        初期Lv.{{ 1 }}
                                    <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li @click=""><a href="javascript:void(0);">Lv.{{ 0 }}</a></li>
                        <li v-for="n in 16" @click=""><a href="javascript:void(0);">Lv.{{ n }}</a></li>
                    </ul>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        GET（{{ 1 }}个）
                                    <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li @click=""><a href="javascript:void(0);">{{ 0 }}个</a></li>
                        <li v-for="n in 1" @click=""><a href="javascript:void(0);">{{ n }}个</a></li>
                    </ul>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        二期Lv.{{ 1 }}
                                    <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li @click=""><a href="javascript:void(0);">Lv.{{ 0 }}</a></li>
                        <li v-for="n in 16" @click=""><a href="javascript:void(0);">Lv.{{ n }}</a></li>
                    </ul>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        GET（{{ 1 }}个）
                                    <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li @click=""><a href="javascript:void(0);">{{ 0 }}个</a></li>
                        <li v-for="n in 1" @click=""><a href="javascript:void(0);">{{ n }}个</a></li>
                    </ul>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        三期Lv.{{ 1 }}
                                    <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li @click=""><a href="javascript:void(0);">Lv.{{ 0 }}</a></li>
                        <li v-for="n in 16" @click=""><a href="javascript:void(0);">Lv.{{ n }}</a></li>
                    </ul>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        GET（{{ 1 }}个）
                                    <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li @click=""><a href="javascript:void(0);">{{ 0 }}个</a></li>
                        <li v-for="n in 1" @click=""><a href="javascript:void(0);">{{ n }}个</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex'

    export default {
        computed: {
            ...mapState(['technologyInitia'])
        }
    }
</script>