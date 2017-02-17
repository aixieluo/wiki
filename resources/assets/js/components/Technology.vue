<template>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab">
            <h4 class="panel-title">
                <a data-toggle="collapse" :href="'#'+id" aria-expanded="true" :aria-controls="id">
                    <slot></slot>
                </a>
            </h4>
        </div>
        <div :id="id" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <ul class="list-unstyled">
                    <li @click="setTechnology(technology)" v-for="technology in technologies" class="pull-left technology-wrap">
                        {{ technology.name }}
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
            dancerId: {
                required: true,
            },
            category: {
                required: true,
            }
        },
        data() {
            return {
                technologies: {},
                technology: {},
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
            setTechnology() {

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