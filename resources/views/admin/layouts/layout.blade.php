<!doctype html>
<html>

<head>
    @include('layouts.head.head')
</head>

<body>
    @include('components.header.header')
    @yield('content')
    @include('layouts.footer.footer')
</body>

</html>