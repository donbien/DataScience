

@extends('layouts.app', ['activePage' => 'application', 'titlePage' => __('Exams Application')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('application.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" >
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Apply for Pending Unit') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('application.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>


                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Student Number') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="student_number" id="input-name" type="text" placeholder="{{ __('Student Number') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
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
                      <input class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="study_year" id="input-year" type="text" placeholder="{{ __('Year') }}" value="{{ old('year') }}" required />
                      @if ($errors->has('year'))
                        <span id="year-error" class="error text-danger" for="input-year">{{ $errors->first('year') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Unit Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="unit_name" id="input-email" type="text" placeholder="{{ __('Unit Name') }}" value="{{ old('email') }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Unit Code') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="text" name="unit_code" id="input-password" placeholder="{{ __('Unit Code') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Application type') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <select name = "type_of_application" id='type_of_application'class="form-control" >
                        <option value="Retake">Retake</option>
                        <option value="Resit">Resit</option>
                        <option value="Special Exam">Special Exam</option>


                      </select>
                    </div>
                  </div>
                </div>


                      <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Letter of Reason') }}</label>
                  <div class="col-sm-7">
<!--                     <div class="form-group"> -->
                       <input type="file" name="letter_of_reason" id='letter_of_reason' class="form-control">
                    <!-- </div> -->
                  </div>
                </div>
                                
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection