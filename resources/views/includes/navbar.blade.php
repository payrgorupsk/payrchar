<div id="main_header">
    <header>
        <div class="header-innr">

            <!-- Logo-->
            <div class="header-btn-traiger" uk-toggle="target: #wrapper ; cls: collapse-sidebar mobile-visible">
                <span></span></div>

            <!-- Logo-->
            <div id="logo" class="uk-visible@s">
                <a href="{{ url('/') }}"> <img src="{{ asset('public/holaTheme/assets/images/logo.png') }}" alt=""></a>
                <a href="{{ url('/') }}"> <img src="{{ asset('public/holaTheme/assets/images/logo-light.png') }}" class="logo-inverse" alt=""></a>
            </div>

            <!-- form search-->
            <div class="head_search">
                <form>
                    <div class="head_search_cont">
                        <input value="" type="text" class="form-control" placeholder="Search for Friends , Videos and more" autocomplete="off">
                        <i class="s_icon uil-search-alt"></i>
                    </div>

                    <!-- Search box dropdown -->
                    <div uk-dropdown="pos: top;mode:click;animation: uk-animation-slide-bottom-small" class="dropdown-search">
                        <!-- User menu -->

                        <ul class="dropdown-search-list">
                            <li class="list-title"> Recent Searches </li>
                            <li> <a href="#"> <img src="{{ asset('public/holaTheme/assets/images/avatars/avatar-2.jpg') }}" alt=""> Erica Jones
                                </a> </li>
                            <li> <a href="#"> <img src="{{ asset('public/holaTheme/assets/images/group/group-2.jpg') }}" alt=""> Coffee
                                    Addicts</a> </li>
                            <li> <a href="#"> <img src="{{ asset('public/holaTheme/assets/images/group/group-4.jpg') }}" alt=""> Mountain Riders
                                </a> </li>
                            <li> <a href="#"> <img src="{{ asset('public/holaTheme/assets/images/group/group-5.jpg') }}" alt=""> Property Rent
                                    And Sale </a> </li>
                            <li class="menu-divider"></li>
                            <li class="list-footer"> <a href="#"> Searches History </a>
                            </li>
                        </ul>
                    </div>


                </form>
            </div>

            <!-- user icons -->
            <div class="head_user">


                <a href="{{ url('/') }}" class="opts_icon_link uk-visible@s"> Home </a>
                <a href="{{ url('/profile',Auth::user()->first_name.Auth::user()->last_name) }}" class="opts_icon_link uk-visible@s"> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </a>

                <a href="#" class="opts_icon" uk-tooltip="title: Friend Request  ; pos: bottom ;offset:7">
                    <img src="{{ asset('public/holaTheme/assets/images/icons/friends.png') }}" alt="" style="width: 18px; height: 18px;"><span v-if='friendRequest'>@{{ friendRequest.length }}</span>
                </a>
                <!-- Message  notificiation dropdown -->
                <div uk-dropdown="mode:click ; animation: uk-animation-slide-bottom-small"
                    class="dropdown-notifications">

                    <!-- notification contents -->
                    <div class="dropdown-notifications-content" data-simplebar>

                        <!-- notivication header -->
                        <div class="dropdown-notifications-headline">
                            <h4>Friend Requests</h4>
                        </div>
                        <!-- notiviation list -->
                        <ul>
                            <li v-for="friend in friendRequest">
                                <a href="#">
                                    <span class="notification-avatar status-online">
                                        <img v-bind:src="'public/uploads/'+friend.requested_by_user.profile_image" onerror="this.src='public/uploads/profile/demo-profile.png'" alt="" style="max-height: 42px">
                                    </span>
                                    <div class="notification-text notification-msg-text">
                                        <strong>@{{ friend.requested_by_user.first_name }} @{{ friend.requested_by_user.last_name }}</strong>
                                        <p>sent friend request <span class="time-ago"></span> </p>

                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div> 
                    <div class="dropdown-notifications-footer">
                        <a href="#"> See all in Messages</a>
                    </div>
                </div>

                <a href="{{ url('/videos') }}" class="opts_icon" uk-tooltip="title:  Video; pos: bottom ;offset:7">
                    <img src="{{ asset('public/holaTheme/assets/images/icons/movies.png') }}" alt="" style="width: 18px; height: 18px;">
                </a>

                <!-- Message  notificiation dropdown -->
                <a href="#" class="opts_icon" uk-tooltip="title: Messages ; pos: bottom ;offset:7">
                    <img src="{{ asset('public/holaTheme/assets/images/icons/messenger.png') }}" alt="" style="width: 20px; height: 20px;"> <span>4</span>
                </a>

                <!-- Message  notificiation dropdown -->
                <!-- <div uk-dropdown="mode:click ; animation: uk-animation-slide-bottom-small"
                    class="dropdown-notifications"> -->

                    <!-- notification contents -->
                    <!-- <div class="dropdown-notifications-content" data-simplebar> -->

                        <!-- notivication header -->
                        <!-- <div class="dropdown-notifications-headline">
                            <h4>Messages</h4>
                            <a href="#">
                                <i class="icon-feather-settings"
                                    uk-tooltip="title: Message settings ; pos: left"></i>
                            </a>
                            <input type="text" class="uk-input" placeholder="Search in Messages">
                        </div> -->
                        <!-- notiviation list -->
                        <!-- <ul>
                            <li>
                                <a href="#">
                                    <span class="notification-avatar status-online">
                                        <img src="{{ asset('public/holaTheme/assets/images/avatars/avatar-2.jpg') }}" alt="">
                                    </span>
                                    <div class="notification-text notification-msg-text">
                                        <strong>Jonathan Madano</strong>
                                        <p>Thanks for The Answer ... <span class="time-ago"> 2 h </span> </p>

                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div> 
                    <div class="dropdown-notifications-footer">
                        <a href="#"> See all in Messages</a>
                    </div>
                </div> -->


                <!-- notificiation icon  -->
                <a href="#" class="opts_icon" uk-tooltip="title: Notifications ; pos: bottom ;offset:7">
                    <img src="{{ asset('public/holaTheme/assets/images/icons/notification.png') }}" alt="" style="width: 30px; height: 20px;"> <span>3</span>
                </a>


                <!-- notificiation dropdown -->
                <div uk-dropdown="mode:click ; animation: uk-animation-slide-bottom-small"
                    class="dropdown-notifications">

                    <!-- notification contents -->
                    <div class="dropdown-notifications-content" data-simplebar>

                        <!-- notivication header -->
                        <div class="dropdown-notifications-headline">
                            <h4>Notifications </h4>
                            <a href="#">
                                <i class="icon-feather-settings"
                                    uk-tooltip="title: Notifications settings ; pos: left"></i>
                            </a>
                        </div>

                        <!-- notiviation list -->
                        <ul>
                            <li>
                                <a href="#">
                                    <span class="notification-avatar">
                                        <img src="{{ asset('public/holaTheme/assets/images/avatars/avatar-2.jpg') }}" alt="">
                                    </span>
                                    <span class="notification-icon bg-gradient-primary">
                                        <i class="icon-feather-thumbs-up"></i></span>
                                    <span class="notification-text">
                                        <strong>Adrian Moh.</strong> Like Your Comment On Video
                                        <span class="text-primary">Learn Prototype Faster</span>
                                        <br> <span class="time-ago"> 9 hours ago </span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>


                <!-- profile -image -->
                <a class="opts_account" href="{{ url('/profile',Auth::user()->first_name.Auth::user()->last_name) }}">
                    @if (!empty(Auth::user()->profile_image) && file_exists('public/uploads/'.Auth::user()->profile_image))
                    <img src="{{ asset('public/uploads/'.Auth::user()->profile_image) }}" alt="Profile Image">
                    @else
                    <img src="{{ asset('public/uploads/profile/demo-profile.png') }}" alt="Profile Image">
                    @endif
                </a>

                <!-- profile dropdown-->
                <div uk-dropdown="mode:click ; animation: uk-animation-slide-bottom-small" class="dropdown-notifications rounded">

                    <!-- User Name / Avatar -->
                    <a href="{{ url('/profile',Auth::user()->first_name.Auth::user()->last_name) }}">

                        <div class="dropdown-user-details">
                            <div class="dropdown-user-avatar">
                                @if (!empty(Auth::user()->profile_image) && file_exists('public/uploads/'.Auth::user()->profile_image))
                                <img src="{{ asset('public/uploads/'.Auth::user()->profile_image) }}" alt="Profile Image">
                                @else
                                <img src="{{ asset('public/uploads/profile/demo-profile.png') }}" alt="Profile Image">
                                @endif
                            </div>
                            <div class="dropdown-user-name">  {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}  <span>See your profile</span> </div>
                        </div>

                    </a>
                    <hr class="m-0">
                    <ul class="dropdown-user-menu">
                        <li><a href="{{ url('/profile',Auth::user()->first_name.Auth::user()->last_name) }}"> <i class="uil-user"></i> My Account </a> </li>
                        <li><a href="{{ url('/user/about') }}"> <i class="uil-cog"></i> Account Settings</a></li>

                        <li><a href="{{ url('/wallet/show') }}"> <i class="uil-wallet"></i> Wallet </a></li>
                        <li class="{{ $menu == 'blog' ? 'active' : '' }}"><a href="{{ route('my.articles') }}"> <i class="uil-book"></i> my articles </a></li>
                        </li>

                        <li>
                            <a href="#" id="night-mode" class="btn-night-mode">
                                <i class="uil-moon"></i> Night mode
                                <span class="btn-night-mode-switch">
                                    <span class="uk-switch-button"></span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <form action="{{ url('/logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary float-right"> <i class="uil-sign-out-alt"></i>Log Out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div> <!-- / heaader-innr -->
    </header>

</div>
