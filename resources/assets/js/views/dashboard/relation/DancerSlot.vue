<template>
    <div>
        <vue-head headTitle="钢舞姬 - 装备槽"></vue-head>

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
                                    @input="changeEquipment"
                                    @open="form.errors.clear('id')">
                            </multiselect>
                            <span class="help-block" v-if="form.errors.has('id')">{{ form.errors.get('id') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('slots')}">
                        <label class="col-sm-2 control-label">装备槽</label>
                        <div class="col-sm-10">
                            <multiselect
                                    v-model="form.slots"
                                    :options="slots"
                                    :multiple="true"
                                    :searchable="true"
                                    :close-on-select="false"
                                    :clear-on-select="false"
                                    :hide-selected="true"
                                    placeholder="选择匹配的科技"
                                    label="name"
                                    track-by="id"
                                    @open="form.errors.clear('slots')">
                            </multiselect>
                            <span class="help-block" v-if="form.errors.has('slots')">{{ form.errors.get('slots') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <template v-for="item in form.slots">
                        <div class="form-group" :class="{'has-error': form.errors.has(item.name)}">
                            <label class="col-sm-2 control-label">{{ item.name }}</label>
                            <div class="col-sm-10">
                                <input type="number" :name="item.name" class="form-control"
                                       placeholder="输入舞姬拥有的装备槽数" v-model="item.count">
                                <span class="help-block" v-if="form.errors.has(item.name)">{{ form.errors.get(item.name)
                                    }}</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                    </template>

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

    export default {
        components: { Multiselect },
        data() {
            return {
                dancer: null,
                dancers: [],
                slots: [],
                form: new Form({
                    id: null,
                    slots: [],
//                    resets: true
                })
            }
        },
        mounted(){
            this.$http.get('dancers')
                .then((response) => {
                    this.dancers = response.data.data
                });
            this.$http.get('slots')
                .then((response) => {
                    let data = response.data.data
                    data.forEach((v, k) => {
                        v.count = null
                    })
                    this.slots = data
                })
        },
        methods: {
            changeEquipment() {
                if (this.dancer) {
                    this.form.id = this.dancer.id
//                    this.$http.get(`relation/dancer/${this.dancer.id}/technology`)
//                        .then((response) => {
//                            let data = response.data.data
//                            this.technologies = data
//                            this.form.syncIds = data.map(item => item.id)
//                        })
                } else {
                    this.form.id = null
                }
            },
            syncRelation(event) {
                this.form.post('relation/dancer/slot')
                    .then((response) => {
                        toastr.success('关联成功')
//                        this.dancer = null
                    })
            }
        }
    }
</script>

<style>

</style>