<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.html" style="margin-right: 1.5rem; font-size: 15pt;"><img class="main-logo" src="{{asset('Logo.png')}}" style="max-width: 4rem; margin-top: 0.4rem;" alt="" /><b>BPBD SIGI</b></a>
            <strong><a href="index.html"><img src="{{asset('Logo.png')}}" alt="" /></a>BPBD</strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <strong style="color: rgba(0, 0, 0, 0.438); padding: 15px; margin-bottom: -7px; margin-top: 20px" >DASHBOARD</strong>
                    <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
                        <a title="Landing Page" href="{{route('dashboard')}}" aria-expanded="false">
                            <span class="educate-icon educate-home icon-wrap"></span>
                            Home
                        </a>
                    </li>
                    @if (Auth::user()->scope == 'admin' || Auth::user()->scope == 'super-admin')
                        <strong style="color: rgba(0, 0, 0, 0.438); padding: 15px; margin-bottom: -10px" >MENU</strong>
                        <li class="{{ Route::is('bo-report-image') ? 'active' : '' }}">
                            <a title="Landing Page" href="{{route('bo-report-image')}}" aria-expanded="false">
                                <span class="educate-icon educate-course icon-wrap"></span>
                            Laporan
                            </a>
                        </li>
                        <li class="{{ Route::is('bo-reporter') ? 'active' : '' }}">
                            <a title="Landing Page" href="{{route('bo-reporter')}}" aria-expanded="false">
                                <span class="educate-icon educate-course icon-wrap"></span>
                            Pelapor
                            </a>
                        </li>
                        <li class="{{ Route::is('bo-flood') ? 'active' : '' }}">
                            <a title="Landing Page" href="{{route('bo-flood')}}" aria-expanded="false">
                                <span class="educate-icon educate-course icon-wrap"></span>
                            Banjir
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->scope == 'super-admin')
                        <strong style="color: rgba(0, 0, 0, 0.438); padding: 15px; margin-bottom: -10px" >USER</strong>
                        <li class="{{ Route::is('bo-user') ? 'active' : '' }}">
                            <a title="Landing Page" href="{{route('bo-user')}}" aria-expanded="false">
                                <span class="educate-icon educate-course icon-wrap"></span>
                            Akun
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </nav>
</div>