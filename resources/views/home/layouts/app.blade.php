<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="/css/app.css"/>
    <script type="text/javascript" src="/js/app.js"></script>
</head>
<body>
<header>
    {{--<h1>钢铁华尔兹资讯站</h1>--}}
</header>

<nav class="main-navigation">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="navbar-header">
							<span role="button" class="navbar-toggle-button" data-toggle="collapse" data-target="#mainMenu" aria-expanded="false">
								<span class="sr-only">切换导航</span>
						       	<i class="icon-list"></i>
							</span>
                </div>
                <div class="collapse navbar-collapse" id="mainMenu">
                    <ul class="menu">
                        <li role="presentation"><a href="{{ url('/') }}">游戏简介</a></li>
                        <li role="presentation"><a href="{{ route('dancer.index') }}">钢舞姬</a></li>
                        <li role="presentation"><a href="#">地形与关卡</a></li>
                        <li role="presentation"><a href="#">建筑</a></li>
                        <li role="presentation"><a href="#">科技</a></li>
                        <li role="presentation"><a href="#">装备</a></li>
                        <li role="presentation"><a href="#">资源与商店</a></li>
                        <li role="presentation"><a href="#">模拟器</a></li>
                        <li role="presentation"><a href="#">同人画馆</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

@yield('content')

<a href="#" id="backToTop"><i class="icon-arrow-up"></i></a>

</body>
</html>