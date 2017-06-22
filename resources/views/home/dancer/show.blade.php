@extends('home.layouts.app')

@section('content')
<section class="xd-detail">
    <div class="container">
        <div class="xwrap">
            <div class="row">
                <div class="col-md-2 col-md-offset-1">
                    <div class="d-avator text-center">
                        <img class="img-circle img-thumbnail" style="width: 163px;height: 163px" src="{{ asset('images/erii.jpg') }}" />
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <table class="table table-bordered">
                        <tr>
                            <td>姓名</td>
                            <td>{{ $dancer->name }}</td>
                            <td>舞装</td>
                            <td>{{ $dancer->dance_outfit }}</td>
                        </tr>
                        <tr>
                            <td>军阶</td>
                            <td>{{ $dancer->rarity->lv }}</td>
                            <td>类型</td>
                            <td>{{ $dancer->type->name }}</td>
                        </tr>
                        <tr>
                            <td>国别</td>
                            <td>{{ $dancer->country->name }}</td>
                            <td>隶属机构</td>
                            <td>{{ $dancer->subjection }}</td>
                        </tr>
                        <tr>
                            <td>配音</td>
                            <td>(暂无该信息)</td>
                            <td>画师</td>
                            <td>(暂无该信息)</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="page-header">
                <h3>人物简介</h3>
            </div>
            <p class="well">{{ $dancer->introduction }}</p>
            <div class="page-header">
                <h3>性格设定</h3>
            </div>
            <p class="well">{{ $dancer->character }}</p>
            <div class="page-header">
                <h3>基础属性（0级）</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <td>火力</td>
                            <td>{{ $dancer->attributes()->first()->fire }}</td>
                            <td>穿甲</td>
                            <td>{{ $dancer->attributes()->first()->penetrate }}</td>
                        </tr>
                        <tr>
                            <td>耐久</td>
                            <td>{{ $dancer->attributes()->first()->durable }}</td>
                            <td>装甲</td>
                            <td>{{ $dancer->attributes()->first()->armor }}</td>
                        </tr>
                        <tr>
                            <td>命中</td>
                            <td>{{ $dancer->attributes()->first()->hit }}</td>
                            <td>闪避</td>
                            <td>{{ $dancer->attributes()->first()->dodge }}</td>
                        </tr>
                        <tr>
                            <td>隐蔽</td>
                            <td>{{ $dancer->attributes()->first()->concealment }}</td>
                            <td>侦查</td>
                            <td>{{ $dancer->attributes()->first()->spy }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="page-header">
                <h3>属性成长</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <td>火力</td>
                            <td>{{ $dancer->grow_fire }}</td>
                            <td>穿甲</td>
                            <td>{{ $dancer->grow_penetrate }}</td>
                        </tr>
                        <tr>
                            <td>耐久</td>
                            <td>{{ $dancer->grow_durable }}</td>
                            <td>装甲</td>
                            <td>{{ $dancer->grow_armor }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="page-header">
                <h3>装备槽位</h3>
            </div>
            <div class="page-header">
                <h3>升星消耗</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <td>秘密计划</td>
                            <td>440</td>
                        </tr>
                        <tr>
                            <td>秘密计划</td>
                            <td>440</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="page-header">
                <h3>获取途径</h3>
            </div>
            <h4>1)研发需求</h4>
            <div class="alert alert-danger alert-sm">指挥官等级需达到25级</div>
            <div class="row">
                <div class="col-md-6">
                    <table class="table  table-bordered">
                        <tr>
                            <td colspan="3">前续养成条件</td>
                        </tr>
                        <tr>
                            <td>{{ $dancer->name }}</td>
                            <td>Lv.1</td>
                            <td><i class="fa fa-star"></i></td>
                        </tr>
                        <tr>
                            <td>{{ $dancer->name }}</td>
                            <td>Lv.1</td>
                            <td><i class="fa fa-star"></i></td>
                        </tr>
                        <tr>
                            <td>{{ $dancer->name }}</td>
                            <td>Lv.1</td>
                            <td><i class="fa fa-star"></i></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="2">消耗道具</td>
                        </tr>
                        <tr>
                            <td>秘密计划</td>
                            <td>367</td>
                        </tr>
                        <tr>
                            <td>秘密计划</td>
                            <td>367</td>
                        </tr>
                        <tr>
                            <td>秘密计划</td>
                            <td>367</td>
                        </tr>
                        <tr>
                            <td>银币</td>
                            <td>7878787</td>
                        </tr>
                    </table>
                </div>
            </div>
            <h4>2)地图掉落</h4>
            <p class="well">1-2、2-3、4-3、5-4</p>
            <h4>3)舞装再制</h4>
            <div class="row">
                <div class="col-md-6">

                </div>
            </div>
            <h4>4)军港</h4>
            <p class="well">军港达到1级有概率出现</p>
            <div class="page-header">
                <h3>后续车型</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <td>虎II（亨舍尔）</td>
                            <td>象式歼击车</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection