@extends('back.layout.layout', [$title = 'Edit blog item']);


@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-square-controls">Edit blog item</h4>
        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
          <ul class="list-inline mb-0">
            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
            <li><a data-action="close"><i class="ft-x"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="card-content collapse show">
        <div class="card-body">
          <form class="form" action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
              <div class="form-group">
                <label for="name">Title</label>
                <input value="{{ $blog->title }}" type="text" id="name" class="form-control square {{ $errors->has('title') ? 'is-invalid' : ''}} " placeholder="Title" name="title">
                @if ($errors->has('title'))
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label>Select Category</label>
                <select class="select2 form-control" name="blog_category_id">
                  @foreach ($categories as $category)
                  <option {{ $category->id == $blog->blog_category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                  @endforeach
                </select>
                @if ($errors->has('blog_category_id'))
                    <small class="text-danger">{{ $errors->first('blog_category_id') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label>Select Tags</label>
                <select class="select2 form-control" name="tags[]" multiple>
                  @foreach ($tags as $tag)
                  <option {{ in_array($tag->id, $active_tags) ? 'selected' : ''  }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                  @endforeach
                </select>
              </div>

              <fieldset class="form-group">
                <div class="image-preview" >
                    <img style="max-width: 120px;" src="{{ asset($blog->image) }}" alt="image">
                </div>
                <label for="basicInputFile">Choose Image</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input image-input-show" id="image" name="image">
                  <label class="custom-file-label" for="image">Choose file</label>
                </div>
                @if($errors->has('image'))
                <small class="text-danger">{{ $errors->first('image') }}</small>
                @endif
              </fieldset>

              <fieldset class="form-group mb-0">
                <label for="content">Content</label>
                <textarea id="content" rows="5" class="form-control summernote" name="content" placeholder="content">{{ $blog->content }}</textarea>
                @if($errors->has('content'))
                <small class="text-danger">{{ $errors->first('content') }}</small>
                @endif
              </fieldset>

              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option {{ $blog->status == STATUS_ACTIVE ? 'selected' : '' }} value="{{ STATUS_ACTIVE }}">Public</option>
                    <option {{ $blog->status == STATUS_INACTIVE ? 'selected' : '' }} value="{{ STATUS_INACTIVE }}">Save Draft</option>
                </select>
              </div>
                            
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary" style="margin-right: 5px; ">
                  <i class="fa fa-check-square-o"></i> Save
                </button>
              <button type="button" type="reset" class="btn btn-warning">
                <i class="ft-x"></i> Reset
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection