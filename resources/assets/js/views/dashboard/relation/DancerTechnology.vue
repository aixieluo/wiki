<template>
    <div>
        <vue-head headTitle="钢舞姬 - 科技"></vue-head>

        <vue-form>
            <template slot="title">
                <h5>建立关联</h5>
            </template>
            <template slot="buttons">
                <router-link to="/dashboard/dancer" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="syncRelation" @keydown="form.errors.clear($event.target.name)">
                    <div class="form-group" :class="{'has-error': form.errors.has('id')}">
                        <label class="col-sm-2 control-label">舞姬</label>
                        <div class="col-sm-10">
                            <multiselect
                                    v-model="dancer"
                                    :options="dancers"
                                    :searchable="true"
                                    :hide-selected="true"
                                    placeholder="选择一个钢舞姬"
                                    label="dance_outfit"
                                    track-by="id"
                                    @input="changeTechnologies"
                                    @open="form.errors.clear('id')">
                            </multiselect>
                            <span class="help-block" v-if="form.errors.has('id')">{{ form.errors.get('id') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('syncIds')}">
                        <label class="col-sm-2 control-label">科技</label>
                        <div class="col-sm-10">
                            <multiselect
                                    v-model="technologies"
                                    :options="technologyCollection"
                                    :multiple="true"
                                    :searchable="true"
                                    :close-on-select="false"
                                    :clear-on-select="false"
                                    :hide-selected="true"
                                    placeholder="选择匹配的科技"
                                    :custom-label="({name, place}) => `${name} ( ${place} )`"
                                    label="name"
                                    track-by="id"
                                    @input="form.syncIds = technologies.map(technology => technology.id)"
                                    @open="form.errors.clear('syncIds')">
                            </multiselect>
                            <span class="help-block" v-if="form.errors.has('syncIds')">{{ form.errors.get('syncIds') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button type="submit" class="btn btn-primary">保存内容</button>
                        </div>
                    </div>
                </form>
            </template>
        </vue-form>
    </div>
</template>

<script>
    import Form from '../../../core/Form'
    import Multiselect from 'vue-multiselect'
    import {technologyLabel} from '../../../config/variables'

    export default {
        components: { Multiselect },
        data() {
            return {
                dancer: null,
                dancers: [],
                technologies: [],
                technologyCollection: [],
                form: new Form({
                    id: null,
                    syncIds: [],
                    resets: true
                }),
                technologyLabelNum: 0
            }
        },
        mounted(){
            this.$http.get('dancers')
                .then((response) => {
                    this.dancers = response.data.data
                });
            this.$http.get('technologies')
                .then((response) => {
                    this.technologyCollection = response.data.data
                })
        },
        methods: {
            changeTechnologies() {
                if (this.dancer) {
                    this.form.id = this.dancer.id
                    this.$http.get(`relation/dancer/${this.dancer.id}/technology`)
                        .then((response) => {
                            let data = response.data.data
                            this.technologies = data
                            this.form.syncIds = data.map(item => item.id)
                        })
                } else {
                    this.form.id = null
                }
            },
            syncRelation(event) {
                this.form.post('relation/dancer/technology')
                    .then((response) => {
                        toastr.success('关联成功')
                        this.dancer = null
                        this.technologies = []
                    })
            }
        }
    }
</script>

<style>

</style>