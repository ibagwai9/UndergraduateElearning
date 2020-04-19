<div class="sidebar" data-color="gray">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
    <a href="http://www.creative-tim.com" class="simple-text logo-mini">
      {{ __(ENV('TITLE1')) }}
    </a>
    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
      {{ __(ENV('TITLE2')) }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="@if ($activePage == 'home') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li>
        <a data-toggle="collapse" href="#laravelExamples">
            <i class="now-ui-icons files_single-copy-04"></i>
          <p>
            {{ __("Resume lectures") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExamples" >
          <ul class="nav" style='background:#0c2646; color:#000'>
            <li class="@if ($activePage == 'profile') active @endif">
              <a href="{{ route('profile.edit') }}">
                <i class="fa fa-flask"></i>
                <p> {{ __("CHM 2251 - CHP 5") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'users') active @endif">
              <a href="{{ route('user.index') }}">
                <i class="fa fa-dna"></i>
                <p> {{ __("BIO 2203 - CHP 3") }} </p>
              </a>
            </li>
          </ul>
        </div>
      <li class="@if ($activePage == 'icons') active @endif">
        <a href="{{ route('page.index','icons') }}">
          <i class="now-ui-icons files_single-copy-04"></i>
          <p>{{ __('MyCourses') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'maps') active @endif">
        <a href="{{ route('page.index','maps') }}">
          <i class="now-ui-icons location_map-big"></i>
          <p>{{ __('Assignments') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'notifications') active @endif">
        <a href="{{ route('page.index','notifications') }}">
          <i class="now-ui-icons ui-1_bell-53"></i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'table') active @endif">
        <a href="{{ route('page.index','table') }}">
          <i class="fa fa-users"></i>
          <p>{{ __('My Colleagues') }}</p>
        </a>
      </li>
      
      <li class = "active-pro">
        <a href="{{ url('/') }}" class="color-ev">
          <i class="now-ui-icons business_bank"></i>
          <p>{{ __('TOUR COLLEGE') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>