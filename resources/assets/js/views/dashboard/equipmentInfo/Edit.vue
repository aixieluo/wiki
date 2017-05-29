<template>
    <div>
        <vue-head headTitle="装备"></vue-head>

        <vue-form>
            <template slot="title">
                <h5>编辑</h5>
            </template>
            <template slot="buttons">
                <router-link to="/dashboard/equipmentInfo" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="edit" @keydown="form.errors.clear($event.target.name)">
                    <div class="form-group" :class="{'has-error': form.errors.has('name')}">
                        <label class="col-sm-2 control-label">名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" placeholder="如：外挂装甲" v-model="form.name">
                            <span class="help-block" v-if="form.errors.has('name')">{{ form.errors.get('name') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('describe')}">
                        <label class="col-sm-2 control-label">描述</label>
                        <div class="col-sm-10">
                            <input type="text" name="describe" class="form-control" placeholder="选填" v-model="form.describe">
                            <span class="help-block" v-if="form.errors.has('describe')">{{ form.errors.get('describe') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('slots')}">
                        <label class="col-sm-2 control-label">槽位</label>
                        <div class="col-sm-10">
                            <multiselect
                                    v-model="form.slots"
                                    :options="slots"
                                    :multiple="true"
                                    :searchable="true"
                                    :close-on-select="false"
                                    :clear-on-select="false"
                                    :hide-selected="true"
                                    placeholder="匹配该装备的槽位"
                                    label="name"
                                    track-by="id"
                                    @input="checkMain"
                                    @open="form.errors.clear('slots')">
                            </multiselect>
                            <span class="help-block" v-if="form.errors.has('slots')">{{ form.errors.get('slots') }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{'has-error': form.errors.has('main')}">
                        <label class="col-sm-2 control-label">主槽</label>
                        <div class="col-sm-10">
                            <multiselect
                                    v-model="form.main"
                                    :options="form.slots || []"
                                    :searchable="true"
                                    :placeholder="form.slots && form.slots.length > 0 ? '设定该装备的主槽':'先匹配该装备的槽位'"
                                    label="name"
                                    track-by="id"
                                    @open="form.errors.clear('main')">
                            </multiselect>
                            <span class="help-block" v-if="form.errors.has('main')">{{ form.errors.get('main') }}</span>
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
    import Multiselect from 'vue-multiselect'
    import Form from '../../../core/Form'

    export default {
        components: { Multiselect },
        data() {
            return {
                slots: [],
                form: new Form({
                    name: '',
                    describe: null,
                    slots: [],
                    main: ''
                }),
            }
        },
        mounted() {
            this.$http.get('equipmentInfo/' + this.$route.params.id + '/edit?include=slots,main,allSlots')
                .then((response) => {
                    let data = response.data.data
                    this.form.name = data.name
                    this.form.describe = data.describe
                    this.form.slots = data.slots.data
                    this.form.main = data.main.data
                    this.slots = data.allSlots.data
                }).catch(() => {
                    toastr.error('未知错误，刷新试试~')
                })
        },
        methods: {
            checkMain() {
                if (this.form.main) {
                    let flag = true
                    for (var slot of this.form.slots) {
                        if (slot.id == this.form.main.id) {
                            flag = false
                        }
                    }
                    if (flag) {
                        this.form.main = null
                    }
                }
            },
            edit(event) {
                this.form.put('equipmentInfo/' + this.$route.params.id, this.equipmentInfo).then((response) => {
                    toastr.success('修改成功！')
                }).catch((error) => {
                    toastr.error(error.error.message)
                })
            }
        }
    }
</script>

<style>

</style>