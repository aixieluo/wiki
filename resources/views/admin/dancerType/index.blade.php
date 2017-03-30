@extends('admin.layouts.app')

@section('title', '车型管理')

@section('links')
    @parent

@endsection

@section('head')
    <li>
        <a href="index.html">车型</a>
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
                                <th>数据</th>
                                <th>用户</th>
                                <th>值</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td><span class="line">5,3,2,-1,-3,-2,2,3,5,2</span>
                                </td>
                                <td>张三</td>
                                <td class="text-navy"> <i class="fa fa-level-up"></i> 40%</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><span class="line">5,3,9,6,5,9,7,3,5,2</span>
                                </td>
                                <td>李四</td>
                                <td class="text-warning"> <i class="fa fa-level-down"></i> -20%</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><span class="line">1,6,3,9,5,9,5,3,9,6,4</span>
                                </td>
                                <td>王麻子</td>
                                <td class="text-navy"> <i class="fa fa-level-up"></i> 26%</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection