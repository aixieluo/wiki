<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>钢华Wiki</title>
    <link rel="stylesheet" href="{{ mix('css/manage.css') }}">

    <script>
        window.Laravel = {
            csrfToken: "{{ csrf_token() }}"
        }

        window.User = {!! Auth::guest() !!}

    </script>
</head>
<body>

    <div id="app"></div>

    <script src="{{ mix('/js/manage.js') }}"></script>
</body>
</html>