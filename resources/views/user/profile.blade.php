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
    .uil-image, .uil-video {
        color: #007bff;
        margin-top: 8px;
    }
    .post-new-tab-nav {
        padding-bottom: 0;
    }
</style> 
@endsection
@section('content')
<div class="main_content">
    <div class="main_content_inner">
        <div class="profile">
            <div class="profile-cover">

                <!-- profile cover -->
                <img src="{{ asset('public/uploads/profile/demo-cover.jpg') }}" alt="Cover photo">

                <!-- <a href="#"> <i class="uil-camera"></i> Edit </a> -->

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
                    <p> Family , Food , Fashion , Fourever <a href="#">Edit </a></p>
                </div>

            </div>


            <div class="nav-profile" uk-sticky="media : @s">
                <div class="py-md-2 uk-flex-last">
                    <a href="#" class="button primary mr-2"> <i class="uil-plus"></i> Add your story</a>
                    <a href="#" class="button light button-icon mr-2"> <i class="uil-list-ul"> </i> </a>
                    <a href="#" class="button light button-icon mr-lg-3"> <i class="uil-ellipsis-h"> </i> </a>
                    <div uk-dropdown="pos: bottom-left ; mode:hover" class="display-hidden">
                        <ul class="uk-nav uk-dropdown-nav">
                            <li><a href="#"> View as guast </a></li>
                            <li><a href="#"> Block this person </a></li>
                            <li><a href="#"> Report abuse</a></li>
                        </ul>
                    </div>
                </div>
                @include('user.common_menu')
            </div>

        </div>


        <div class="section-small">

            <div uk-grid>

                <div class="uk-width-2-3@m fead-area">

                    <div class="post-newer mt-lg-2">

                        <div class="post-new" uk-toggle="target: body ; cls: post-focus">
                            <div class="post-new-media">
                                <div class="post-new-media-user">
                                    @if(!empty($userProfile->profile_image) && file_exists('public/uploads/'.$userProfile->profile_image))
                                    <img src="{{ asset('public/uploads/'.$userProfile->profile_image) }}" alt="Profile Photo" id="profile-image">
                                    @else
                                    <img src="{{ asset('public/uploads/profile/demo-profile.png') }}" alt="Profile Photo" id="profile-image">
                                    @endif
                                </div>
                                <div class="post-new-media-input">
                                    <input type="text" class="uk-input" placeholder="What's Your Mind ?">
                                </div>
                            </div>
                            <hr>
                            <div class="post-new-type">

                                <a href="#">
                                    <img src="assets/images/icons/live.png" alt="">
                                    Go Live
                                </a>

                                <a href="#">
                                    <img src="assets/images/icons/photo.png" alt="">
                                    Photo/Video
                                </a>

                                <a href="#" class="uk-visible@s">
                                    <img src="assets/images/icons/tag-friend.png" alt="">
                                    Tag Friend
                                </a>

                                <a href="#"><img src="assets/images/icons/reactions_wow.png" alt="">
                                    Fealing
                                </a>

                            </div>
                        </div>

                        <div class="post-pop">

                            <div class="post-new-overyly" uk-toggle="target: body ; cls: post-focus"></div>

                            <div class="post-new uk-animation-slide-top-small">


                                <div class="post-new-header">

                                    <h4> Create new post</h4>

                                    <!-- close button-->
                                    <span class="post-new-btn-close" uk-toggle="target: body ; cls: post-focus" uk-tooltip="title:Close; pos: left "></span>

                                </div>

                                <div class="post-new-media">
                                    <div class="post-new-media-user">
                                        <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="post-new-media-input">
                                        <input type="text" class="uk-input" placeholder="What's Your Mind ? Dennis!">
                                    </div>
                                </div>
                                <form action="{{ url('create-new-post') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="post-new-tab-nav">
                                        <span>
                                            <label for="image-input">
                                                <a>
                                                    <i class="uil-image"></i>
                                                    <input type="file" id="image-input" name="post_image" accept="image/x-png,image/gif,image/jpeg" style="display: none;">
                                                </a>
                                            </label>
                                        </span>
                                        <span>
                                            <label for="video-input">
                                                <a>
                                                    <i class="uil-video"></i>
                                                    <input type="file" id="video-input" name="post_video" accept="video/mp4,video/x-m4v,video/*" style="display: none;">
                                                </a>
                                            </label>
                                        </span>
                                        <p id="link-input" style="color: #007bff;cursor: pointer;padding-top: 12px;padding-left: 6px;font-size: 19px;"> <i class="fa fa-link" aria-hidden="true"></i> </p>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="input_link" id="input_link" class="form-control" placeholder="Enter link here">
                                    </div>
                                    <div class="uk-flex uk-flex-between">

                                        <button class="button outline-light circle" type="button" style="
                                                border-color: #e6e6e6;  border-width: 1px;  ">Public</button>
                                        <div uk-dropdown>
                                            <ul class="uk-nav uk-dropdown-nav">
                                                <li class="uk-active"><a href="#">Only me</a></li>
                                                <li><a href="#">Every one</a></li>
                                                <li><a href="#"> People I Follow </a></li>
                                                <li><a href="#">I People Follow Me</a></li>
                                            </ul>
                                        </div>

                                        <button type="submit" href="#" class="button primary px-6"> Share </button>

                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>

                    <div id="data">
                        <!-- Results -->
                    </div>

                    <div id="load-more">
                        <button class="btn button" id="load-more-button">Load more post</button>
                        <p class="d-none text-muted" id="no-more-data"></p>
                    </div>

                </div>

                <!-- sidebar -->
                <div class="uk-width-expand ml-lg-2" id="about-section-in-profile-for-mobile">

                    <div class="sl_user-widget">
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
                                    <path fill="currentColor" d="M20 22H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1zm-1-2V4H5v16h14zM7 6h4v4H7V6zm0 6h10v2H7v-2zm0 4h10v2H7v-2zm6-9h4v2h-4V7z">
                                    </path>
                                </svg>
                                <span id="user_post_count">{{ $postCount }}</span> posts
                            <!-- <li> -->
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
                            <!-- </li> -->
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

@section('custom_js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var ENDPOINT = "{{ url('/') }}";
    var page = 1;
    var requestNumber = false;
    infinteLoadMore(page);

    $('#load-more').on('click', function() {
        page++;
        infinteLoadMore(page);
    });

    function infinteLoadMore(page) {
        var userName = "{!! Auth::user()->first_name.Auth::user()->last_name !!}";
        $.ajax({
                url: ENDPOINT + "/profile/userName/?page=" + page,
                datatype: "html",
                type: "get",
                beforeSend: function () {
                    $('.auto-load').show();
                }
            })
            .done(function (response) {
                if (response.status) {
                    $('#no-more-data').removeClass('d-none');
                    $('#no-more-data').html(response.status);
                    $('#load-more-button').hide();
                    return;
                }
                $('.auto-load').hide();
                $.each(response.data, function (key,value) {
                    var html = "";
                    html += '<div class="post"><div class="post-heading"><div class="post-avature"><img src="' + ENDPOINT + '/public/uploads/' + value.user.profile_image + '" alt="Profile Image"></div><div class="post-title"><h4>' + value.user.first_name + ' ' + value.user.last_name + '</h4><p> <i class="uil-users-alt"></i> </p></div><div class="post-btn-action"><span class="icon-more uil-ellipsis-h"></span><div class="mt-0 p-2" uk-dropdown="pos: bottom-right;mode:hover "><ul class="uk-nav uk-dropdown-nav"><li><a href="#"> <i class="uil-share-alt mr-1"></i> Share</a> </li><li><a href="#"> <i class="uil-edit-alt mr-1"></i> Edit Post </a></li><li><a href="#"> <i class="uil-comment-slash mr-1"></i> Disable comments</a></li><li><a href="#"> <i class="uil-favorite mr-1"></i> Add favorites </a></li><li><a href="#" class="text-danger"> <i class="uil-trash-alt mr-1"></i>Delete </a></li></ul></div></div></div>';
                    if (value.post_txt != null) {
                        html += '<div class="post-description"><p class="post-text">' + value.post_txt + '</p></div>';
                    }
                    
                    if (value.post_url != null) {
                        html += '<div class="post-description"><a href="'+value.post_url+'" target="_blank">'+value.post_url+'</a></div>';
                    }

                    if (value.post_image != null) {
                        html += '<div class="post-description"><div class="fullsizeimg"><img src="' + ENDPOINT + '/public/uploads/'+ value.post_image + '" alt="Post Image"></div></div>';
                    }

                    if (value.post_video != null) {
                        html += '<div class="post-description"><div class="embed-responsive embed-responsive-16by9"><video allowfullscreen controls><source src="' + ENDPOINT + '/public/uploads/' + value.post_video + '"></video></div></div>';
                    }
                    html += '<div class="post-state"><div class="post-state-btns" uk-tooltip="like" id="like-div-'+value.id+'" onclick="addLike('+value.id+')"> <i class="uil-heart"></i> <sup id="like-'+value.id+'">'+value.likes.length+'</sup></div><div class="post-state-btns" uk-tooltip="dislike"> <i class="fa fa-heartbeat" aria-hidden="true" id="dislike-div-'+value.id+'" onclick="addDislike('+value.id+')"></i><sup id="dislike-'+value.id+'">'+value.dislikes.length+'</sup></div><div class="post-state-btns" id="comment-button-'+value.id+'" uk-tooltip="comments" onclick="viewCommentBox('+value.id+')"> <i class="uil-comments"></i> <sup>'+value.comments.length+'</sup></div><div class="post-state-btns" uk-tooltip="share"> <i class="fa fa-share-alt-square" aria-hidden="true"></i></div></div></div>';

                    html += '<div class="post-comments">';
                    
                    if (value.comments.length != 0) {
                        if (value.comments.length > 1) {
                            html += '<p class="view-more-comment more-comment" id="more-comment'+value.id+'" onClick="loadMoreComments('+value.id+')">View more comments</p>';
                        }
                        $.each(value.comments, function (key, comment) {
                            if (key < 1) {
                                html += '<div class="post-comments-single"><div class="post-comment-avatar"><img src="public/uploads/'+comment.user.profile_image+'" alt=""></div><div class="post-comment-text"><div class="post-comment-text-inner"><h6><a href="">'+comment.user.first_name+ ' '+comment.user.last_name+'</a></h6><p>' + comment.comment_text + '</p></div><div class="uk-text-small"><a href="#" class="text-danger mr-1"> <i class="uil-heart"></i> Love </a><a href="#" class=" mr-1"> Replay </a><span> </span></div></div><a href="#" class="post-comment-opt"></a></div>';
                            }
                        });
                    }

                    html += '<div class="post-add-comment" id="view-comment-box-'+value.id+'"><div class="post-add-comment-avature"><img src="public/uploads/'+value.user.profile_image+'" alt=""></div><div class="post-add-comment-text-area"><form action="" method="post"><input type="hidden" name="post_id" value=""><input type="text" id="post-text" name="comment_text" placeholder="Write your comment ..." required><div class="icons" id="comment-icon-div"><button type="submit" class="comment-icon"><i class="fa fa-paper-plane" aria-hidden="true"></i></button></div></form></div></div></div></div></div>';

                    $("#data").append(html);
                    $('.post-add-comment').hide();
                });
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            }
        );
    }
    var postId = null;
    function loadMoreComments(postId) {
        $('#more-comment'+postId).removeAttr('onClick');
        $.ajax({
                url: ENDPOINT + "/fetchComments/" + postId,
                datatype: "json",
                type: "get",
                data: {
                    id: postId
                },
                beforeSend: function () {
                    $('.auto-load').show();
                }
            })
            .done(function (response) {
                $(response).each(function(key, value) {
                    if (key != 0) {
                        html = '';
                        html += '<div class="post-comments-single" id="view-comment-box"><div class="post-comment-avatar"><img src="public/uploads/'+value.user.profile_image+'" alt=""></div><div class="post-comment-text"><div class="post-comment-text-inner"><h6><a href="">'+value.user.first_name+ ' '+value.user.last_name+'</a></h6><p>' + value.comment_text + '</p></div><div class="uk-text-small"><a href="#" class="text-danger mr-1"> <i class="uil-heart"></i> Love </a><a href="#" class=" mr-1"> Replay </a><span> </span></div></div><a href="#" class="post-comment-opt"></a></div>';

                        $('#more-comment'+postId).append(html);
                    }
                });
            });
    }

    $(document).ready(function () {
        $('.post-add-comment').each(function () {
          $(this).hide();  
        });
        $('#view-comment-box').each(function () {
            $(this).hide();
        });
    });

    function viewCommentBox(postId) {
        $('#view-comment-box-'+postId).show();
    }

    function addLike(postId) {
        $.ajax({
            url: ENDPOINT + "/like/" + postId,
            type: "POST",
            data: {
                id: postId,
                '_token': "{!! csrf_token() !!}"
            },
        })
        .done(function (response) {
            if (response.status != "false") {
                $.ajax({
                    url: ENDPOINT + "/get-post-like/" + postId,
                    datatype: "json",
                    type: "GET",
                    data: {
                        id: postId,
                    }
                })
                .done(function (response) {
                    $('#like-'+postId).text(response.postCount);
                });
            }
            if (response.found_dislike == 'true') {
                $.ajax({
                    url: ENDPOINT + "/get-post-dislike/" + postId,
                    datatype: "json",
                    type: "GET",
                    data: {
                        id: postId,
                    }
                })
                .done(function (response) {
                    $('#dislike-'+postId).text(response.postCount);
                });
            }
        });
    }

    function addDislike(postId) {
        $.ajax({
            url: ENDPOINT + "/dislike/" + postId,
            type: "POST",
            data: {
                id: postId,
                '_token': "{!! csrf_token() !!}"
            },
        })
        .done(function (response) {
            if (response.status != "false") {
                $.ajax({
                    url: ENDPOINT + "/get-post-dislike/" + postId,
                    datatype: "json",
                    type: "GET",
                    data: {
                        id: postId,
                    }
                })
                .done(function (response) {
                    $('#dislike-'+postId).text(response.postCount);
                });
            }
            if (response.found_like == 'true') {
                $.ajax({
                    url: ENDPOINT + "/get-post-like/" + postId,
                    datatype: "json",
                    type: "GET",
                    data: {
                        id: postId,
                    }
                })
                .done(function (response) {
                    $('#like-'+postId).text(response.postCount);
                });
            }
        });
    }
    $('#input_link').hide();
    $('#link-input').on('click', function() {
        $('#input_link').show();
    });
</script>
@endsection