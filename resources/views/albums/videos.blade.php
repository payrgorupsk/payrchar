@extends('layouts.app')
@section('custom_css')
<style>
    @media only screen and (max-width: 425px) {
        .chat-plus-btn {
            display: none;
        }
        .video-section {
            margin-bottom: 10px;
        }
    }
</style>
@endsection
@section('content')
<div class="main_content">
    <div class="main_content_inner">

        <div id="spinneroverlay"> </div>

        <h1> Videos </h1>
        <hr>

        <div class="row">
            @foreach ($postVideos as $video)
            @if (file_exists('public/uploads/'.$video->post_video))
            <div class="col-md-4 video-section">
                <div class="post-description">
                    <div class="embed-responsive embed-responsive-16by9">
                        <video allowfullscreen controls>
                            <source src="{{ asset('public/uploads/'.$video->post_video) }}" type="video/mp4">
                        </video>
                    </div>
                </div>
                <div>
                    <span>{{ count($video->likes) != 0 ? count($video->likes) : 0 }} Likes</span>
                    <span>{{ count($video->likes) != 0 ? count($video->dislikes) : 0 }} Dislikes</span>
                    <span>{{ count($video->likes) != 0 ? count($video->comments) : 0 }} Comments</span>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        <br><br>
        <a href="{{ $postVideos->previousPageUrl() }}" class="btn btn-primary">
            << Previous</a> <a href="{{ $postVideos->nextPageUrl() }}" class="btn btn-primary float-right">Next >>
        </a>
    </div>
</div>
@endsection