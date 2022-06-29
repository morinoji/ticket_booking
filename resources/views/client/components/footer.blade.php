<footer class="footer" style="background-image: url({{asset('RouteBus/assets/images/footer/backGroud.png')}})">
    <div class="container-xl">
        <div class="footer-wrapper">
            <div class="footer-info">
                <h3 class="footer-heading"> {{trans('home.contact')}}</h3>

                <ul class="nav flex-column footer-nav">
                    <li class="nav-item">
                        <a class="nav-link footer-nav__link" href="#">
                            <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="24"
                                 height="24" viewBox="0 0 24 24">
                                <g id="pin">
                                    <rect id="Rectangle_22" data-name="Rectangle 22" width="24" height="24"
                                          fill="#f58523" opacity="0" />
                                    <circle id="Ellipse_2" data-name="Ellipse 2" cx="1.5" cy="1.5" r="1.5"
                                            transform="translate(10.5 8)" fill="#f58523" />
                                    <path id="Path_30" data-name="Path 30"
                                          d="M12,2A8,8,0,0,0,4,9.92c0,5.48,7.05,11.58,7.35,11.84a1,1,0,0,0,1.3,0C13,21.5,20,15.4,20,9.92A8,8,0,0,0,12,2Zm0,11a3.5,3.5,0,1,1,3.5-3.5A3.5,3.5,0,0,1,12,13Z"
                                          fill="#f58523" />
                                </g>
                            </svg>

                            {{trans('home.contact.addr')}}: {{optional(\App\Info::first()) ->address}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link footer-nav__link" href="#">
                            <svg id="phone" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24">
                                <rect id="Rectangle_21" data-name="Rectangle 21" width="24" height="24"
                                      fill="#f58523" opacity="0" />
                                <path id="Path_29" data-name="Path 29"
                                      d="M17.4,22A15.42,15.42,0,0,1,2,6.6,4.6,4.6,0,0,1,6.6,2a3.94,3.94,0,0,1,.77.07,3.79,3.79,0,0,1,.72.18A1,1,0,0,1,8.74,3l1.37,6a1,1,0,0,1-.26.92c-.13.14-.14.15-1.37.79a9.91,9.91,0,0,0,4.87,4.89c.65-1.24.66-1.25.8-1.38a1,1,0,0,1,.92-.26l6,1.37a1,1,0,0,1,.72.65,4.34,4.34,0,0,1,.19.73,4.77,4.77,0,0,1,.06.76A4.6,4.6,0,0,1,17.4,22Z"
                                      fill="#f58523" />
                            </svg>

                            Hotline: {{optional(\App\Info::first()) ->phone}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link footer-nav__link" href="#">
                            <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="24"
                                 height="24" viewBox="0 0 24 24">
                                <g id="email">
                                    <rect id="Rectangle_20" data-name="Rectangle 20" width="24" height="24"
                                          fill="#f58523" opacity="0" />
                                    <path id="Path_28" data-name="Path 28"
                                          d="M19,4H5A3,3,0,0,0,2,7V17a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V7a3,3,0,0,0-3-3Zm0,2-6.5,4.47a1,1,0,0,1-1,0L5,6Z"
                                          fill="#f58523" />
                                </g>
                            </svg>

                            Email:  {{optional(\App\Info::first())->email}}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link footer-nav__link" href="#">
                            <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="24"
                                 height="24" viewBox="0 0 24 24">
                                <g id="clock">
                                    <rect id="Rectangle_19" data-name="Rectangle 19" width="24" height="24"
                                          transform="translate(24 24) rotate(180)" fill="#f58523" opacity="0" />
                                    <path id="Path_27" data-name="Path 27"
                                          d="M12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm4,11H12a1,1,0,0,1-1-1V8a1,1,0,0,1,2,0v3h3a1,1,0,0,1,0,2Z"
                                          fill="#f58523" />
                                </g>
                            </svg>

                            {{trans('home.contact.working')}}:  {{optional(\App\Info::first())->working_hour}}
                        </a>
                    </li>

                </ul>

                <img src="{{asset('RouteBus/assets/images/footer/graund.png')}}" alt="Image" class="footer-info__img" />
            </div>

            <div class="footer-assist">
                <h3 class="footer-heading"> {{trans('home.support')}}</h3>

                <ul class="nav flex-column footer-nav">
                    @if(Config::get('app.locale')=='en')
                        @foreach(\App\InfoList::all() as $element)
                            <li class="nav-item">
                                <a class="nav-link footer-nav__link" href="{{$element->link}}">
                                    <svg id="arrow-right" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24">
                                        <rect id="Rectangle_18" data-name="Rectangle 18" width="24" height="24"
                                              transform="translate(24 24) rotate(180)" fill="#f58523" opacity="0" />
                                        <path id="Path_26" data-name="Path 26"
                                              d="M10.46,18a2.23,2.23,0,0,1-.91-.2A1.76,1.76,0,0,1,8.5,16.21V7.79A1.76,1.76,0,0,1,9.55,6.2a2.1,2.1,0,0,1,2.21.26l5.1,4.21a1.7,1.7,0,0,1,0,2.66l-5.1,4.21A2.06,2.06,0,0,1,10.46,18Z"
                                              fill="#f58523" />
                                    </svg>

                                    {{$element->title_eng}}
                                </a>
                            </li>
                        @endforeach
                    @elseif(Config::get('app.locale')=='vi')
                        @foreach(\App\InfoList::all() as $element)
                            <li class="nav-item">
                                <a class="nav-link footer-nav__link" href="{{$element->link}}">
                                    <svg id="arrow-right" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24">
                                        <rect id="Rectangle_18" data-name="Rectangle 18" width="24" height="24"
                                              transform="translate(24 24) rotate(180)" fill="#f58523" opacity="0" />
                                        <path id="Path_26" data-name="Path 26"
                                              d="M10.46,18a2.23,2.23,0,0,1-.91-.2A1.76,1.76,0,0,1,8.5,16.21V7.79A1.76,1.76,0,0,1,9.55,6.2a2.1,2.1,0,0,1,2.21.26l5.1,4.21a1.7,1.7,0,0,1,0,2.66l-5.1,4.21A2.06,2.06,0,0,1,10.46,18Z"
                                              fill="#f58523" />
                                    </svg>

                                    {{$element->title}}
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container-xl">
            <div class="footer-bottom__cover">
                <h3 class="footer-heading">{{optional(\App\Info::first())->name}}</h3>
                <p class="footer-bottom__text">
                    {{trans('home.infor.regAddr')}}: {{optional(\App\Info::first()) ->enterprise_addr}}
                </p>
                <p class="footer-bottom__text">
                    {{trans('home.infor.addr')}}: {{optional(\App\Info::first()) ->address}}
                </p>
                <p class="footer-bottom__text">
                    {{trans('home.infor.cer')}}: {{optional(\App\Info::first()) ->dkkd}}
                </p>
                <p class="footer-bottom__text premium">
                    Copyright © 2022 Bản quyền thuộc về PROHOME GROUP
                </p>
            </div>
        </div>
    </div>
</footer>
