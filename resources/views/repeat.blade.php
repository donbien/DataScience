


@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])
@section('content')
  <div class="content">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
      <!--           <div class="panel-heading">Chart Demo</div> -->

                <div class="panel-body">
                    {!! $repeat->html() !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Charts::scripts() !!}
{!! $repeat->script() !!}
@endsection