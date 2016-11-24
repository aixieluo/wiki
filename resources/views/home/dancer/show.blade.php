@extends('home.layouts.app')

@section('content')
    <section class="xd-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="f-wrap">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="d-avatar">
                                    <img class="img-circle img-thumbnail" src="{{ asset('img/avatar_demo.png') }}" />
                                </div>
                                <div class="d-name"><span class="label label-success">米歇尔·法梅加</span></div>
                                <div class="d-outfit"><span class="label label-danger">豹式G型</span></div>
                            </div>

                            <div class="col-xs-8">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="active" role="presentation"><a href="#character" aria-controls="character" role="tab" data-toggle="tab">性格</a></li>
                                    <li role="presentation"><a href="#introduction" aria-controls="introduction" role="tab" data-toggle="tab">人物简介</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="character">
                                        <small>实力靠机师，表现飘忽不定的狐狸拳。S1大范围麻痹控场高雷伤和攻速BUFF，S2高火伤高倍率，然后获得游戏中最强力的可以看作无敌的防御BUFF。
                                            狐狸拳这个角色的上下限差距非常大，在延长BUFF时间的武器和戒指的支持下，一只装备完备的狐狸是拥有相当强力的单刷能力。面对高难度副本，狐狸需要控制好自己的SP量来获得被动AS增益，另一方面也要时刻把握好防御BUFF的持续，需要相当的操作技术和节奏感。
                                            总之这个角色在大触手里有不输SS角色的实力，在萌新手里就只能是一直表现平平的卖萌狐狸了。</small>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="introduction">
                                        <small>S2高火伤高倍率，然后获得游戏中最强力的可以看作无敌的防御BUFF。
                                            狐狸拳这个角色的上下限差距非常大，在延长BUFF时间的武器和戒指的支持下，一只装备完备的狐狸是拥有相当强力的单刷能力。面对高难度副本，狐狸需要控制好自己的SP量来获得被动AS增益，另一方面也要时刻把握好防御BUFF的持续，需要相当的操作技术和节奏感。
                                            总之这个角色在大触手里有不输SS角色的实力，在萌新手里就只能是一直表现平平的卖萌狐狸了。</small>
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