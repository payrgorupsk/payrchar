@extends('layouts.app')
@section('custom_css')
<style>
    .uil-image {
        color: #007bff;
        margin-top: 8px;
    }

    .sl_right_user_info {
        padding-left: 0;
    }
</style>
@endsection
@section('content')
<div class="main_content">
    <div class="main_content_inner">
        <div id="spinneroverlay"> </div>
        <div class="profile">
            <div class="profile-cover">

                <!-- profile cover -->
                <img src="{{ asset('public/uploads/profile/demo-cover.jpg') }}" alt="Cover photo">

            </div>

            <div class="profile-details">
                <div class="profile-image">
                    @if(!empty($userProfile->profile_image) && file_exists('public/uploads/'.$userProfile->profile_image))
                    <img src="{{ asset('public/uploads/'.$userProfile->profile_image) }}" alt="Profile Photo">
                    @else
                    <img src="{{ asset('public/uploads/profile/demo-profile.png') }}" alt="Profile Photo">
                    @endif
                </div>
                <div class="profile-details-info">
                    <h1> {{ $userProfile->first_name }} {{ $userProfile->last_name }} </h1>
                </div>

            </div>


            <div class="nav-profile" uk-sticky="media : @s">
                <div class="py-md-2 uk-flex-last">
                    <a href="#" class="button light button-icon mr-2"> <i class="uil-list-ul"> </i> </a>
                    <a href="#" class="button light button-icon mr-lg-3"> <i class="uil-ellipsis-h"> </i> </a>
                    <div uk-dropdown="pos: bottom-left ; mode:hover" class="display-hidden">
                        <ul class="uk-nav uk-dropdown-nav">
                            <li><a href="#"> View as guest </a></li>
                            <li><a href="#"> Bloc this person </a></li>
                            <li><a href="#"> Report abuse</a></li>
                        </ul>
                    </div>
                </div>
                <div>
                    <nav class="responsive-tab ml-lg-3">
                        <ul>
                            <li class="{{ $submenu == 'about' ? 'uk-active' : '' }}"><a href="{{ url('user/about') }}">About</a></li>
                            <li><a href="#">Friend</a></li>
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
            </div>

        </div>


        <div class="section-small">

            <div uk-grid>
                <!-- sidebar -->
                <div class="uk-width-expand ml-lg-2" id="about-section-in-profile-for-mobile">

                    <div class="sl_user-widget">
                        <br>
                        <div class="sl_user-widget-wrap-header pb-0">
                            <div class="sl_user-widget-wrap-header-left">

                                <h4>
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M13,9H11V7H13M13,17H11V11H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z">
                                            </path>
                                        </svg></span>
                                    Profile Info
                                </h4>
                            </div>
                        </div>
                        <ul class="sl_right_user_info">

                            <li class="list-group-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z">
                                    </path>
                                </svg>
                                <span class="text-success"> Online </span>
                            </li>
                            <li class="list-group-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M3.9,12C3.9,10.29 5.29,8.9 7,8.9H11V7H7A5,5 0 0,0 2,12A5,5 0 0,0 7,17H11V15.1H7C5.29,15.1 3.9,13.71 3.9,12M8,13H16V11H8V13M17,7H13V8.9H17C18.71,8.9 20.1,10.29 20.1,12C20.1,13.71 18.71,15.1 17,15.1H13V17H17A5,5 0 0,0 22,12A5,5 0 0,0 17,7Z">
                                    </path>
                                </svg>
                                <a href="#" target="_blank">https://mydomain.com</a>
                            </li>

                            <li class="list-group-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M9,11.75A1.25,1.25 0 0,0 7.75,13A1.25,1.25 0 0,0 9,14.25A1.25,1.25 0 0,0 10.25,13A1.25,1.25 0 0,0 9,11.75M15,11.75A1.25,1.25 0 0,0 13.75,13A1.25,1.25 0 0,0 15,14.25A1.25,1.25 0 0,0 16.25,13A1.25,1.25 0 0,0 15,11.75M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,20C7.59,20 4,16.41 4,12C4,11.71 4,11.42 4.05,11.14C6.41,10.09 8.28,8.16 9.26,5.77C11.07,8.33 14.05,10 17.42,10C18.2,10 18.95,9.91 19.67,9.74C19.88,10.45 20,11.21 20,12C20,16.41 16.41,20 12,20Z">
                                    </path>
                                </svg>
                                @if(!empty($userProfile->gender))
                                    @if($userProfile->gender == 0)
                                    Others
                                    @elseif($userProfile->gender == 1)
                                    Male
                                    @elseif($userProfile->gender == 2)
                                    Female
                                    @endif
                                @else
                                Gender not specified
                                @endif
                            </li>

                            <li class="list-group-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                                    </path>
                                </svg>
                                @if(!empty($userProfile->relationship))
                                {{ $userProfile->relationship }}
                                @else
                                No relationship status has been added
                                @endif
                            </li>
                            <li class="list-group-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M10,2H14A2,2 0 0,1 16,4V6H20A2,2 0 0,1 22,8V19A2,2 0 0,1 20,21H4C2.89,21 2,20.1 2,19V8C2,6.89 2.89,6 4,6H8V4C8,2.89 8.89,2 10,2M14,6V4H10V6H14Z">
                                    </path>
                                </svg>
                                <span>
                                    @if(!empty($userProfile->works_at))
                                    Working at {{ $userProfile->works_at }}
                                    @else
                                    No work info has been added
                                    @endif
                                </span>
                            </li>

                            <li class="list-group-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12,3L1,9L12,15L21,10.09V17H23V9M5,13.18V17.18L12,21L19,17.18V13.18L12,17L5,13.18Z">
                                    </path>
                                </svg>
                                <span>
                                    @if(!empty($userProfile->school))
                                    School at {{ $userProfile->school }}
                                    @else
                                    No school has been added
                                    @endif
                                </span>
                            </li>

                            <li class="list-group-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12,3L1,9L12,15L21,10.09V17H23V9M5,13.18V17.18L12,21L19,17.18V13.18L12,17L5,13.18Z">
                                    </path>
                                </svg>
                                <span>
                                    @if(!empty($userProfile->college))
                                    College at {{ $userProfile->college }}
                                    @else
                                    No college has been added
                                    @endif
                                </span>
                            </li>

                            <li class="list-group-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12,3L1,9L12,15L21,10.09V17H23V9M5,13.18V17.18L12,21L19,17.18V13.18L12,17L5,13.18Z">
                                    </path>
                                </svg>
                                <span>
                                    @if(!empty($userProfile->university))
                                    University at {{ $userProfile->university }}
                                    @else
                                    No university has been added
                                    @endif
                                </span>
                            </li>

                            <li class="list-group-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M17.9,17.39C17.64,16.59 16.89,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.78 4.21,10.21L9,15V16A2,2 0 0,0 11,18M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z">
                                    </path>
                                </svg>

                                @if(!empty($userProfile->country))
                                Living in {{ $userProfile->country->name }}
                                @else
                                No country has been added
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection