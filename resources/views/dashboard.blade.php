



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
                 <i class="material-icons">date_range</i> Last 24 Hours
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
              <h3 class="card-title">23</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Last 24 Hours
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
              <h3 class="card-title">75</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">local_offer</i> No new update
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
              <p class="card-category">Faculty</p>
              <h3 class="card-title">15</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i> Just Updated
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
              <h4 class="card-title">Retakes</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>Student Id</th>
                  <th>Name</th>
                  <th>Faculty</th>
                  <th>Unit</th>
                </thead>
                <tbody>
                <tr>
                    <td>07852</td>
                    <td>Dakota Kolio</td>
                    <td>FIT</td>
                    <td>Cost Accounting</td>
                  </tr>
                  <tr>
                    <td>2346</td>
                    <td>Minerva Hooper</td>
                    <td>SIMS</td>
                    <td>Financial Accounting</td>
                  </tr>
                  <tr>
                    <td>3345</td>
                    <td>Sage Rodriguez</td>
                    <td>BCOM</td>
                    <td>Business Finance</td>
                  </tr>
                  <tr>
                    <td>4234</td>
                    <td>Philip Chaney</td>
                    <td>Law</td>
                    <td>Ethics</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
     <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Special Exams</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>Student Id</th>
                  <th>Name</th>
                  <th>Faculty</th>
                  <th>Unit</th>
                </thead>
                <tbody>
                  <tr>
                    <td>07852</td>
                    <td>Dakota Kolio</td>
                    <td>FIT</td>
                    <td>Cost Accounting</td>
                  </tr>
                  <tr>
                    <td>2346</td>
                    <td>Minerva Hooper</td>
                    <td>SIMS</td>
                    <td>Financial Accounting</td>
                  </tr>
                  <tr>
                    <td>3345</td>
                    <td>Sage Rodriguez</td>
                    <td>BCOM</td>
                    <td>Business Finance</td>
                  </tr>
                  <tr>
                    <td>4234</td>
                    <td>Philip Chaney</td>
                    <td>Law</td>
                    <td>Ethics</td>
                  </tr>
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