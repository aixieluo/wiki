<template>
    <div class="row">
        <div class="col-md-6">
            <div class="clearfix">
                <div class="pull-left"><i class="fa fa-star" aria-hidden="true"></i></div>
                <div class="pull-right">
                    <button class="btn-arrow" type="button"><i class="fa fa-arrow-down"></i></button>
                    <span>Lv.<input class="lv-ipt" type="tel" value="1" maxlength="2" max="99" min="1"></span>
                    <button class="btn-arrow" type="button"><i class="fa fa-arrow-up"></i></button>
                </div>
            </div>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>火力</td>
                        <td>{{ 1 }}</td>
                        <td>穿甲</td>
                        <td>{{ 1 }}</td>
                        <td>耐久</td>
                        <td>{{ 1 }}</td>
                    </tr>
                    <tr>
                        <td>装甲</td>
                        <td>{{ 1 }}</td>
                        <td>命中</td>
                        <td>{{ 1 }}</td>
                        <td>闪避</td>
                        <td>{{ 1 }}</td>
                    </tr>
                    <tr>
                        <td>隐蔽</td>
                        <td>{{ 1 }}</td>
                        <td>侦查</td>
                        <td>{{ 1 }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        mounted () {
            this.$http.get('http://localhost/api/dancer/attributes', {
                params: {
                    id: 1,
                }
            }).then((response)=>{
//                this.$set('dancer', response.data);
//                this.dancer = response.data;
            });
        }
    }
</script>