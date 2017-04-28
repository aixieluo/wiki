<template>
    <div>
        <vue-head headTitle="钢舞姬关联关系"></vue-head>

        <vue-form>
            <template slot="buttons">
                <router-link to="/dashboard/dancer" class="btn btn-default" exact>返回</router-link>
            </template>
            <template slot="content">
                <form class="form-horizontal" @submit.prevent="syncRelation">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">舞姬</label>
                        <div class="col-sm-10">
                            <multiselect
                                    v-model="dancer"
                                    :options="dancers"
                                    :options-limit="10"
                                    :hide-selected="true"
                                    :custom-label="nameWithLang"
                                    label="dance_outfit"
                                    placeholder="Pick a value"
                                    track-by="id"
                                    @input="setTechnology">
                            </multiselect>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">科技</label>
                        <div class="col-sm-10">
                            <multiselect
                                    v-model="selectTechnologies"
                                    :options="technologies"
                                    :multiple="true"
                                    :searchable="true"
                                    :close-on-select="false"
                                    :clear-on-select="false"
                                    :hide-selected="true"
                                    placeholder=""
                                    label="name"
                                    track-by="id">
                            </multiselect>
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
                dancers: [],
                dancer: null,
                technologies: [],
                selectTechnologies: []
            }
        },
        mounted(){
            this.$http.get('dancer/danceOutfits')
                .then((Response) => {
                    this.dancers = Response.data
                });
            this.$http.get('simulator/technologies')
                .then((Response) => {
                    this.technologies = Response.data.data
                })
        },
        methods: {
            reset() {
                this.dancer = null
                this.selectTechnologies = []
            },
            nameWithLang({ name, dance_outfit }) {
                return `${dance_outfit}(${name})`
            },
            setTechnology({ id }) {
                if (!id) {
                    this.selectTechnologies = []
                } else {
                    this.getTechnologies(id)
                }
            },
            getTechnologies(id) {
                this.$http.get('relation/dancer/getTechnologies/' + id)
                    .then((Response) => {
                        this.selectTechnologies = Response.data.data
                    })
            },
            syncRelation(event) {
                if (!this.dancer.id) return
                let syncIds = this.selectTechnologies.map((item) => {
                    return item.id
                })

                this.$http.post('relation/dancer/technologies', {
                    id: this.dancer.id,
                    syncIds: syncIds
                })
                    .then(() => {
                        toastr.success('关联成功！')
                        this.reset()
                    })
                    .catch(() => {
                        toastr.error('传输数据发生错误，请重新选择')
                        this.reset()
                    })
            }
        }
    }
</script>

<style>

</style>