<template>
    <div>
        <vue-head headTitle="科技类型（二级）">
            <li>
                <router-link to="/dashboard/technologyCategory">科技类别（一级）</router-link>
            </li>
            <li>
                <strong>{{ $route.query.gName }}</strong>
            </li>
        </vue-head>

        <vue-form>
            <template slot="title">
                <h5>创建</h5>
            </template>
            <template slot="buttons">
                <router-link :to="{path: `/dashboard/technologyCategory/${$route.params.gId}/technologyType`, query: {gName: $route.query.gName}}" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="create" @keydown="form.errors.clear($event.target.name)">
                    <div class="form-group" :class="{'has-error': form.errors.has('name')}">
                        <label class="col-sm-2 control-label">名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" placeholder="如：AP" v-model="form.name">
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
                    'technology_category_id': this.$route.params.gId,
                    'name': '',
                    'resets': true
                })
            }
        },
        methods: {
            create(event) {
                this.form.post('technologyType')
                    .then((response) => {
                        toastr.success('创建成功！')
                        this.form.technology_category_id = this.$route.params.gId
                    })
            }
        }
    }
</script>

<style>

</style>