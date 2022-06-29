
<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="{{asset('theme/assets/images/logo/small-logo.png')}}" alt=""><img class="img-fluid for-dark" src="../assets/images/logo/small-white-logo.png" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="{{asset('theme/assets/images/logo-icon.png')}}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="index.html"><img class="img-fluid" src="{{asset('theme/assets/images/logo-icon.png')}}" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true">        </i></div>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <g>
                                        <path d="M9.07861 16.1355H14.8936" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.3999 13.713C2.3999 8.082 3.0139 8.475 6.3189 5.41C7.7649 4.246 10.0149 2 11.9579 2C13.8999 2 16.1949 4.235 17.6539 5.41C20.9589 8.475 21.5719 8.082 21.5719 13.713C21.5719 22 19.6129 22 11.9859 22C4.3589 22 2.3999 22 2.3999 13.713Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </g>
                            </svg><span class="lan-3">Quản lý trang chủ              </span></a>
                        <ul class="sidebar-submenu">
                            <li><a class="lan-4" href="index.html">Danh mục</a></li>
{{--                            <li><a class="lan-5" href="dashboard-02.html">E-commerce</a></li>--}}
{{--                            <li><a href="crypto-dashboard.html">Crypto</a></li>--}}
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <g>
                                        <path d="M14.3053 15.45H8.90527" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M12.2604 11.4387H8.90442" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.1598 8.3L14.4898 2.9C13.7598 2.8 12.9398 2.75 12.0398 2.75C5.74978 2.75 3.64978 5.07 3.64978 12C3.64978 18.94 5.74978 21.25 12.0398 21.25C18.3398 21.25 20.4398 18.94 20.4398 12C20.4398 10.58 20.3498 9.35 20.1598 8.3Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M13.9342 2.83276V5.49376C13.9342 7.35176 15.4402 8.85676 17.2982 8.85676H20.2492" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </g>
                            </svg><span>Quản lý dòng xe                </span></a>
                        <ul class="sidebar-submenu" >
                            <li><a href="{{route('indexVeh')}}">Dòng xe</a></li>
{{--                            <li><a href="{{route('indexCateNews')}}">Danh mục tin tức</a></li>--}}
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <g>
                                        <path d="M7.30566 14.5743H16.8987" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 7.79836C2.5 5.35646 3.75 3.25932 6.122 2.77265C8.493 2.28503 10.295 2.4536 11.792 3.26122C13.29 4.06884 12.861 5.26122 14.4 6.13646C15.94 7.01265 18.417 5.69646 20.035 7.44217C21.729 9.26979 21.72 12.0755 21.72 13.8641C21.72 20.6603 17.913 21.1993 12.11 21.1993C6.307 21.1993 2.5 20.7288 2.5 13.8641V7.79836Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M13.9342 2.83276V5.49376C13.9342 7.35176 15.4402 8.85676 17.2982 8.85676H20.2492" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </g>
                            </svg><span>Quản lý hãng xe               </span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('indexComp')}}">Hãng xe</a></li>

                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <g>
                                    <path d="M5.52377 7C9.41427 5.74386 13.9724 5.45573 16 5.5C18.0276 5.54427 18.8831 6.2663 19.5 7.5C20.5 9.5 20.289 14.4881 18.5 16.0871C16.712 17.6861 9.33015 17.8381 6.87015 16.0871C4.27115 14.2361 5.629 9.192 5.544 5.743C5.595 3.813 3.5 3.5 3.5 3.5" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M13 10.5H15.773" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.26399 20.1274C7.56399 20.1274 7.80799 20.3714 7.80799 20.6714C7.80799 20.9724 7.56399 21.2164 7.26399 21.2164C6.96299 21.2164 6.71899 20.9724 6.71899 20.6714C6.71899 20.3714 6.96299 20.1274 7.26399 20.1274Z" fill="#130F26" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5954 20.1274C17.8964 20.1274 18.1404 20.3714 18.1404 20.6714C18.1404 20.9724 17.8964 21.2164 17.5954 21.2164C17.2954 21.2164 17.0514 20.9724 17.0514 20.6714C17.0514 20.3714 17.2954 20.1274 17.5954 20.1274Z" fill="#130F26" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </g>
                            </svg><span>Quản lý tuyến đường               </span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('indexRoute')}}">Tuyến đường</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <g>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5103 10.7105C14.5103 9.3292 13.391 8.20996 12.0097 8.20996C10.6295 8.20996 9.51025 9.3292 9.51025 10.7105C9.51025 12.0907 10.6295 13.21 12.0097 13.21C13.391 13.21 14.5103 12.0907 14.5103 10.7105Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9995 21C9.10148 21 4.5 15.9587 4.5 10.5986C4.5 6.40246 7.8571 3 11.9995 3C16.1419 3 19.5 6.40246 19.5 10.5986C19.5 15.9587 14.8985 21 11.9995 21Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </g>
                            </svg><span>Đặt vé</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('indexTicket')}}">Quản lý đơn đặt vé</a></li>
                            <li><a href="{{route('indexOrderStatus')}}">Trạng thái đơn đặt bé</a></li>
                        </ul>

                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <g>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5103 10.7105C14.5103 9.3292 13.391 8.20996 12.0097 8.20996C10.6295 8.20996 9.51025 9.3292 9.51025 10.7105C9.51025 12.0907 10.6295 13.21 12.0097 13.21C13.391 13.21 14.5103 12.0907 14.5103 10.7105Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9995 21C9.10148 21 4.5 15.9587 4.5 10.5986C4.5 6.40246 7.8571 3 11.9995 3C16.1419 3 19.5 6.40246 19.5 10.5986C19.5 15.9587 14.8985 21 11.9995 21Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </g>
                            </svg><span>Đặt xe hợp đồng</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('indexVehRes')}}">Quản lý đơn đặt xe </a></li>
                            <li><a href="{{route('indexVehicleStatus')}}">Trạng thái đơn đặt xe</a></li>
                            <li><a href="{{route('hotloc.index')}}">Địa điểm du lịch</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <g>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0003 6.6738C21.0003 8.7024 19.3551 10.3476 17.3265 10.3476C15.2979 10.3476 13.6536 8.7024 13.6536 6.6738C13.6536 4.6452 15.2979 3 17.3265 3C19.3551 3 21.0003 4.6452 21.0003 6.6738Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3467 6.6738C10.3467 8.7024 8.7024 10.3476 6.6729 10.3476C4.6452 10.3476 3 8.7024 3 6.6738C3 4.6452 4.6452 3 6.6729 3C8.7024 3 10.3467 4.6452 10.3467 6.6738Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0003 17.2619C21.0003 19.2905 19.3551 20.9348 17.3265 20.9348C15.2979 20.9348 13.6536 19.2905 13.6536 17.2619C13.6536 15.2333 15.2979 13.5881 17.3265 13.5881C19.3551 13.5881 21.0003 15.2333 21.0003 17.2619Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3467 17.2619C10.3467 19.2905 8.7024 20.9348 6.6729 20.9348C4.6452 20.9348 3 19.2905 3 17.2619C3 15.2333 4.6452 13.5881 6.6729 13.5881C8.7024 13.5881 10.3467 15.2333 10.3467 17.2619Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </g>
                            </svg><span>Quản lý hệ thống</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('sliders.index')}}">Quản lý Sliders </a></li>
                            <li><a href="{{route('infor.index')}}">Thông tin chung</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
