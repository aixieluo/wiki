@extends('admin.layouts.app')

@section('title', '创建新舞姬')

@section('links')
    @parent

@endsection

@section('head')
    <li>
        <a href="index.html">钢舞姬</a>
    </li>
    <li>
        <strong>添加</strong>
    </li>
@endsection

@section('content')


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>基本属性</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="javascript:;">选项1</a>
                                </li>
                                <li><a href="javascript:;">选项2</a>
                                </li>
                            </ul>
                            {{--<a class="close-link">--}}
                                {{--<i class="fa fa-times"></i>--}}
                            {{--</a>--}}
                        </div>
                    </div>
                    <div class="ibox-content">
                        {!! Form::open(['url' => '',  'method' => 'post', 'class' => 'form-horizontal']) !!}
                            <div class="form-group">
                                {!! Form::label(NULL, '舞姬姓名', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('name', '', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                {!! Form::label(NULL, '舞装名称', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('dance_outfit', '', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                {!! Form::label(NULL, '车型', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::select('dancer_type_id', ['L' => 'Large', 'S' => 'Small'], null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                {!! Form::label(NULL, '国籍', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::select('country_id', ['L' => 'Large', 'S' => 'Small'], null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                {!! Form::label(NULL, '稀有度', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::select('rarity_id', ['L' => 'Large', 'S' => 'Small'], null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                {!! Form::label(NULL, '隶属机构', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('subjection', 'S.V.S', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                {!! Form::label(NULL, '人物介绍', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('introduction', '', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                {!! Form::label(NULL, '成长火力', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('grow_fire', '', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                {!! Form::label(NULL, '成长穿甲', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('grow_penetrate', '', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                {!! Form::label(NULL, '成长耐久', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('grow_durable', '', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                {!! Form::label(NULL, '成长装甲', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('grow_armor', '', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                {!! Form::label(NULL, '炮座', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('barbette', '', ['class' => 'form-control', 'placeholder' => '个数']) !!}
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                {!! Form::label(NULL, '改装', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('refit', '', ['class' => 'form-control', 'placeholder' => '个数']) !!}
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                {!! Form::label(NULL, '外身', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('outside', '', ['class' => 'form-control', 'placeholder' => '个数']) !!}
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                {!! Form::label(NULL, '内壁', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('inwall', '', ['class' => 'form-control', 'placeholder' => '个数']) !!}
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                {!! Form::label(NULL, '内仓', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('inwarehouse', '', ['class' => 'form-control', 'placeholder' => '个数']) !!}
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                {!! Form::label(NULL, '炮架', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('carriage', '', ['class' => 'form-control', 'placeholder' => '个数']) !!}
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                {!! Form::label(NULL, '特殊', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('special', '', ['class' => 'form-control', 'placeholder' => '个数']) !!}
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    {!! Form::submit('保存内容' ,['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
