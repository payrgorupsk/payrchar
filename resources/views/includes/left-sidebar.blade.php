<div class="main_sidebar">
    <div class="side-overlay" uk-toggle="target: #wrapper ; cls: collapse-sidebar mobile-visible"></div>
    <!-- sidebar header -->
    <div class="sidebar-header">
        <h4> Menus</h4>
        <span class="btn-close" uk-toggle="target: #wrapper ; cls: collapse-sidebar mobile-visible"></span>
    </div>
    <!-- sidebar Menu -->
    <div class="sidebar">
        <div class="sidebar_innr" data-simplebar>
            <div class="sections">
                <ul>
                    <li class="{{ $menu == 'home' ? 'active' : '' }}">
                        <a href="{{ url('/') }}"> <img src="{{ asset('public/holaTheme/assets/images/icons/home.png') }}" alt="">
                            <span> Newsfeed </span>
                        </a>
                    </li>
                    <li class="{{ $menu == 'profile' ? 'active' : '' }}">
                        <a href="{{ url('/profile', Auth::user()->first_name.Auth::user()->last_name) }}"> <img src="{{ asset('public/holaTheme/assets/images/icons/tag-friend.png') }}" alt="">
                            <span> Profile </span>
                        </a>
                    </li>
                    <li>
                        <a href="#"> <img src="{{ asset('public/holaTheme/assets/images/icons/chat.png') }}" alt="">
                            <span> Chat Buds </span>
                        </a>
                    </li>
                    <li class="{{ $menu == 'people-you-may-know' ? 'active' : '' }}">
                        <a href="{{ url('people-you-may-know') }}"> <img src="{{ asset('public/holaTheme/assets/images/icons/friends.png') }}" alt="">
                            <span> People you may know </span>
                        </a>
                    </li>
                    <li class="{{ $menu == 'blog' ? 'active' : '' }}">
                        <a href="{{ route('blogs') }}"> <img src="{{ asset('public/holaTheme/assets/images/icons/google-docs.png') }}" alt="">
                            <span> Blogs </span>
                        </a>
                    </li>
                    <li class="{{ $menu == 'photo-album' ? 'active' : '' }}">
                        <a href="{{ url('/album') }}"> <img src="{{ asset('public/holaTheme/assets/images/icons/gallery.png') }}" alt="">
                            <span> Album </span>
                        </a>
                    </li>
                    <li class="{{ $menu == 'video-album' ? 'active' : '' }}">
                        <a href="{{ url('/videos') }}"> <img src="{{ asset('public/holaTheme/assets/images/icons/movies.png') }}" alt="">
                            <span> Videos </span>
                        </a>
                    </li>
                </ul>
            </div>
            <!--  Optional Footer -->
            <div id="foot">
                <ul>
                    <li> <a href="{{ url('/about') }}"> About Us </a></li>
                    <li> <a href="#"> Setting </a></li>
                    <li> <a href="{{ url('/privacy') }}"> Privacy Policy </a></li>
                    <li> <a href="{{ url('/terms') }}"> Terms - Conditions </a></li>
                </ul>

                <div class="foot-content">
                    <p>© 2021 <strong>Payrchat</strong>. All Rights Reserved. </p>
                </div>

            </div>
        </div>
    </div>
</div>