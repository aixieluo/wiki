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
        <strong>列表</strong>
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
                        <dancer-type></dancer-type>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection