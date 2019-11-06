@extends('products.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<!-- <form action="{{ route('products.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail:</strong>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form> -->



          <form method="post" action="{{ route('timetable.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Create Timetable') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                                   <label class="col-sm-2 col-form-label">{{ __('Faculty') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="faculty" id="input-name" type="text" placeholder="{{ __('Faculty') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Year of Study') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('year') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="Year" id="input-year" type="text" placeholder="{{ __('Year') }}" value="{{ old('year') }}" required />
                      @if ($errors->has('year'))
                        <span id="year-error" class="error text-danger" for="input-year">{{ $errors->first('year') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-start">{{ __(' Cohort Start') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('start') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('start') ? ' is-invalid' : '' }}" input type="text" name="start" id="input-start" placeholder="{{ __('Cohort Start') }}" value="" required />
                      @if ($errors->has('start'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('start') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Cohort End') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="end" id="input-password-confirmation" type="text" placeholder="{{ __('Cohort End') }}" value="" required />
                    </div>
                  </div>
                </div>
     
                              <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Unit Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="text" name="unit_name" id="input-password" placeholder="{{ __('Unit Name') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>


                                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Unit Code') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="text" name="unit_code" id="unit_code" placeholder="{{ __('Unit Code') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Lecturer') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="text" name="lecturer" id="input-password" placeholder="{{ __('Lecturer') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Day of the week') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="text" name="day" id="input-password" placeholder="{{ __('Day of the Week') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Time Slot') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="text" name="time" id="input-password" placeholder="{{ __('Time Slot') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                         </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
              </div>
            </div>
          </form>
@endsection