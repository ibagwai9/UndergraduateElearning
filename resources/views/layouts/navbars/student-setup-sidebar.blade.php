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
        <a href="{{ route('student-setup') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li>
        <a data-toggle="collapse" href="#laravelExamples">
            <i class="fa fa-book"></i>
          <p>
            {{ __("Resume lectures") }}
            <b class="caret"></b>
          </p>
        </a>
        @if(@$stage)
        <div class="collapse show" id="laravelExamples" >
          <ul class="nav" style='background:#0c2646; color:#000'>
            @php $routes = sSetupRoutes() @endphp
            @for($i=0; $i<count($routes); $i++)
            <li @if ($stage == $i+1)  class="bg-success" @endif>
              <a href="{{ route('student-setup',$i+1) }}">
                @if ($stage == $i+1) 
                  <i class="fa fa-edit"></i> 
                @else 
                  @if(@$routes[($i)][1])
                  <i class="fa fa-check"></i>
                  @else 
                    <i class="fa fa-book"></i>
                  @endif
                @endif
                
                <p>{{ __($routes[$i][0]) }} </p>
              </a>
            </li>
            @endfor
          </ul>
        </div>
        @else 
        <li class = "">
          <a href="{{ route('student-setup',1) }}" class="color-ev">
            <i class="fa fa-user"></i>
            <p>{{ __('Update academic info') }}</p>
          </a>
        </li>
        @endif
      
      
      <li class = "active-pro">
        <a href="{{ url('/') }}" class="color-ev">
          <i class="now-ui-icons business_bank"></i>
          <p>{{ __('TOUR COLLEGE') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>