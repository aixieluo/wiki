<template>
    <div>
        <vue-head headTitle="钢舞姬"></vue-head>

        <vue-form>
            <template slot="buttons">
                <router-link to="/dashboard/dancer" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="create">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">舞姬姓名</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">舞装名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="dance_outfit" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">车型</label>
                        <div class="col-sm-10">
                            <select name="type_id" class="form-control">
                                <option v-for="type in types" :value="type.id">{{ type.content }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">国籍</label>
                        <div class="col-sm-10">
                            <select name="country_id" class="form-control">
                                <option v-for="country in countries" :value="country.id">{{ country.content }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">稀有度</label>
                        <div class="col-sm-10">
                            <select name="rarity_id" class="form-control">
                                <option v-for="rarity in rarities" :value="rarity.id">{{ rarity.content }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">隶属机构</label>
                        <div class="col-sm-10">
                            <input type="text" name="subjection" class="form-control" value="S.V.S." disabled>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">舞姬介绍</label>
                        <div class="col-sm-10">
                            <input type="text" name="introduction" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">舞姬性格</label>
                        <div class="col-sm-10">
                            <input type="text" name="character" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">火力</label>
                        <div class="col-sm-10">
                            <input type="number" name="fire" class="form-control" v-model.number="attributes.fire">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">穿甲</label>
                        <div class="col-sm-10">
                            <input type="number" name="penetrate" class="form-control" v-model.number="attributes.penetrate">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">耐久</label>
                        <div class="col-sm-10">
                            <input type="number" name="durable" class="form-control" v-model.number="attributes.durable">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">装甲</label>
                        <div class="col-sm-10">
                            <input type="number" name="armor" class="form-control" v-model.number="attributes.armor">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">命中</label>
                        <div class="col-sm-10">
                            <input type="number" name="hit" class="form-control" v-model.number="attributes.hit">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">闪避</label>
                        <div class="col-sm-10">
                            <input type="number" name="dodge" class="form-control" v-model.number="attributes.dodge">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">隐蔽</label>
                        <div class="col-sm-10">
                            <input type="number" name="concealment" class="form-control" v-model.number="attributes.concealment">
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">侦查</label>
                        <div class="col-sm-10">
                            <input type="number" name="spy" class="form-control" v-model.number="attributes.spy">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">火力成长</label>
                        <div class="col-sm-10">
                            <input type="number" name="grow_fire" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">穿甲成长</label>
                        <div class="col-sm-10">
                            <input type="number" name="grow_penetrate" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">耐久成长</label>
                        <div class="col-sm-10">
                            <input type="number" name="grow_durable" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">装甲成长</label>
                        <div class="col-sm-10">
                            <input type="number" name="grow_armor" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">炮座个数</label>
                        <div class="col-sm-10">
                            <input type="number" name="barbette" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">改装个数</label>
                        <div class="col-sm-10">
                            <input type="number" name="refit" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">外身个数</label>
                        <div class="col-sm-10">
                            <input type="number" name="outside" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">内壁个数</label>
                        <div class="col-sm-10">
                            <input type="number" name="inwall" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">内仓个数</label>
                        <div class="col-sm-10">
                            <input type="number" name="inwarehouse" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">炮架个数</label>
                        <div class="col-sm-10">
                            <input type="number" name="carriage" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">特殊个数</label>
                        <div class="col-sm-10">
                            <input type="number" name="special" class="form-control">
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
    export default {
        data() {
            return {
                types: {},
                countries: {},
                rarities: {},
                attributes: {}
            }
        },
        mounted(){
            this.$http.get('type')
                .then((Response) => {
                    this.types = Response.data.data;
                });
            this.$http.get('country')
                .then((Response) => {
                    this.countries = Response.data.data;
                });
            this.$http.get('rarity')
                .then((Response) => {
                    this.rarities = Response.data.data;
                });
        },
        methods: {
            create(event) {
                let formData = new FormData(event.target)

                formData.append('subjection', 'S.V.S.')
                formData.append('attributes', JSON.stringify(this.attributes))

                this.$http.post('dancer', formData)
                    .then(() => {
                        toastr.success('创建成功！')

                        this.$router.push('/dashboard/dancer')
                    })
            }
        }
    }
</script>

<style>

</style>