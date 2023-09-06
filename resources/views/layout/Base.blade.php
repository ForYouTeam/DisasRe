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

        {{-- <div class="footer-copyright-area" style="margin-top: 650px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

@include('layout.Footer')
@yield('script')
</body>

</html>