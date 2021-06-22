@extends('layouts.app')
@section('content')
<div class="main_content">
    <div class="main_content_inner">
  <div class="uk-section uk-section-primary uk-padding-small uk-margin-bottom">
      <div class="uk-container">
        <a href="#"> Update article</a>
      </div>
  </div>
  <div class="uk-text-center uk-flex-center" uk-grid>
    <div class="uk-width-1-1@m uk-width-1-1">
        <div class="uk-card uk-card-default">
          <form class="uk-padding-small" action="{{ route('update.blog', ['id' => $blogInfo->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="uk-width-1-1 uk-margin-bottom">
                <input class="uk-input" type="text" placeholder="Title" name="title" value="{{ $blogInfo->title }}">
            </div>
            <div class="uk-width-1-1 uk-margin-bottom">
              <select class="uk-select" id="form-stacked-select" name="category_id" >
                @foreach($bcategories as $val)
                  <option value="{{ $val->id }}" <?php if ($blogInfo->id == $val->id) {
                  	echo 'selected';
                  } ?> >{{ $val->category_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="uk-width-1-1 uk-margin-bottom">
                <textarea class="uk-textarea" type="text" rows="3" name="description"  style="border: 1px solid #EFF2F7;">{{ $blogInfo->description }}</textarea>
            </div>
            <div class="uk-width-1-1 uk-margin-bottom">
                <textarea id="local-upload" class="bg" name="content">{{ $blogInfo->content }}</textarea>
            </div>

            @if (!empty($blogInfo->image))
              <div class="uk-width-1-1 drag-area uk-height-medium uk-flex uk-text-center uk-flex-middle uk-flex-column uk-background-cover uk-margin-bottom" style="background-image: url('{{ asset('storage/app/public/uploads/' .$blogInfo->image) }}');position: relative;padding-top: 70px;">         
            </div>
            @else

            @endif

            <div class="custom-file uk-margin-bottom">
              <input type="file" class="custom-file-input" id="customFile" name="image">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <div class="uk-margin-bottom">
                <a href="{{ route('my.articles') }}"><i class="uil-arrow-left"></i> Go Back</a>
                <button class="uk-button uk-button-primary" type="submit">Update</button>
            </div>
          </form>
        </div>
    </div>
</div>
</div>
 
  <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
  </script>

@endsection