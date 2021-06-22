@extends('layouts.app')
@section('custom_css')
  <link rel="stylesheet" type="text/css" href="{{ asset('public/holaTheme/assets/css/blog.css') }}"> 
@endsection
@section('content')
<div class="main_content">
  <div class="main_content_inner">
    <div class="uk-section uk-section-primary uk-margin-remove uk-padding-small">
      <i class="uil-book"></i> <span>Blog</span>
    </div><br/>
    <div class="uk-section uk-section-primary uk-margin-remove uk-padding-small">
      <div class="uk-flex uk-flex-between">
        <div class="uk-flex uk-position-relative">
            <a href="{{ route('my.articles') }}" id="p1">My articles</a>
            <a href="{{ route('blogs') }}"> Browse articles</a>
        </div>
        <div class="right">
          <button class="uk-button uk-button-primary uk-button-small"> <i class="uil-plus"></i> <a href="{{ url('/create/blog') }}">Create</a> </button>
        </div>
      </div>
    </div>
      <div class="uk-grid-column-small uk-grid-row-large uk-child-width-1-2@s uk-margin-top" uk-grid>
        @foreach($blogs as $blog)
          @if(!empty($blog))
            <div>
                <div class="uk-card" data-src="images/photo.jpg">
                  @if (!empty($blog->image) && file_exists('storage/app/public/uploads/' .$blog->image))
                  <img src="{{ asset('storage/app/public/uploads/' .$blog->image) }}" style="height: 303px;width: 100%; position: relative;opacity: 0.8;" alt="" class="blog-img" uk-img>
                  @else
                      <img src="{{ asset('public/holaTheme/assets/images/blog/dark-gray-solid-color-background.jpg') }}" style="height: 303px;width: 100%; position: relative;opacity: 0.8;" alt="" class="blog-img" uk-img>
                  @endif
                  <div class="uk-overlay uk-position-cover uk-light blog-info">
                    <div class="uk-text-left">
                      <div class="post-btn-action uk-float-right">
                          <span class="icon-more uil-ellipsis-v"></span>
                          <div class="mt-0 p-2" uk-dropdown="pos: bottom-right;mode:hover ">
                              <ul class="uk-nav uk-dropdown-nav">
                                  <li><a href="{{ route('edit.blog',['id' => $blog->id]) }}"> <i class="uil-edit-alt mr-1"></i> Edit blog </a></li>
                                  <li><a href="{{ route('delete.blog',['id' => $blog->id]) }}" class="text-danger"> <i class="uil-trash-alt mr-1"></i>
                                          Delete </a></li>
                              </ul>
                          </div>
                      </div>
                      <a href="#"><p>{{ $blog->category->category_name }}</p></a>
                      <a href="{{ route('blog.details',['slug' => $blog->blog_slug]) }}" class="blog-title"><h3 style="color: #fff;">{{ $blog->title }}</h3></a>
                      <span>{{ $blog->views }} views</span> . <span>{{ App\Models\Blog::getTime($blog->created_at) }}</span><br/>
                    </div>
                  </div>
                </div>
                
            </div>
            @else
              <div class="uk-child-width-1-1" uk-grid>
                <div class="uk-card uk-card-body uk-height-large uk-flex uk-flex-center uk-flex-middle uk-flex-column">
                  <div><i class="uil-book"></i></div>
                    <p>You haven't created any articles yet.</p>
                  </div>
              </div> 
            @endif
        @endforeach
      </div>
    
    </div>
</div>

@endsection