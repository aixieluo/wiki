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

                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>车型</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>
                                        <a href="{{ url('/admin/type/'.$item->id.'/edit') }}">修改</a>
                                        /
                                        <a href="##">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection