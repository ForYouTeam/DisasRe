<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.html"><img class="main-logo" src="{{asset('assets/img/logo/logo.png')}}" alt="" /></a>
            <strong><a href="index.html"><img src="{{asset('assets/img/logo/logosn.png')}}" alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <strong style="color: rgba(0, 0, 0, 0.438); padding: 15px; margin-bottom: -7px; margin-top: 20px" >DASHBOARD</strong>
                    <li class="{{ (request()->is('dashboard')) ? 'active' : '' }}">
                        <a title="Landing Page" href="{{route('dashboard')}}" aria-expanded="false">
                            <span class="educate-icon educate-home icon-wrap"></span>
                            Home
                        </a>
                    </li>
                    <strong style="color: rgba(0, 0, 0, 0.438); padding: 15px; margin-bottom: -10px" >MENU</strong>
                    <li class="{{ (request()->is('report-image')) ? 'active' : '' }}">
                        <a title="Landing Page" href="{{route('bo-report-image')}}" aria-expanded="false">
                            <span class="educate-icon educate-course icon-wrap"></span>
                           Laporan
                        </a>
                    </li>
                    <li class="{{ (request()->is('reporter')) ? 'active' : '' }}">
                        <a title="Landing Page" href="{{route('bo-reporter')}}" aria-expanded="false">
                            <span class="educate-icon educate-course icon-wrap"></span>
                           Pelapor
                        </a>
                    </li>
                    <li class="{{ (request()->is('flood')) ? 'active' : '' }}">
                        <a title="Landing Page" href="{{route('bo-flood')}}" aria-expanded="false">
                            <span class="educate-icon educate-course icon-wrap"></span>
                           Banjir
                        </a>
                    </li>
                    <strong style="color: rgba(0, 0, 0, 0.438); padding: 15px; margin-bottom: -10px" >USER</strong>
                    <li class="{{ (request()->is('user')) ? 'active' : '' }}">
                        <a title="Landing Page" href="{{route('bo-user')}}" aria-expanded="false">
                            <span class="educate-icon educate-course icon-wrap"></span>
                           Akun
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>