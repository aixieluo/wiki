<template>
    <div>
        <vue-head headTitle="国籍"></vue-head>

        <vue-form>
            <template slot="title">
                <h5>创建</h5>
            </template>
            <template slot="buttons">
                <router-link to="/dashboard/country" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="create" @keydown="form.errors.clear($event.target.name)">
                    <div class="form-group" :class="{'has-error': form.errors.has('name')}">
                        <label class="col-sm-2 control-label">国籍</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" placeholder="如:中系" v-model="form.name">
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
    import Form from '../../../core/Form'

    export default {
        data() {
            return {
                form: new Form({
                    name: '',
                    resets: true
                })
            }
        },
        methods: {
            create(event) {
                this.form.post('country').then((response) => {
                    toastr.success('创建成功！')
                })
            }
        },
//        computed: {
//            ...mapState([
//                'form'
//            ])
//        }
    }
</script>

<style>

</style>