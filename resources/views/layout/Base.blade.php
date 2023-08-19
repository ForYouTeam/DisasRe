<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('layout.Header')
</head>
@yield('style')

<body>
    @include('layout.Sidebar')

    <div class="all-content-wrapper">
        @include('layout.Nav')

        @yield('content')
    </div>

@include('layout.Footer')
</body>

</html>