<template>
    <div>
        <vue-head headTitle="车型"></vue-head>

        <vue-form>
            <template slot="title">
                <h5>创建</h5>
            </template>
            <template slot="buttons">
                <router-link to="/dashboard/type" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="create" @keydown="form.errors.clear($event.target.name)">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">图标</label>
                        <div class="col-sm-10">
                            <vue-img-inputer accept="image/*" icon="img" theme="light" v-model="avatar"
                                             size="small" @onChange="uploadImg"></vue-img-inputer>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

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
    import Form from '../../../core/Form'

    export default {
        data() {
            return {
                avatar: 0,
                form: new Form({
                    name: '',
                    resets: true
                })
            }
        },
        methods: {
            uploadImg(file) {
                let formData = new FormData()
                formData.append('avatar', file)
                this.$http.post('img/upload', formData)
                    .then((response) => {
                        this.form.uploadImages.push(response.data)
                        this.avatar = null
                    }).catch((error) => {
                        toastr.error('图片上传失败，请重新上传')
                    })
            },
            create(event) {
                this.form.post('type').then((response) => {
                    toastr.success('创建成功！')
                })
            }
        }
    }
</script>

<style lang="scss" scope>
    .img-inputer--small {
        $len: 130px;
        width: $len !important;
        height: $len !important;
    }
</style>