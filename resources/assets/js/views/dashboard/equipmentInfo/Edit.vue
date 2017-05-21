<template>
    <div>
        <vue-head headTitle="装备信息"></vue-head>

        <vue-form>
            <template slot="buttons">
                <router-link to="/dashboard/equipmentInfo" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="edit">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" v-model="equipmentInfo.name">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">描述</label>
                        <div class="col-sm-10">
                            <input type="text" name="describe" class="form-control" v-model="equipmentInfo.describe">
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
            this.$http.get('equipmentInfo/' + this.$route.params.id + '/edit')
                .then((response) => {
                    this.equipmentInfo = response.data.data
                })
        },
        methods: {
            checkMain() {
                if (!(this.main in this.activeSlots)) this.main = ''
            },
            edit(event) {

                this.$http.put('equipmentInfo/' + this.$route.params.id, this.equipmentInfo)
                    .then(() => {
                        toastr.success('修改成功！')

                        this.$router.push('/dashboard/equipmentInfo')
                    })
            }
        }
    }
</script>

<style>

</style>