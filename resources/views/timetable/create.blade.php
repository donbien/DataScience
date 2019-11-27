@extends('layouts.app', ['activePage' => 'timetable', 'titlePage' => __('Timetable')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('extract') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" >
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
                                   <label class="col-sm-2 col-form-label">{{ __('Course') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="course" id="course" type="text" placeholder="{{ __('Course') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
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
                      <input class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="study_year" id="input-year" type="text" placeholder="{{ __('Year') }}" value="{{ old('year') }}" required />
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
                      <input class="form-control{{ $errors->has('start') ? ' is-invalid' : '' }}" input type="text" name="session_start" id="session_start" placeholder="{{ __('Cohort Start') }}" value="" required />
                      @if ($errors->has('session_start'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('start') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Cohort End') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="session_end" id="session_end" type="text" placeholder="{{ __('Cohort End') }}" value="" required />
                    </div>
                  </div>
                </div>
     
                             <!--  <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Unit Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="text" name="unit_name" id="input-password" placeholder="{{ __('Unit Name') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div> -->


                              <!--   <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Unit Code') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="text" name="unit_code" id="unit_code" placeholder="{{ __('Unit Code') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div> -->

                            <!--     <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Lecturer') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="text" name="lecturer" id="input-password" placeholder="{{ __('Lecturer') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div> -->
                              <!--   <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Day of the week') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="text" name="day_of_the_week" id="day_of_the_week" placeholder="{{ __('Day of the Week') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div> -->
                             <!--    <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Time Slot') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="text" name="time" id="time" placeholder="{{ __('Time Slot') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div> -->

                                      <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Timetable') }}</label>
                  <div class="col-sm-7">
<!--                     <div class="form-group"> -->
                       <input type="file" name="file" id='file' class="form-control">
                    <!-- </div> -->
                  </div>
                </div>
                         </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection