		<!-- Header start -->
        <header class="header">
            <div class="toggle-btns">
                <a id="toggle-sidebar" href="#">
                    <i class="icon-menu"></i>
                </a>
                <a id="pin-sidebar" href="#">
                    <i class="icon-menu"></i>
                </a>
            </div>
            <div class="header-items">
                <!-- Custom search start -->
                <div class="custom-search">
                    <input type="text" class="search-query" placeholder="Search here ...">
                    <i class="icon-search1"></i>
                </div>
                <!-- Custom search end -->

                <!-- Header actions start -->
                <ul class="header-actions">
                    <li class="dropdown d-none d-sm-block">
                        <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                            <i class="icon-calendar1"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right lrg" aria-labelledby="notifications">
                            <div class="dropdown-menu-header">
                                Events (10)
                            </div>
                            <ul class="header-notifications">
                                <li>
                                    <a href="#">
                                        <div class="user-img away">
                                            <img src="img/user6.png" alt="Admin Template">
                                        </div>
                                        <div class="details">
                                            <div class="user-title">Abbott</div>
                                            <div class="noti-details">Membership has been ended.</div>
                                            <div class="noti-date">Today, 07:30 pm</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="user-img busy">
                                            <img src="img/user13.png" alt="Premium Admin Dashboards">
                                        </div>
                                        <div class="details">
                                            <div class="user-title">Braxten</div>
                                            <div class="noti-details">Approved new design.</div>
                                            <div class="noti-date">Today, 12:00 am</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="user-img online">
                                            <img src="img/user19.png" alt="Premium Admin Dashboards">
                                        </div>
                                        <div class="details">
                                            <div class="user-title">Larkyn</div>
                                            <div class="noti-details">Check out every table in detail.</div>
                                            <div class="noti-date">Today, 04:00 pm</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown d-none d-sm-block">
                        <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                            <i class="icon-star2"></i>
                            <span class="count-label blue"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right lrg" aria-labelledby="notifications">
                            <div class="dropdown-menu-header">
                                Bookmarks (21)
                            </div>
                            <div class="customScroll5">
                                <ul class="bookmarks p-3">
                                    <li>
                                        <a href="#">Bootstrap admin template</a>
                                    </li>
                                    <li>
                                        <a href="#">Images resources</a>
                                    </li>
                                    <li>
                                        <a href="#">Best admin templates 2023</a>
                                    </li>
                                    <li>
                                        <a href="#">Javascript libraries</a>
                                    </li>
                                    <li>
                                        <a href="#">Angular widgets</a>
                                    </li>
                                    <li>
                                        <a href="#">UX library</a>
                                    </li>
                                    <li>
                                        <a href="#">Bootstrap admin template</a>
                                    </li>
                                    <li>
                                        <a href="#">Images resources</a>
                                    </li>
                                    <li>
                                        <a href="#">Best admin templates 2023</a>
                                    </li>
                                    <li>
                                        <a href="#">Javascript libraries</a>
                                    </li>
                                    <li>
                                        <a href="#">Angular widgets</a>
                                    </li>
                                    <li>
                                        <a href="#">UX library</a>
                                    </li>
                                    <li>
                                        <a href="#">Bootstrap admin template</a>
                                    </li>
                                    <li>
                                        <a href="#">Images resources</a>
                                    </li>
                                    <li>
                                        <a href="#">Best admin templates 2023</a>
                                    </li>
                                    <li>
                                        <a href="#">Javascript libraries</a>
                                    </li>
                                    <li>
                                        <a href="#">Angular widgets</a>
                                    </li>
                                    <li>
                                        <a href="#">UX library</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <x-dashboard.notification-menu />
                    <li class="dropdown user-settings">
                        <a href="#" id="userSettings" data-toggle="dropdown" aria-haspopup="true">
                            <img src="{{URL::asset('img/user7.png')}}" class="user-avatar" alt="Top Admin Dashboards">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
                            <div class="header-profile-actions">
                                <div class="header-user-profile">
                                    <div class="header-user">
                                        <img src="{{URL::asset('img/user7.png')}}" alt="Admin Template">
                                    </div>
                                    <h5>{{ Auth::user()->name }}</h5>
                                    <p>Super User</p>
                                </div>
                                <a href="user-profile.html"><i class="icon-user1"></i> My Profile</a>
                                <a href="{{route('dashboard.profile.edit')}}"><i class="icon-settings1"></i> Account Settings</a>
                                {{-- <a href="login.html"><i class="icon-log-out1"></i> Sign Out</a> --}}

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        <i class="icon-log-out1"></i>
                                        {{ __('Log Out') }}
                                    </a>
                                </form>

                            </div>
                        </div>
                    </li>
                </ul>
                <!-- Header actions end -->
            </div>
        </header>
        <!-- Header end -->
