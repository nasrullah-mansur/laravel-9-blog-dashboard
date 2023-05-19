@extends('back.layout.layout', [$title = 'Update the custom page']);


@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-square-controls">Update the custom page</h4>
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
          <form class="form" action="{{ route('custom.page.update', $page->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
              <div class="form-group">
                <label for="name">Name</label>
                <input value="{{ $page->name }}" type="text" id="name" class="form-control square {{ $errors->has('name') ? 'is-invalid' : ''}} " placeholder="Name" name="name">
                @if ($errors->has('name'))
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="title">Title</label>
                <input value="{{ $page->title }}" type="text" id="title" class="form-control square {{ $errors->has('title') ? 'is-invalid' : ''}} " placeholder="Title" name="title">
                @if ($errors->has('title'))
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                @endif
              </div>

              <fieldset class="form-group">
                <div class="image-preview" >
                    <img style="max-width: 120px;" src="{{ asset($page->image ? $page->image : 'back/images/gallery/1.jpg') }}" alt="image">
                </div>
                <label for="basicInputFile">Banner Image (potional) {{$page->image}}</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input image-input-show" id="image" name="image">
                  <label class="custom-file-label" for="image">Choose file</label>
                </div>
                @if($errors->has('image'))
                <small class="text-danger">{{ $errors->first('image') }}</small>
                @endif
              </fieldset>

              <fieldset class="form-group mb-0">
                <label for="html">HTML</label>
                <textarea id="html" rows="5" class="form-control summernote" name="html" placeholder="HTML">{{ $page->html }}</textarea>
                @if($errors->has('html'))
                <small class="text-danger">{{ $errors->first('html') }}</small>
                @endif
              </fieldset>

              <fieldset class="form-group">
                <label for="css">CSS (optional)</label>
                <textarea id="css" rows="5" class="form-control" name="css" placeholder="CSS">{{ $page->css }}</textarea>
                @if($errors->has('css'))
                <small class="text-danger">{{ $errors->first('css') }}</small>
                @endif
              </fieldset>

              <fieldset class="form-group">
                <label for="javascript">JavaScript (optional)</label>
                <textarea id="javascript" rows="5" class="form-control" name="javascript" placeholder="Custom JavaScript">{{ $page->javascript }}</textarea>
                @if($errors->has('javascript'))
                <small class="text-danger">{{ $errors->first('javascript') }}</small>
                @endif
              </fieldset>

              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option value="{{ STATUS_ACTIVE }}">Public</option>
                    <option value="{{ STATUS_INACTIVE }}">Save Draft</option>
                </select>
              </div>
                            
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary" style="margin-right: 5px; ">
                  <i class="fa fa-check-square-o"></i> Save
                </button>
              <button type="reset" class="btn btn-warning">
                <i class="ft-x"></i> Reset
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection