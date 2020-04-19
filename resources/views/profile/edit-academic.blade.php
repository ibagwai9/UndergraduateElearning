@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Academic Profile',
    'activePage' => 'profile',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" School details")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('academic-profile.update') }}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
              @method('put')
              @include('alerts.success')
              <div class="row">
              </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label>{{__("Institution")}}</label>
                      <input type="text" name="institution" id="institution" class="form-control" value="{{ old('institution', auth()->user()->name) }}">
                      @include('alerts.feedback', ['field' => 'name'])
                      <div id="instList"> </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label for="exampleInputemail1">{{__("Faculty")}}</label>
                      <input type="text" required="" name="faculty" id="faculty" disabled="" class="form-control" placeholder="faculty" value="{{ old('faculty', auth()->user()->faculty) }}">
                      @include('alerts.feedback', ['field' => 'faculty'])
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label for="exampleInputemail1">{{__("Program")}}</label>
                        <input type="text" name="program" id="programs" class="form-control" placeholder="Program" value="{{ old('program', auth()->user()->program) }}">
                        @include('alerts.feedback', ['field' => 'program'])
                        <div id="programList"> </div>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label for="exampleInputemail1">{{__("Level")}}</label>
                      <select required="" name="level" class="form-control" placeholder="Level" value="{{ old('level', auth()->user()->level) }}">
                        <option value="">Select your level</option>
                        @for ($i=1; $i<7; $i++)
                          <option value="{{$i}}">Level {{$i}}00</option>
                        @endfor 
                      </select>
                        @include('alerts.feedback', ['field' => 'level'])
                    </div>
                  </div>
                </div>
              <div class="card-footer ">
                <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
              </div>
              <hr class="half-rule"/>
            </form>
          </div>
          <div class="card-header">
            <h5 class="title">{{__("Courses registration")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
              @csrf
              @method('put')
              @include('alerts.success', ['key' => 'courses_status'])
              <div class="row">
                <div class="col-md-7 pr-1">
                  <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label>{{__(" Search for course")}}</label>
                    <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="old_password" placeholder="{{ __('Course code') }}" type="password"  required>
                    @include('alerts.feedback', ['field' => 'old_password'])
                  </div>
                </div>
              </div>
              
            <div class="card-footer ">
              <button type="submit" class="btn btn-primary btn-round ">{{__('Register courses')}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
      <div class="col-md-4">
        <div class="card card-user">
          <div class="image">
            <img src="{{asset('assets')}}/img/bg5.jpg" alt="...">
          </div>
          <div class="card-body">
            <div class="author">
              <a href="#">
                <img class="avatar border-gray" src="{{asset('assets')}}/img/default-avatar.png" alt="...">
                <h5 class="title">{{ auth()->user()->name }}</h5>
              </a>
              <p class="description">
                  {{ auth()->user()->faculty }}
              </p>
            </div>
          </div>
          <hr>
          <div class="button-container">
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-facebook-square"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-twitter"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-google-plus-square"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('js')
<script>
  $(document).ready(function(){
  
   $('#programs').keyup(function(){ 
          var query = $(this).val();
          if(query != '')
          {
           var _token = $('input[name="_token"]').val();
           $.ajax({
            url:"{{ route('program.fetch') }}",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data){
             $('#programList').fadeIn();  
              $('#programList').html(data);
            }
           });
          }
      });
  
      $(document).on('click', '#program', function(){  
          $('#programs').val($(this).text());
          $('#programList').fadeOut();

          var datas = $('#programs').val();

          console.log(datas);

          if(datas != '')
          {
           var _token = $('input[name="_token"]').val();
           $.ajax({
            url:"{{ route('faculty.fetch') }}",
            method:"POST",
            data:{query:datas, _token:_token},
            success:function(data){
             $('#faculty').val(data); 
             $('#faculty').css({'background':'green', 'color':'#ffffff'});
            }
           });
          }
      });  

      $('#institutions').keyup(function(){ 
          var query = $(this).val();
          if(query != '')
          {
           var _token = $('input[name="_token"]').val();
           $.ajax({
            url:"{{ route('institution.fetch') }}",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data){
             $('#instList').fadeIn();  
                $('#instList').html(data);
            }
           });
          }
      });

      $(document).on('click', '#institution', function(){  
          $('#institutions').val($(this).text());  
          $('#instList').fadeOut();  
      });  
  });
  </script>
@endpush