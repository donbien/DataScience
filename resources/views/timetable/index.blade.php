

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
                            @if(Auth::user()->role_id != 5)
                  <div class="col-12 text-right">
                    <a href="{{ route('timetable.create') }}" class="btn btn-sm btn-primary">{{ __('Upload Timetable') }}</a>
                  </div>

                     @endif
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
                                            <th>
                        {{ __('Unit Name') }}
                      </th>
                      @if(Auth::user()->role_id == 5)
                                            <th>
                        {{ __('Day') }}
                      </th>
 @endif
              
                    
               
                    </thead>
                    <tbody>
                        @foreach(  $Timetables as $timetable)
                        <tr>
                          <td>
                         {{ $timetable->course }}
                          </td>
                          <td>
                          {{ $timetable->study_year }}
                          </td>
                          <td>
                         {{ $timetable->session_start }} -   {{ $timetable->session_end }} 
                          </td>
<td>      {{ $timetable->unit_name }} </td>

                                                    <td>
                         {{ $timetable->day_of_the_week }} 
                          </td>
                        
                          <td>
                             @if(Auth::user()->role_id != 5)
                             <td class="td-actions text-right">

                            @if ($timetable->timetable_id )
                              <form action="{{ route('timetable.destroy', $timetable) }}" method="post">
                                  @csrf
                                  @method('delete')
                              
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('timetable.edit', $timetable->timetable_id) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this timetable?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                            @else
                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('timetable.edit',$timetable->timetable_id) }}" data-original-title="" title="">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>
                            @endif
                               @endif
                          </td>
                          </td>
                         <!--  -->
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