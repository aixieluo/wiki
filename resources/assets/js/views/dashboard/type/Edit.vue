<template>
    <div>
        <vue-head headTitle="车型"></vue-head>

        <vue-form>
            <template slot="title">
                <h5>编辑</h5>
            </template>
            <template slot="buttons">
                <router-link to="/dashboard/type" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="edit"  @keydown="form.errors.clear($event.target.name)">
                    <div class="form-group" :class="{'has-error': form.errors.has('name')}">
                        <label class="col-sm-2 control-label">车型</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" placeholder="如:突击" v-model="form.name">
                            <span class="help-block" v-if="form.errors.has('name')">{{ form.errors.get('name') }}</span>
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
    import {mapState} from 'vuex'
    import Form from '../../../core/Form'

    export default {
        data() {
            return {
                form: new Form({
                    name: ''
                })
            }
        },
        mounted() {
            this.$http.get('type/' + this.$route.params.id + '/edit')
                .then((response) => {
                    let data = response.data.data
                    this.form.name = data.name
                })
        },
        methods: {
            edit(event) {
                this.form.put('type/' + this.$route.params.id).then((response) => {
                    toastr.success('修改成功！')
                })
            }
        }
    }
</script>

<style>

</style>