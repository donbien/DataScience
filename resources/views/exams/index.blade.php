


@extends('layouts.app', ['activePage' => 'exams', 'titlePage' => __('Exam Timetable')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Exam Timetable') }}</h4>
                <p class="card-category"> </p>
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
                    <a href="{{ route('exams.create') }}" class="btn btn-sm btn-primary">{{ __('Apply') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">

                        <th>
                        {{ __('Unit Name') }}
                      </th>
                      <th>
                          {{ __('Group') }}
                      </th>
                      <th>
                        {{ __('Date') }}
                      </th>
                    
                        <th>
                        {{ __('Venue') }}
                      </th>
                       <th>
                        {{ __('Start Time') }}
                      </th>
                <!--       <th class="text-right">
                        {{ __('Actions') }}
                      </th> -->
                    </thead>

                    <tbody>
                      @foreach($exams as $exam)
                        <tr>
                          <td>
                            {{ $exam->unit_name_code }}
                          </td>
                          <td>
                            {{ $exam->group}}
                          </td>
                            <td>
                            {{ $exam->date }}
                          </td>
                             <td>
                            {{ $exam->venue }}
                          </td>
                          <td>
                            {{ $exam->start_time }}
                          </td>
                        </tr>
                      @endforeach
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