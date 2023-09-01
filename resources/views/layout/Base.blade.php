<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('layout.Header')
</head>
@yield('style')

<body>
    @include('layout.Sidebar')
    @include('sweetalert::alert')

    <div class="all-content-wrapper">
        @include('layout.Nav')

        @yield('content')
    </div>

@include('layout.Footer')
@yield('script')
</body>

</html>