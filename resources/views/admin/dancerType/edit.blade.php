@extends('admin.layouts.app')

@section('title', '车型管理')

@section('links')
    @parent

@endsection

@section('head')
    <li>
        <a href="{{ url('/admin/type') }}">车型</a>
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
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="form_basic.html#">选项1</a>
                                </li>
                                <li><a href="form_basic.html#">选项2</a>
                                </li>
                            </ul>
                            {{--<a class="close-link">--}}
                            {{--<i class="fa fa-times"></i>--}}
                            {{--</a>--}}
                        </div>
                    </div>
                    <div class="ibox-content">
                        {!! Form::open(['url' => '/admin/type/'.$dancerType->id,  'method' => 'put', 'class' => 'form-horizontal']) !!}
                        <div class="form-group">
                            {!! Form::label(NULL, '车型', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('type', $dancerType->type, ['class' => 'form-control', 'required' => 'true']) !!}
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