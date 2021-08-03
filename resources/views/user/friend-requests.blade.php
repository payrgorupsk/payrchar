@extends('layouts.app')

@section('custom_css')
<link rel="stylesheet" href="{{ asset('public/holaTheme/assets/css/uikit.css') }}">
<link rel="stylesheet" href="{{ asset('public/holaTheme/assets/css/people-you-may-know/style.css') }}">
<style>
    @media only screen and (max-width: 425px) {
        .chat-plus-btn {
            display: none;
        }
    }
</style>
@endsection

@section('content')
<div class="main_content">
    <div class="main_content_inner">

        <ul id="component-nav" class="uk-switcher">

            <li class="uk-active">
                <h2> Friend Requests</h2>
                <div class="section-small pt-2">
                    <!-- users   -->
                    <div class="uk-child-width-1-4@m uk-child-width-1-2@s uk-grid-small" id="follower-section" uk-grid>
                        @foreach($friends as $friend)
                        <div>
                            <div class="sl_find_frns_user">
                                <div class="sl_find_frns_user_cover">
                                    @if(!empty($friend->requested_by_user->cover_photo) && file_exists('public/uploads/'.$friend->requested_by_user->cover_photo))
                                    <img src="{{ asset('public/uploads/'.$friend->requested_by_user->cover_photo) }}" alt="Cover photo">
                                    @else
                                    <img src="{{ asset('public/uploads/profile/demo-cover.jpg') }}" alt="Cover photo">
                                    @endif
                                </div>
                                <div class="sl_find_frns_user_info">
                                    <div class="sl_find_frns_user_avatar">
                                        <a href="{{ url('/user/profile', $friend->requested_by_user->first_name.$friend->requested_by_user->last_name) }}">
                                            @if(!empty($friend->requested_by_user->profile_image) && file_exists('public/uploads/'.$friend->requested_by_user->profile_image))
                                            <img src="{{ asset('public/uploads/'.$friend->requested_by_user->profile_image) }}" alt="Profile image">
                                            @else
                                            <img src="{{ asset('public/uploads/profile/demo-profile.png') }}" alt="Profile image">
                                            @endif
                                        </a>
                                    </div>
                                    <h4> <a href="{{ url('/user/profile', $friend->requested_by_user->first_name.$friend->requested_by_user->last_name) }}"> {{ $friend->requested_by_user->first_name }} {{ $friend->requested_by_user->last_name }} </a> </h4>
                                    <p></p>
                                </div>
                                <div class="sl_find_frns_user_btns">
                                    <span id="accept-div-{{ $friend->id }}">
                                        <button type="button" class="btn button small primary add-friend" data-rel="{{$friend->id}}" onclick="this.disabled=true">
                                            <svg id="add-friend-icon-{{ $friend->id }}" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="8.5" cy="7" r="4"></circle>
                                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                                <line x1="23" y1="11" x2="17" y2="11"></line>
                                            </svg>
                                            <span id="follow-text-{{ $friend->id }}"> Accept</span>
                                        </button>
                                    </span>
                                    <span id="cancel-friend-request-{{ $friend->id }}">
                                        <button type="button" class="btn button small light cancel-friend" data-rel="{{ $friend->id }}">
                                            <span id="cancel-text-{{ $friend->id }}"> Cancel</span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <br>
                    @if (count($friends) >= 12)
                    <div class="load-more" id="load-more">
                        <button class="btn button">Load more friend requests</button>
                    </div>
                    @elseif (count($friends) == 0)
                    <div class="load-more" id="end-load-more">
                        <button class="btn button">You do not have any pending friend request ... </button>
                    </div>
                    @endif
                </div>
            </li>
        </ul>
    </div>
</div>
@endsection
@section('custom_js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var ENDPOINT = "{{ url('/') }}";
    var page = 1;

    $('#load-more').on('click', function() {
        page++;
        infinteLoadMore(page);
    });

    function infinteLoadMore(page) {
        $.ajax({
            url: ENDPOINT + "/friend-requests/?page=" + page,
            datatype: "html",
            type: "get",
            beforeSend: function() {
                $('.auto-load').show();
            }
        })
        .done(function(response) {
            if (response.data.length == 0) {
                $('#load-more').text('No more friend request found!');
            } else {
                $(response.data).each(function(key, value) {
                    $(value).each(function(k, v) {
                        html = '';
                        html += '<div><div class="sl_find_frns_user"><div class="sl_find_frns_user_cover">';
                        if (v.requested_by_user.cover_photo != null) {
                            html += '<img src="public/uploads/' + v.requested_by_user.cover_photo + '" alt="Cover photo"></div>';
                        } else {
                            html += '<img src="public/uploads/profile/demo-cover.jpg" alt="Cover photo"></div>';
                        }
                        html += '<div class="sl_find_frns_user_info"> <div class="sl_find_frns_user_avatar"> <a href="user/profile/' + v.requested_by_user.first_name + v.requested_by_user.last_name + '">';
                        var profileImage = '<img src="' + ENDPOINT + '/public/uploads/' + v.requested_by_user.profile_image + '" alt="Profile image">';

                        if (v.profile_image != null) {
                            var demoImage = "this.src='public/uploads/profile/demo-profile.png'";
                            html += '<img onerror="' + demoImage + '" src="public/uploads/' + v.requested_by_user.profile_image + '" alt="Profile image"></a></div>';
                        } else {
                            html += '<img src="public/uploads/profile/demo-profile.png" alt="Profile image"></a></div>';
                        }
                        html += '<h4> <a href="user/profile/'+v.requested_by_user.first_name+v.requested_by_user.last_name+'">' + v.requested_by_user.first_name + ' ' + v.requested_by_user.last_name + '</a> </h4> <p></p></div><div class="sl_find_frns_user_btns"><span id="accept-div-' + v.id + '"><button type="button" class="btn button small primary accept-button-' + v.id + '" onclick="addNewFriend(' + v.id + ')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg><span id="follow-text-' + v.id + '"> Accept</span></button></span><span id="cancel-friend-request-' + v.id + '" onclick="this.disabled=true"><button type="button" class="btn button small light" onclick="cancelFriendRequest(' + v.id + ')"><span id="cancel-text-' + v.id + '" onclick="this.disabled=true"> Cancel</span></button></span></div></div>';

                        $('#follower-section').append(html);
                    });
                });
            }
        });
    }

    $('.add-friend').on('click', function () {
        var id = $(this).attr('data-rel');
        newFriend(id);
    });

    function addNewFriend(id) {
        var id = id;
        $('.accept-button-' + id).prop('disabled', true);
        newFriend(id);
    }

    function newFriend(id) {
        $.ajax({
            url: ENDPOINT + "/accept-friend-request/" + id,
            type: "POST",
            data: {
                id: id,
                '_token': "{!! csrf_token() !!}"
            },
        })
        .done(function (response) {
            if (response.status == 'success') {
                $('#follow-text-'+id).text('Accepted');
                $('#add-friend-icon-'+id).hide();
                $('#cancel-friend-request-'+id).hide();
            }
        });
    }

    $('.cancel-friend').on('click', function () {
        var id = $(this).attr('data-rel');
        cancelFriendRequest(id);
    });

    function cancelFriendRequest(id) {
        $.ajax({
            url: ENDPOINT + "/cancel-friend-request/" + id,
            type: "POST",
            data: {
                id: id,
                '_token': "{!! csrf_token() !!}"
            },
        })
        .done(function (response) {
            if (response.status == 'success') {
                $('#cancel-text-'+id).prop('disabled', true);
                $('#cancel-text-'+id).text('Canceled');
                $('#accept-div-'+id).hide();
            }
        });
    }
</script>
@endsection