

@extends('layouts.app', ['activePage' => 'exams', 'titlePage' => __('Exams Application')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('extractexam') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" >
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Exam Timetable') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>


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
                <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection