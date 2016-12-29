<template>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#technologies" :href="'#'+id" aria-expanded="true" :aria-controls="id">
                    <slot></slot>
                    <div class="btn-group" :class="id">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Lv.1 <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li v-for="n in 10"><a href="javascript:;" @click.stop="lvToggle">Lv.{{ n }}</a></li>
                        </ul>
                    </div>
                </a>
            </h4>
        </div>
        <div :id="id" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <ul class="list-unstyled">
                    <li>1</li>
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
            dancerId: {
                required: true,
            }
        },
        data() {
            return {

            }
        },
        methods: {
            lvToggle() {
                document.querySelector('.'+this.id).classList.remove('open');
            }
        }
    }

</script>