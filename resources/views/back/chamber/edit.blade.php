@extends('back.layout.layout', [$title = 'Update the chamber']);


@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-square-controls">Update the chamber</h4>
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
          <form class="form" action="{{ route('chamber.update', $chamber->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-body">

              <div class="form-group">
                <label for="chamber_name">Chambr Name</label>
                <input value="{{$chamber->chamber_name}}" type="text" id="chamber_name" class="form-control square {{ $errors->has('chamber_name') ? 'is-invalid' : ''}} " placeholder="Chamber Name" name="chamber_name">
                @if ($errors->has('chamber_name'))
                    <small class="text-danger">{{ $errors->first('chamber_name') }}</small>
                @endif
              </div>

              

              <fieldset class="form-group">
                <div class="image-preview" >
                    <img style="max-width: 120px;" src="{{ asset($chamber->image) }}" alt="image">
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

              <fieldset class="form-group">
                <label for="address">Address</label>
                <textarea id="address" rows="5" class="form-control" name="address" placeholder="Address">{{$chamber->address}}</textarea>
                @if($errors->has('address'))
                <small class="text-danger">{{ $errors->first('address') }}</small>
                @endif
              </fieldset>

              <div class="form-group">
                <label>Select Days</label>
                <select class="select2 form-control" name="days[]" multiple>
                  @foreach ($days as $day)
                  <option {{ in_array($day->id, $active_days) ? 'selected' : ''  }} value="{{ $day->id }}">{{ $day->day }}</option>
                  @endforeach
                </select>
                @if ($errors->has('days'))
                    <small class="text-danger">{{ $errors->first('days') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label>Select Times</label>
                <select class="select2 form-control" name="times[]" multiple>
                  @foreach ($times as $time)
                  <option {{ in_array($time->id, $active_times) ? 'selected' : ''  }} value="{{ $time->id }}">{{ $time->time }}</option>
                  @endforeach
                </select>
                @if ($errors->has('times'))
                  <small class="text-danger">{{ $errors->first('times') }}</small>
              @endif
              </div>

              <div class="form-group">
                <label for="time">Time (short)</label>
                <input value="{{$chamber->time}}" type="text" id="time" class="form-control square {{ $errors->has('time') ? 'is-invalid' : ''}} " placeholder="Time" name="time">
                @if ($errors->has('time'))
                    <small class="text-danger">{{ $errors->first('time') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="appoint_limit">Appint Limit</label>
                <input value="{{$chamber->appoint_limit}}" type="number" id="appoint_limit" class="form-control square {{ $errors->has('appoint_limit') ? 'is-invalid' : ''}} " placeholder="Appint Limit" name="appoint_limit">
                @if ($errors->has('appoint_limit'))
                    <small class="text-danger">{{ $errors->first('appoint_limit') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="google_location">Google Location</label>
                <input value="{{$chamber->google_location}}" type="text" id="google_location" class="form-control square {{ $errors->has('google_location') ? 'is-invalid' : ''}} " placeholder="Google Location" name="google_location">
                @if ($errors->has('google_location'))
                    <small class="text-danger">{{ $errors->first('google_location') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="serial_number">Phone (serial)</label>
                <input value="{{$chamber->serial_number}}" type="text" id="serial_number" class="form-control square {{ $errors->has('serial_number') ? 'is-invalid' : ''}} " placeholder="Phone (serial)" name="serial_number">
                @if ($errors->has('serial_number'))
                    <small class="text-danger">{{ $errors->first('serial_number') }}</small>
                @endif
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