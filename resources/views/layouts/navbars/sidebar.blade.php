<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">

  <div class="logo">
    <a href="http://10.9.41.27/" class="simple-text logo-normal">
      {{ __('My Strathmore') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
  @if (Auth::user()->role_id != 5)

      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
   
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Access Control') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
       @elseif(Auth::user()->role_id != 5)
      <li class="nav-item{{ $activePage == 'exams' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('exams.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Exams') }}</p>
        </a>
      </li>
@endif

      <li class="nav-item{{ $activePage == 'timetable' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('timetable.index') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Timetable') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'application' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('application.index') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Applications') }}</p>
        </a>
      </li>
      @if(Auth::user()->role_id != 5)
            <li class="nav-item{{ $activePage == 'application' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('application.index') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Reports') }}</p>
        </a>
      </li>
@endif

    </ul>
  </div>
</div>