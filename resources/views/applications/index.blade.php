


@extends('layouts.app', ['activePage' => 'application', 'titlePage' => __('Exams Application')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('APPLICATION OF NON-ORDINARY EXAMS') }}</h4>
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
                    <a href="{{ route('application.create') }}" class="btn btn-sm btn-primary">{{ __('Apply') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Name') }}
                      </th>
                      <th>
                        {{ __('Faculty') }}
                      </th>
                      <th>
                        {{ __('Unit Name') }}
                      </th>
                        <th>
                        {{ __('Status') }}
                      </th>
                       <th>
                        {{ __('Date Posted') }}
                      </th>
                <!--       <th class="text-right">
                        {{ __('Actions') }}
                      </th> -->
                    </thead>
                    <tbody>
                      @foreach($applications as $application)
                        <tr>
                          <td>
                            {{ $application->student_number }}
                          </td>
                          <td>
                            {{ $application->faculty }}
                          </td>
                            <td>
                            {{ $application->unit_name }}
                          </td>
                             <td>
                            {{ $application->status }}
                          </td>
                          <td>
                            {{ $application->created_at->format('Y-m-d') }}
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