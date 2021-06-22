@extends('layouts.app')

@section('custom_css')
   <link rel="stylesheet" type="text/css" href="{{ asset('public/holaTheme/assets/css/blog.css') }}">
@endsection

@section('content')
<div class="main_content">
  <div class="main_content_inner">
    <div class="uk-section uk-section-primary uk-light uk-padding-small">
	    <div class="uk-container">
	        <ul class="uk-breadcrumb">
            <li><a href="{{ url('/') }}" style="color: #fff;">Home</a></li>
            <li><a href="{{ route('blogs') }}" style="color: #fff;">blogs</a></li>
        </ul>
	    </div>
	</div>
	<div class="uk-clearfix"></div>
	<div class="uk-child-width-1-3@m uk-margin-top" uk-grid>
	@foreach ($blogs as $blog)
    <div>
        <div class="uk-inline">
            @if (!empty($blog->image) && file_exists('storage/app/public/uploads/' .$blog->image))
                <img src="{{ asset('storage/app/public/uploads/' .$blog->image) }}" style="height: 303px;width: 100%; position: relative;opacity: 0.5;" alt="" uk-img>
            @else
                <img src="{{ asset('public/holaTheme/assets/images/blog/dark-gray-solid-color-background.jpg') }}" style="height: 303px;width: 100%; position: relative;opacity: 0.5;" alt="" uk-img>
            @endif
            <div class="uk-position-top uk-padding">
            	<p style="color: #000;">{{ $blog->category->category_name }}</p>
            	<a class="blog-title" href="{{ route('blog.details',['slug' => $blog->blog_slug]) }}"><h3 class="uk-margin-top">{{ $blog->title }}</h3></a>
            	<div class="uk-float-left">
			        <div class="uk-card single-blog-auth">
			        	<div class="uk-flex">
                            @if(!empty($blog->author->profile_image) && file_exists('public/uploads/'.$blog->author->profile_image))
					        <img class="uk-border-circle" src="{{ asset('public/uploads/'.$blog->author->profile_image) }}" width="40" height="40">
                            @else
					        <img class="uk-border-circle" src="{{ asset('public/uploads/profile/demo-profile.png') }}" width="40" height="40">
                            @endif
					        <div class="uk-text-middle uk-margin-left">
					        <span style="color: #000;">{{ $blog->author->first_name }} {{ $blog->author->last_name }}</span><br/>
					        <span style="color: #000;">{{ App\Models\Blog::getTime($blog->created_at) }}</span>
					        </div>
					    </div>
			        </div>
			    </div>
            </div>
            <div class="uk-overlay uk-overlay-primary uk-position-bottom">
                <div class="uk-flex uk-flex-center uk-flex-between">
                	<div><span><i class="fa fa-eye"></i> <sup>{{ $blog->views }}</sup></span></div>
                	<div><span><i class="fa fa-comments"></i> <sup>{{ $blog->blogComments->count() }}</sup></span></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
   </div>
  </div> 
</div>
@endsection