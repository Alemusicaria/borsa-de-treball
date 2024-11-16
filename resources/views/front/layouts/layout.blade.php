<!doctype html>
<html>

<head>
    @include('front.layouts.head.head')
</head>

<body>
    @include('front.components.header.header')
    @yield('content')
    @include('front.layouts.footer.footer')
</body>

</html>