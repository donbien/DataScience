

@extends('layouts.app', ['activePage' => 'timetable', 'titlePage' => __('Timetable')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Timetable') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('timetable.create') }}" class="btn btn-sm btn-primary">{{ __('Upload Timetable') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Course') }}
                      </th>
                      <th>
                        {{ __('Group') }}
                      </th>
                      <th>
                        {{ __('Cohort') }}
                      </th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                   
                        <tr>
                          <td>
                       
                          </td>
                          <td>
                        
                          </td>
                          <td>
                       
                          </td>
                         <!--  -->
                        </tr>
               
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection