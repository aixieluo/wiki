@extends('home.layouts.app')

@section('content')
<section class="xd-detail">
    <div class="container">
        <div class="xwrap">
            <div class="row">
                <div class="col-md-2 col-md-offset-1">
                    <div class="d-avator text-center">
                        <img class="img-circle img-thumbnail" src="{{ $dancer->images->get('avator') }}" />
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
                            <td>=-=</td>
                            <td>稀有度</td>
                            <td>{{ $dancer->rarity }}</td>
                        </tr>
                        <tr>
                            <td>类型</td>
                            <td>{{ $dancer->type }}</td>
                            <td>国别</td>
                            <td>{{ $dancer->country }}</td>
                        </tr>
                        <tr>
                            <td>隶属机构</td>
                            <td>{{ $dancer->subjection }}</td>
                            <td>配音</td>
                            <td>=-=</td>
                        </tr>
                        <tr>
                            <td>画师</td>
                            <td>S.V.S</td>
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
                <h3>基础属性</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-xs-6"><i class="fa fa-star" aria-hidden="true"></i></div>
                        <div class="col-xs-6 text-right">Lv.<input class="lv-ipt" type="tel" value="1" maxlength="3" max="99" min="1"></div>
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <td>火力</td>
                            <td>{{ $dancer->attributes->fire }}</td>
                            <td>穿甲</td>
                            <td>{{ $dancer->attributes->penetrate }}</td>
                            <td>耐久</td>
                            <td>{{ $dancer->attributes->durable }}</td>
                        </tr>
                        <tr>
                            <td>装甲</td>
                            <td>{{ $dancer->attributes->armor }}</td>
                            <td>命中</td>
                            <td>{{ $dancer->attributes->hit }}</td>
                            <td>闪避</td>
                            <td>{{ $dancer->attributes->dodge }}</td>
                        </tr>
                        <tr>
                            <td>隐蔽</td>
                            <td>{{ $dancer->attributes->concealment }}</td>
                            <td>侦查</td>
                            <td>{{ $dancer->attributes->spy }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="page-header">
                <h3>成长性</h3>
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
                <h3>装备槽</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            @for($i=0; $i<$dancer->barbette; $i++)
                            <td>炮座</td>
                            @endfor
                            @for($i=0; $i<$dancer->refit; $i++)
                            <td>改装</td>
                            @endfor
                            @for($i=0; $i<$dancer->outside; $i++)
                            <td>外身</td>
                            @endfor
                            @for($i=0; $i<$dancer->inwall; $i++)
                            <td>内壁</td>
                            @endfor
                            @for($i=0; $i<$dancer->inwarehouse; $i++)
                            <td>内仓</td>
                            @endfor
                            @for($i=0; $i<$dancer->carriage; $i++)
                            <td>炮架</td>
                            @endfor
                            @for($i=0; $i<$dancer->special; $i++)
                            <td>特殊</td>
                            @endfor
                        </tr>
                    </table>
                </div>
            </div>
            <div class="page-header">
                <h3>科技</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <td>弹药</td>
                            <td>XXXX破甲弹</td>
                        </tr>
                        <tr>
                            <td>装甲</td>
                            <td>XXXX破甲弹</td>
                        </tr>
                        <tr>
                            <td>引擎</td>
                            <td>XXXX破甲弹</td>
                        </tr>
                        <tr>
                            <td>车身</td>
                            <td>XXXX破甲弹</td>
                        </tr>
                    </table>
                </div>
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