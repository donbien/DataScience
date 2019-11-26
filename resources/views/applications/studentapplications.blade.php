


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
                      <th>
                        {{ __('Letter of Reason') }}
                      </th>

                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
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

                          <td>
     <a href="{{ route('download', $application->student_number.'.docx') }}" class="btn btn-sm btn-primary">{{ __('View') }}</a>
                          </td>

                                                    <td class="td-actions text-right">
                            @if ($application->id != auth()->id())
                              <form action="{{ route('user.destroy', $application) }}" method="post">
                                  @csrf
                                  @method('delete')
                              
                                 <a class="btn btn-primary" href="{{ route('application.edit',$application->id) }}">Edit</a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                            @else
                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('application.edit',$application->id ) }}" data-original-title="" title="">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>
                            @endif
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