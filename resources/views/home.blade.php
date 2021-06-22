@extends('layouts.app')
@section('custom_css')
<style>
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

        <div class="uk-grid-large" uk-grid>

            <div class="uk-width-2-3@m fead-area">

                <!-- create post section -->
                <div class="post-newer">

                <form action="{{ url('create-new-post') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="post-new" uk-toggle="target: body ; cls: post-focus">
                            <div class="post-new-media">
                                <div class="post-new-media-user">
                                    @if (!empty(Auth::user()->profile_image) && file_exists('public/uploads/'.Auth::user()->profile_image))
                                    <img src="{{ asset('public/uploads/'.Auth::user()->profile_image) }}" alt="Profile Image">
                                    @else
                                    <img src="{{ asset('public/uploads/profile/demo-profile.png') }}" alt="Profile Image">
                                    @endif
                                </div>
                                <div class="post-new-media-input">
                                    <input type="text" class="uk-input" placeholder="What's on Your Mind?">
                                </div>
                            </div>
                            <hr>
                            <div class="post-new-type">

                                <a href="#">
                                    <img src="{{ asset('public/holaTheme/assets/images/icons/photo.png') }}" alt="">
                                    Photo/Video
                                </a>

                                <a href="#" class="uk-visible@s">
                                    <img src="{{ asset('public/holaTheme/assets/images/icons/tag-friend.png') }}" alt="">
                                    Tag Friend
                                </a>

                                <a href="#"><img src="{{ asset('public/holaTheme/assets/images/icons/reactions_wow.png') }}" alt="">
                                    Fealing /Activity
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
                                    @if (!empty(Auth::user()->profile_image) && file_exists('public/uploads/'.Auth::user()->profile_image))
                                    <img src="{{ asset('public/uploads/'.Auth::user()->profile_image) }}" alt="Profile Image">
                                    @else
                                    <img src="{{ asset('public/uploads/profile/demo-profile.png') }}" alt="Profile Image">
                                    @endif
                                </div>
                                <div class="post-new-media-input">
                                    <input type="text" class="uk-input" name="post_txt" placeholder="What's Your Mind ?">
                                </div>
                            </div>
                            <div class="post-new-tab-nav">
                                <span>
                                    <label for="image-input">
                                        <a>
                                            <i class="uil-image"></i>
                                            <input type="file" id="image-input" name="post_image" accept="image/x-png,image/gif,image/jpeg">
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
                                <a href="#" id="link-input"> <i class="fa fa-link" aria-hidden="true"></i> </a>
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
                        </div>

                    </div>
                </form>

                </div>

                <!-- <div class="section-small pt-0">
                    <div class="uk-position-relative" uk-slider="finite: true">

                        <div class="uk-slider-container pb-3">

                            <ul class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-3 story-slider uk-grid">
                                <li>
                                    <a href="#" uk-toggle="target: body ; cls: is-open">
                                        <div class="story-card" data-src="{{ asset('public/holaTheme/assets/images/avatars/avatar-lg-1.jpg') }}" uk-img>
                                            <i class="uil-plus"></i>
                                            <div class="story-card-content">
                                                <h4> Dennis </h4>
                                            </div>
                                        </div>
                                    </a>

                                </li>
                                <li>
                                    <a href="#" uk-toggle="target: body ; cls: is-open">
                                        <div class="story-card" data-src="{{ asset('public/holaTheme/assets/images/events/listing-5.jpg') }}" uk-img>
                                            <img src="{{ asset('public/holaTheme/assets/images/avatars/avatar-5.jpg') }}" alt="">
                                            <div class="story-card-content">
                                                <h4> Jonathan </h4>
                                            </div>
                                        </div>
                                    </a>

                                </li>
                                <li>
                                    <a href="#" uk-toggle="target: body ; cls: is-open">
                                        <div class="story-card" data-src="{{ asset('public/holaTheme/assets/images/avatars/avatar-lg-3.jpg') }}" uk-img>
                                            <img src="{{ asset('public/holaTheme/assets/images/avatars/avatar-6.jpg') }}" alt="">
                                            <div class="story-card-content">
                                                <h4> Stella </h4>
                                            </div>
                                        </div>
                                    </a>

                                </li>
                                <li>

                                    <a href="#" uk-toggle="target: body ; cls: is-open">
                                        <div class="story-card" data-src="{{ asset('public/holaTheme/assets/images/avatars/avatar-lg-4.jpg') }}" uk-img>
                                            <img src="{{ asset('public/holaTheme/assets/images/avatars/avatar-4.jpg') }}" alt="">
                                            <div class="story-card-content">
                                                <h4> Alex </h4>
                                            </div>
                                        </div>
                                    </a>

                                </li>
                                <li>

                                    <a href="#" uk-toggle="target: body ; cls: is-open">
                                        <div class="story-card" data-src="{{ asset('public/holaTheme/assets/images/avatars/avatar-lg-2.jpg') }}" uk-img>
                                            <img src="{{ asset('public/holaTheme/assets/images/avatars/avatar-2.jpg') }}" alt="">
                                            <div class="story-card-content">
                                                <h4> Adrian </h4>
                                            </div>
                                        </div>
                                    </a>

                                </li>
                                <li>

                                    <a href="#" uk-toggle="target: body ; cls: is-open">
                                        <div class="story-card" data-src="{{ asset('public/holaTheme/assets/images/avatars/avatar-lg-5.jpg') }}" uk-img>
                                            <img src="{{ asset('public/holaTheme/assets/images/avatars/avatar-5.jpg') }}" alt="">
                                            <div class="story-card-content">
                                                <h4> Dennis </h4>
                                            </div>
                                        </div>
                                    </a>

                                </li>

                            </ul>

                            <div class="uk-visible@m">
                                <a class="uk-position-center-left-out slidenav-prev" href="#" uk-slider-item="previous"></a>
                                <a class="uk-position-center-right-out slidenav-next" href="#" uk-slider-item="next"></a>
                            </div>
                            <div class="uk-hidden@m">
                                <a class="uk-position-center-left slidenav-prev" href="#" uk-slider-item="previous"></a>
                                <a class="uk-position-center-right slidenav-next" href="#" uk-slider-item="next"></a>
                            </div>

                        </div>
                    </div>
                </div> -->
                <div id="data">
                    <!-- Results -->
                </div>
                <div class="post-comments">
                    <p class="view-more-comment" id="load-more" style="margin-left: 30%; cursor:pointer; color:#1a73e8"> Load more post... </p>
                </div>
                <div class="d-flex" style="margin-left:35%">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="{{ asset('public/custom/homepage.js') }}"></script> -->
<script>
    $('#image-input').hide();

    var ENDPOINT = "{{ url('/') }}";
    var page = 1;
    infinteLoadMore(page);

    $('#load-more').on('click', function() {
        page++;
        infinteLoadMore(page);
    });

    function infinteLoadMore(page) {
        $.ajax({
                url: ENDPOINT + "/?page=" + page,
                datatype: "html",
                type: "get",
                beforeSend: function () {
                    $('.auto-load').show();
                }
            })
            .done(function (response) {
                if (response.length == 0) {
                    $('.auto-load').html("We don't have more data to display :(");
                    return;
                }
                $('.auto-load').hide();
                $.each(response.data, function (key,value) {
                    var demoImage = "this.src='public/uploads/profile/demo-profile.png'";
                    var html = "";
                    html += '<div class="post"><div class="post-heading"><div class="post-avature"><img onerror="'+demoImage+'" src="public/uploads/' + value.user.profile_image + '" alt=""></div><div class="post-title"><h4>' + value.user.first_name + ' ' + value.user.last_name + '</h4><p> <i class="uil-users-alt"></i> </p></div><div class="post-btn-action"><span class="icon-more uil-ellipsis-h"></span><div class="mt-0 p-2" uk-dropdown="pos: bottom-right;mode:hover "><ul class="uk-nav uk-dropdown-nav"><li><a href="#"> <i class="uil-share-alt mr-1"></i> Share</a> </li><li><a href="#"> <i class="uil-edit-alt mr-1"></i> Edit Post </a></li><li><a href="#"> <i class="uil-comment-slash mr-1"></i> Disable comments</a></li><li><a href="#"> <i class="uil-favorite mr-1"></i> Add favorites </a></li><li><a href="#" class="text-danger"> <i class="uil-trash-alt mr-1"></i>Delete </a></li></ul></div></div></div>';
                    if (value.post_txt != null) {
                        html += '<div class="post-description"><p class="post-text">' + value.post_txt + '</p></div>';
                    }
                    
                    if (value.post_url != null) {
                        html += '<div class="post-description"><a href="'+value.post_url+'" target="_blank">'+value.post_url+'</a></div>';
                    }

                    if (value.post_image != null) {
                        html += '<div class="post-description"><div class="fullsizeimg"><img src="public/uploads/'+ value.post_image + '" alt=""></div></div>';
                    }

                    if (value.post_video != null) {
                        html += '<div class="post-description"><div class="embed-responsive embed-responsive-16by9"><video allowfullscreen controls><source src="public/uploads/' + value.post_video + '"></video></div></div>';
                    }

                    html += '<div class="post-state"><div class="post-state-btns" uk-tooltip="like" id="like-div-'+value.id+'" onclick="addLike('+value.id+')"> <i class="uil-heart"></i> <sup id="like-'+value.id+'">'+value.likes.length+'</sup></div><div class="post-state-btns" uk-tooltip="dislike"> <i class="fa fa-heartbeat" aria-hidden="true" id="dislike-div-'+value.id+'" onclick="addDislike('+value.id+')"></i><sup id="dislike-'+value.id+'">'+value.dislikes.length+'</sup></div><div class="post-state-btns" uk-tooltip="comments" onclick="viewCommentBox('+value.id+')"> <i class="uil-comments"></i> <sup id="comment-button-'+value.id+'">'+value.comments.length+'</sup></div><div class="post-state-btns" uk-tooltip="share"> <i class="fa fa-share-alt-square" aria-hidden="true"></i></div></div>';

                    html += '<div class="post-comments">';
                    if (value.comments.length != 0) {
                        if (value.comments.length > 1) {
                            html += '<p class="view-more-comment more-comment'+value.id+'" id="more-comment'+value.id+'" onClick="loadMoreComments('+value.id+')">View more comments</p>';
                        }
                        $.each(value.comments, function (key, comment) {
                            if (key < 1) {
                                var demoImage = "this.src='public/uploads/profile/demo-profile.png'";
                                html += '<div class="post-comments-single"><div class="post-comment-avatar"><img onerror="'+demoImage+'" src="public/uploads/'+comment.user.profile_image+'" alt="Profile Image"></div><div class="post-comment-text"><div class="post-comment-text-inner"><h6><a href="">'+comment.user.first_name+ ' '+comment.user.last_name+'</a></h6><p>' + comment.comment_text + '</p></div><div class="uk-text-small"><a href="#" class="text-danger mr-1"> <i class="uil-heart"></i> Love </a></span></div></div><a href="#" class="post-comment-opt"></a></div>';
                            }
                        });
                    } else {
                        html += '<p class="view-more-comment more-comment more-comment'+value.id+'" onClick="loadMoreComments('+value.id+')"></p>';
                    }

                    var demoImage = "this.src='public/uploads/profile/demo-profile.png'";
                    var authenticatedUserImage = '{!! Auth::user()->profile_image !!}';
                    html += '<div class="post-add-comment" id="view-comment-box-'+value.id+'"><div class="post-add-comment-avature"><img onerror="'+demoImage+'" src="public/uploads/'+authenticatedUserImage+'" alt="Profile Image" style="height:30pt;width:.416666667in;"></div><div class="post-add-comment-text-area"><input type="text" id="post-text-'+value.id+'" name="comment_text" placeholder="Write your comment ..."><div class="icons" uk-tooltip="Post comment" onclick="createNewComment('+value.id+')" id="comment-icon-div"><i class="fa fa-paper-plane" aria-hidden="true" style="cursor:pointer"></i></div></div></div></div></div></div></div>';

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
                        var demoImage = "this.src='public/uploads/profile/demo-profile.png'";
                        html = '';
                        html += '<div class="post-comments-single" id="view-comment-box"><div class="post-comment-avatar"><img onerror="'+demoImage+'" src="public/uploads/'+value.user.profile_image+'" alt=""></div><div class="post-comment-text"><div class="post-comment-text-inner"><h6><a href="">'+value.user.first_name+ ' '+value.user.last_name+'</a></h6><p>' + value.comment_text + '</p></div><div class="uk-text-small"><a href="#" class="text-danger mr-1"> <i class="uil-heart"></i> Love </a><span> </span></div></div><a href="#" class="post-comment-opt"></a></div>';

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

    function createNewComment(id)
    {
        var commentText = $('#post-text-'+id).val();
        $.ajax({
            url: ENDPOINT + "/create-comment",
            type: "POST",
            data: {
                id: id,
                '_token': "{!! csrf_token() !!}",
                'comment_text': commentText
            },
        })
        .done(function (response) {

            if (response.status == 'success') {
                var demoImage = "this.src='public/uploads/profile/demo-profile.png'";
                html = '';
                html += '<div class="post-comments-single" id="view-comment-box"><div class="post-comment-avatar"><img onerror="'+demoImage+'" src="public/uploads/'+response.commented_user_profile_image+'" alt="Profile Image"></div><div class="post-comment-text"><div class="post-comment-text-inner"><h6><a href="">'+response.commented_user_name+'</a></h6><p>' + response.comment_text + '</p></div><div class="uk-text-small"><a href="#" class="text-danger mr-1"> <i class="uil-heart"></i> Love </a><span> </span></div></div><a href="#" class="post-comment-opt"></a></div>';

                $('.more-comment'+id).append(html);

                var commentCount = parseInt($('#comment-button-'+id).text());
                $('#post-text-'+id).val('');
                $('#comment-button-'+id).text(++commentCount);
            }
        });
    }
    $('#input_link').hide();
    $('#link-input').on('click', function() {
        $('#input_link').show();
    });
</script>
@endsection