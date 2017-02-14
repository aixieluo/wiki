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
            type: {
                required: true,
            }
        },
        data() {
            return {

            }
        },
        mounted() {
            this.ready();
        },
        methods: {
            ready() {
                //根据装备的槽位获取该槽位所有的装备
                this.$http.post(host+'/api/equipment/part/list', {
                    slot: this.type,
                }).then((response)=>{
                    this.equipment = response.data;
                });
            }
        },
        watch: {

        }
    }

</script>