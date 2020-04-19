@extends('layouts.app', [
    'namePage' => 'Register page',
    'activePage' => 'register',
    'backgroundImage' => asset('assets') . "/img/bg16.jpg",
])

@section('content')
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-5 ml-auto">
          <div class="info-area info-horizontal mt-5">
            <div class="icon icon-primary">
              <i class="fa fa-graduation-cap"></i>
            </div>
            <div class="description">
              <h5 class="info-title">{{ __('Virtual Learnig') }}</h5>
              <p class="description">
                {{ __("Why not utilize technology and. access learning fercilities everywhere you are") }}
              </p>
            </div>
          </div>
          <div class="info-area info-horizontal">
            <div class="icon icon-primary">
              <i class="fa fa-book"></i>
            </div>
            <div class="description">
              <h5 class="info-title">{{ __('Knowledge is flexible') }}</h5>
              <p class="description">
                {{ __("Learn at your own phase, good and reliable assessment features.") }}
              </p>
            </div>
          </div>
          <div class="info-area info-horizontal">
            <div class="icon icon-info">
              <i class="fa fa-users"></i>
            </div>
            <div class="description">
              <h5 class="info-title">{{ __('Collaborate with student') }}</h5>
              <p class="description">
                {{ __('Enjoy virtual interaction with classmates and fercilitators.') }}
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mr-auto">
          <div class="card card-signup text-center">
            <div class="card-header ">
              <h4 class="card-title">{{ __('Register') }}</h4>
              <div class="social">
                <button class="btn btn-icon btn-round">
                  <i class="fa fa-graduation-cap"></i>
                </button>
                <button class="btn btn-icon btn-round">
                  <i class="fa fa-book"></i>
                </button>
                <button class="btn btn-icon btn-round">
                  <i class="fa fa-desktop"></i>
                </button>
                <button class="btn btn-icon btn-round">
                  <i class="fa fa-mobile"></i>
                </button>
                <h5 class="card-description">  {{ __('Never stop learning') }}</h5>
              </div>
            </div>
            <div class="card-body ">
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <!--Begin input phone -->
                <div class="input-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fa fa-phone"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('Mobile number') }}" type="text" name="phone" value="{{ old('phone') }}" required autofocus>
                  @if ($errors->has('phone'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                  @endif
                </div>
                <!--Begin input email -->
                <div class="input-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons ui-1_email-85"></i>
                    </div>
                  </div>
                  <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required>
                 </div>
                 @if ($errors->has('email'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <!--Begin input user type-->
                
                <!--Begin input password -->
                <div class="input-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons objects_key-25"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" name="password" required>
                  @if ($errors->has('password'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
                <!--Begin input confirm password -->
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons objects_key-25"></i></i>
                    </div>
                  </div>
                  <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required>
                </div>
                <div class="form-check text-left">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox">
                    <span class="form-check-sign"></span>
                    {{ __('I agree to the') }}
                    <a href="#something">{{ __('terms and conditions') }}</a>.
                  </label>
                </div>
                <div class="card-footer ">
                  <button type="submit" class="btn btn-primary btn-round btn-lg">{{__('Get Started')}}</button>
                </div>
              </form>
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
      demo.checkFullPageBackgroundImage();
    });
  </script>
@endpush
