<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>钢铁华尔兹资讯站</title>
    <link rel="stylesheet" href="{{ elixir('css/style.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/reference.css') }}">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="gray-bg">
    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>
                <div class="login-avatar">
                    <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1491654452396&di=f014a7c1c29390ee1e933dc108307865&imgtype=0&src=http%3A%2F%2Fi1.hdslb.com%2Fvideo%2F4e%2F4ee6ac4c2b9ca29c97c0d32d29b0abed.jpg">
                </div>
            </div>
            <h3>钢华wiki</h3>

            <form class="m-t" role="form" method="POST" action="{{ url('/admin/login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" class="form-control" placeholder="邮箱" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="password" name="password" class="form-control" placeholder="密码" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>

                {{--<p class="text-muted text-center"> <a href="login.html#"><small>忘记密码了？</small></a> | <a href="register.html">注册一个新账号</a></p>--}}
            </form>
        </div>
    </div>
</body>
</html>

