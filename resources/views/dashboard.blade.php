
@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_copy</i>
              </div>
              <p class="card-category">Applications</p>
              <h3 class="card-title">{{    $application_stats }}
                <small></small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                    <a href="{{ route('application.index') }}" class="btn btn-sm btn-primary">{{ __('View More') }}</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Special Exams</p>
              <h3 class="card-title">{{ $special}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                    <a href="{{ route('application.create') }}" class="btn btn-sm btn-primary">{{ __('View More') }}</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Retakes</p>
              <h3 class="card-title">{{$retakes}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                      <a href="{{ route('retakesReports') }}" class="btn btn-sm btn-primary">{{ __('View More') }}</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fa fa-bars"></i>
              </div>
              <p class="card-category">Repeat</p>
              <h3 class="card-title">{{$repeat}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                          <a href="{{ route('retakesReports') }}" class="btn btn-sm btn-primary">{{ __('View More') }}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
<!--       <div class="row">
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-success">
              <div class="ct-chart" id="dailySalesChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Daily Sales</h4>
              <p class="card-category">
                <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> updated 4 minutes ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-warning">
              <div class="ct-chart" id="websiteViewsChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Email Subscriptions</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-danger">
              <div class="ct-chart" id="completedTasksChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Completed Tasks</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div>
      </div> -->
      <div class="row">
     <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Pending Units</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>Unit Code</th>
                  <th>Total</th>
                </thead>
                <tbody>
              @foreach($reports as $report)
                <tr>
                    <td>{{$report->unit_code}}</td>
                    <td>{{$report->Total}}</td>

                  </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
     <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Retakes</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>Student Id</th>
                  <th>Unit Name</th>

                </thead>
                <tbody>
                  @foreach($re as $ret)
                  <tr>
                    <td>{{$ret->student_number}}</td>
                    <td>{{$ret->unit_code}}</td>
                    <td></td>
                    <td></td>
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
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush