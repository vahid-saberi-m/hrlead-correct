
<html>
<head>
    <link rel="stylesheet" href="{{asset('/css/app.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('/js/app.js')}}" type="text/javascript"/>
    {{--<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('css/propeller.min.css') }}" rel="stylesheet">--}}

    <title>App Name - @yield('title')</title>
</head>
<body>
@section('sidebar')
@show

<div class="container">
    @include('partials.errors')
    @include('partials.success')
    @yield('content')
</div>
</body>
</html>