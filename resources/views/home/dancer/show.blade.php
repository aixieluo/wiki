@extends('home.layouts.app')

@section('content')
<section class="xd-detail">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="f-wrap">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="text-center">
                                <div class="d-avatar">
                                    <img class="img-circle img-thumbnail" src="{{ asset('img/avatar_demo.png') }}" />
                                </div>
                                <div class="d-name"><span class="label label-success">{{ $dancer->name }}</span></div>
                                <div class="d-outfit"><span class="label label-danger">{{ $dancer->dance_outfit }}</span></div>
                            </div>
                        </div>

                        <div class="col-xs-8">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active" role="presentation"><a href="#character" aria-controls="character" role="tab" data-toggle="tab">性格</a></li>
                                <li role="presentation"><a href="#introduction" aria-controls="introduction" role="tab" data-toggle="tab">人物简介</a></li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="character">
                                    <small>{{ $dancer->character }}</small>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="introduction">
                                    <small>{{ $dancer->introduction }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="f-wrap">
                    <table class="d-attribute">
                        <tr>
                            <th colspan="6">角色属性</th>
                        </tr>
                        <tr>
                            <td>火力</td>
                            <td>573</td>
                            <td>穿甲</td>
                            <td>273</td>
                            <td>耐久</td>
                            <td>864</td>
                        </tr>
                        <tr>
                            <td>装甲</td>
                            <td>302</td>
                            <td>命中</td>
                            <td>90</td>
                            <td>闪避</td>
                            <td>80</td>
                        </tr>
                        <tr>
                            <td>隐蔽</td>
                            <td>50</td>
                            <td>侦查</td>
                            <td>65</td>
                            <td>射程</td>
                            <td>864</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection