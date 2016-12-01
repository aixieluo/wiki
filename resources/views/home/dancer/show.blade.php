@extends('home.layouts.app')

@section('content')
<section class="xd-detail">
    <div class="container">
        <div class="xwrap">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-avatar">
                        <img class="img-circle img-thumbnail" src="{{ $dancer->images->get('avator') }}" />
                    </div>
                    <div class="d-name"><span class="label label-success">{{ $dancer->name }}</span></div>
                    <div class="d-outfit"><span class="label label-danger">{{ $dancer->dance_outfit }}</span></div>
                </div>
                <div class="col-md-5"></div>
            </div>
            <h3>基础属性</h3>
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
            <h3>装备槽</h3>
            <div class="row">
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tr>
                            <td>炮座</td>
                            <td>炮座</td>
                            <td>炮座</td>
                            <td>炮座</td>
                            <td>炮座</td>
                            <td>炮座</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection