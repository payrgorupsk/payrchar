<div>
    <nav class="responsive-tab ml-lg-3">
        <ul>
            <li class="{{ $submenu == 'timeline' ? 'uk-active' : '' }}"><a href="{{ url('/profile',Auth::user()->first_name.Auth::user()->last_name) }}">Timeline</a></li>
            <li class="{{ $submenu == 'about' ? 'uk-active' : '' }}"><a href="{{ url('user/about') }}">About</a></li>
            <li class="{{ $submenu == 'friend-requests' ? 'uk-active' : '' }}"><a href="{{ url('/friend-requests') }}">Friend Requests</a></li>
            <li><a href="#">Photos</a></li>
            <li><a href="#">Videos</a></li>
        </ul>
    </nav>
    <div class="uk-visible@s">
        <a href="#" class="nav-btn-more"> More</a>
        <div uk-dropdown="pos: bottom-left" class="display-hidden">
            <ul class="uk-nav uk-dropdown-nav">
                <li><a href="#">Moves</a></li>
                <li><a href="#">Likes</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Groups</a></li>
                <li><a href="#">Gallery</a></li>
                <li><a href="#">Sports</a></li>
                <li><a href="#">Gallery</a></li>
            </ul>
        </div>
    </div>
</div>