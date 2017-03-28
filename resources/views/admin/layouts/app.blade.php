<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/css/app.css"/>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">

    @yield('content')

</div>
<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>