<template>
    <div>
        <vue-head headTitle="装备信息"></vue-head>

        <vue-form>
            <template slot="buttons">
                <router-link to="/dashboard/equipmentInfo" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="create">
                    <div class="form-group" :class="{ 'has-error': errors.name }">
                        <label class="col-sm-2 control-label">名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" v-model="name">
                            <span v-if="errors.name" class="help-block">{{ errors.name[0] }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">描述</label>
                        <div class="col-sm-10">
                            <input type="text" name="describe" class="form-control" placeholder="选填" v-model="describe">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{ 'has-error': errors.activeSlots }">
                        <label class="col-sm-2 control-label">槽位</label>
                        <div class="col-sm-10">
                            <multiselect
                                    v-model="activeSlots"
                                    :options="slots"
                                    :multiple="true"
                                    :searchable="true"
                                    :close-on-select="false"
                                    :clear-on-select="false"
                                    :hide-selected="true"
                                    placeholder="匹配该装备的槽位"
                                    label="name"
                                    track-by="id"
                                    @input="checkMain">
                            </multiselect>
                            <span v-if="errors.activeSlots" class="help-block">{{ errors.activeSlots[0] }}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" :class="{ 'has-error': errors.main }">
                        <label class="col-sm-2 control-label">主槽</label>
                        <div class="col-sm-10">
                            <multiselect
                                    v-model="main"
                                    :options="activeSlots"
                                    :searchable="true"
                                    :options-limit="5"
                                    :placeholder="activeSlots.length == 0 ? '先匹配该装备的槽位':'设定该装备的主槽'"
                                    label="name"
                                    track-by="id">
                            </multiselect>
                            <span v-if="errors.main" class="help-block">{{ errors.main[0] }}</span>
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

    export default {
        components: { Multiselect },
        data() {
            return {
                equipmentInfo: {},
                slots: [],
                describe: null,
                activeSlots: [],
                name: null,
                main: null,
                errors: {}
            }
        },
        mounted() {
            this.$http.get('slots')
                .then(Response => {
                    this.slots = Response.data.data
                })
        },
        methods: {
            checkMain() {
                if (!(this.main in this.activeSlots)) this.main = ''
            },
            create(event) {
                let formData = new FormData(event.target)

                this.equipmentInfo = {
                    name: this.name,
                    describe: this.describe,
                    main: this.main,
                    activeSlots: this.activeSlots
                }

                formData.append('main', JSON.stringify(this.main))
                formData.append('activeSlots', JSON.stringify(this.activeSlots))

                this.$http.post('equipmentInfo', this.equipmentInfo)
                    .then(() => {
                        toastr.success('创建成功！')

//                        this.$router.push('/dashboard/equipmentInfo')
                    }).catch(({response}) => {
                        this.errors = response.data
                })
            }
        }
    }
</script>

<style>

</style>