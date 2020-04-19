@extends('layouts.student-setup', [
'namePage' => 'Profile setup',
'class' => 'sidebar-mini',
'activePage' => 'Profile Setup',
])

@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="progress-container progress-success">
          <span class="progress-badge">Prifile completion progress</span>
          <div class="progress">
            <div class="progress-bar progress-bar-success bg-success" role="progressbar" aria-valuenow="{{(int) getUserProgress()}}" aria-valuemin="10" aria-valuemax="100" style="width: {{(int) getUserProgress()}}%;">
            <span class="progress-value">Completion progress {{(int) getUserProgress()}}%</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    @if(!$stage || $stage==1)
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <div class="row text-center">
                    <div class="col-md-12">
                        <img
                        @if (Auth::user()->profile_pic)
                            src="{{Auth::user()->profile_pic}}"
                        @else 
                            src="http://127.0.0.1:8000/assets/img/default-avatar.png" 
                        @endif
                            width="150"  height="150"
                            class=""
                        alt="Profile picture">
                        <h5 class="title">WELCOME GUEST</h5>
                        <P>Kindly take a moment to complete your profile</P>
                    </div>
                    <div class="col-md-6">
                        @if (Auth::user()->getType()==null)
                        <div class="card">
                            <div class="card-header">
                                <h4>Choose your role</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
                                enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    @include('alerts.success')
                                    <div class="form-group">
                                        <label for="userable_type">{{__("Enrolment type")}}</label>
                                        <div class="input-group" id="user-role">
                                            <select required="" name="userable_type" class="form-control" placeholder="" value="{{ old('level', auth()->user()->level) }}">
                                                <option value="">Select your role</option>
                                                <option value="Student">Enrole as Student</option>
                                                <option value="Fercilitator">Enrole as Fercilitator</option>
                                                @include('alerts.feedback', ['field' => 'userable_type'])
                                            </select>
                                            <div class="btn-group" role="group">        
                                                <button type="button button-lg" class="btn btn-primary">Next</button>
                                            </div>
                                        </div>   
                                    </div>
                                </form>
                            </div>
                        </div>
                        @elseif (Auth::user()->userable_id=='')
                        <div class="card">
                            <div class="card-header">
                            <h4 class="text-success">Enroled as Student</h4>
                            </div>
                            <div class="card-body">
                                @if(Auth::user()->profile_pic=='')
                                    <p>Uplaod your profile picture to proceed</p>  
                                @else 
                                    <a  href="#InstitutionTab" data-toggle="tab">Next</a>
                                @endif
                            </div>
                        </div>  
                        @endif
                    </div>
                    <div class="col-md-6" style="float:right">                                                    
                        <div class="card">
                            <div class="card-header">
                            <h4>Upload passport picture</h4>
                            </div>
                            <div class="card-body">
                                <form enctype="multipart/form-data" method="post" action="{{ route('profile.update') }}" autocomplete="off"
                                enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    @include('alerts.success')
                                    <label for="user_role">{{__("Maximume file size 200MB")}}</label>
                                    <div class="input-group" id="ficture">
                                        <input type="file" class="form-control" name="photo" placeholder="Choose ficture" />
                                        <div class="btn-group" role="group">        
                                            <button type="submit" class="btn btn-primary  btn-round btn-sm">Upload</button>
                                        </div>
                                    </div> 
                                </form>                                                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($stage && $stage==2)
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                      <h3>Personal Information</h3>
                  </div>
                  <form method="post" action="{{ route('academic-profile.update') }}" autocomplete="off">
                      @csrf
                      @method('put')
                      <input type="hidden" name="personal" value="true" />
                      @if( strpos(session($key ?? 'status'), 'Personal')!==false)
                        @include('alerts.success')
                      @endif
                      <div class="card-body">
                      <h5 class="card-title">@if(!auth()->user()->userable_id)Complete your @else {{auth()->user()->userable->name}}'s'@endif personal information</h5>
                          <div class="row">
                              <div class="col-md-3"></div>
                              <div class="col-md-6">                                    
                                  <div class="row"></div>
                                  @php                                        
                                  $inputs = [
                                      'name'=>'Full name',
                                      'gender'=>['Gender','Male','Female','Other'],
                                      'dob'=>'Date of birth',
                                      'reg_no'=>'Registration number',
                                      'phone'=>'Phone number', 
                                      'address'=>'Contact address', 
                                  ];
                                  @endphp
                                  @foreach($inputs as $input => $val)
                                  <div class="row">
                                      <div class="col-md-10 pr-2">
                                          <div class="form-group">
                                              @if (is_array($val))
                                                <select name="{{$input}}" class="form-control">
                                                <label>{{__($val[0])}}</label>
                                                @for ($i = 1; $i < count($val); $i++)
                                                    <option
                                                    @if(auth()->user()->userable_id && auth()->user()->userable->$input == $val[$i] ) selected="" @endif>{{$val[$i]}}</option>
                                                @endfor
                                                </select>
                                              @else
                                                <label>{{__($val)}}</label>
                                                <input 
                                                @if($input == 'dob') type="date" @else type="text" @endif 
                                                placeholder="Enter your {{__($val)}}" 
                                                name="{{$input}}" id="{{$input}}-id" 
                                                class="form-control" 
                                                @if($input == 'phone') readonly="" @endif 
                                                value="@if($input == 'phone') {{auth()->user()->phone}}@else{{old("$input",auth()->user()->userable_id? auth()->user()->userable->$input:'' ) }}@endif">
                                                @endif
                                            @include('alerts.feedback', ['field' => $input])
                                          </div>
                                      </div>
                                  </div>
                                  @endforeach                                   
                              </div>
                          </div>                                
                      </div>
                      <div class="card-footer text-muted text-center">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                </div>
              </div>
              @endif
              @if($stage && $stage==3)
              <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h5 class="title">{{__(" School details")}}</h5>
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ route('academic-profile.update') }}" autocomplete="off"
                    enctype="multipart/form-data">
                      @csrf
                      @method('put')
                      @if( strpos(session($key ?? 'status'), 'Academic')!==false)
                        @include('alerts.success')
                      @endif
                      <div class="row">
                      </div>
                        <div class="row">
                          <div class="col-md-7 pr-1">
                            <div class="form-group">
                              <label>{{__("Institution")}}</label>
                              <input type="text" name="institution" id="institutions" class="form-control" value="{{ old('institution',
                              auth()->user()->getType()!==null &&  auth()->user()->userable_id >0? auth()->user()->userable->institution?auth()->user()->userable->institution->title:'':'') }}">
                              @include('alerts.feedback', ['field' => 'name'])
                            <div id="instList"></div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-7 pr-1">
                            <div class="form-group">
                              <label for="coursesInputemail1">{{__("Faculty")}}</label>
                              <input type="text" required="" name="faculty" id="faculty" readonly="" class="form-control" placeholder="faculty" value="{{ old('faculty', auth()->user()->userable_id && auth()->user()->userable->faculty?'Faculty of '.auth()->user()->userable->faculty->name:'') }}">
                              @include('alerts.feedback', ['field' => 'faculty'])
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 pr-1">
                              <div class="form-group">
                                <label for="coursesInputemail1">{{__("Program")}}</label>
                                <input type="text" name="program" id="programs" class="form-control" placeholder="Program" value="{{ old('program', auth()->user()->userable_id && auth()->user()->userable->program?auth()->user()->userable->program->title:'') }}">
                                @include('alerts.feedback', ['field' => 'program'])
                                <div id="programList"> </div>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-7 pr-1">
                            <div class="form-group">
                              <label for="coursesInputemail1">{{__("Level")}}</label>
                              <select required="" name="level" class="form-control" placeholder="Level" value="{{ old('level', auth()->user()->level) }}">
                                <option value="">Select your level</option>
                                @for ($i=1; $i<7; $i++)
                                  <option value="{{$i}}"
                                  @if(auth()->user()->userable_id && auth()->user()->userable->level == $i ) selected="" @endif>Level {{$i}}00</option>
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
                    <h5 class="title">{{__("Final stage")}}</h5>
                  </div>
                  <div class="card-body">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#coursesModal">
                    <i class="fa fa-book"></i> Browse courses to register
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="coursesModal" tabindex="-1" role="dialog" aria-labelledby="coursesModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="coursesModalLabel">Registation for level {{auth()->user()->userable->level}}00 courses</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post"  action="{{ route('academic-profile.courses') }}" autocomplete="off"> 
                          
                            @method('put')
                            @csrf                                                  
                            <input type="hidden" name="personal" value="true" />
                            @if( strpos(session($key ?? 'status'), 'courses')!==false)
                              @include('alerts.success')
                            @endif
                          <table class="table">
                            @if(auth()->user()->userable->program_id!=null )
                            @foreach (@auth()->user()->userable->getLevelPrograms() as $program)
                            
                            <thead>
                              <tr>
                                <th colspan="5" class="text-center">{{$program->name}}</th>
                              </tr>
                                <tr>
                                  <td wdth="5%">#</td>
                                    <td wdth="15%"  class="text-left">Code</td>
                                    <td wdth="60%" class="text-left">Title</td>
                                    <td>Status</td>
                                    <td>Credit</td>
                                </tr>
                            </thead>
                            <tbody class="text-left" id="TBody-{{$program->semester}}">
                              @php $i=0; @endphp
                              
                              @if(auth()->user()->userable->getSemesterCourses($program->semester)->count()<=0)
                                @foreach ($program->getCourses() as $course)
                                @php $i++; @endphp
                                    <tr>
                                      <td wdth="2%" class="text-left">{{$i}}
                                        <input  type='checkbox' checked="checked" name='courseId[]' value='{{$course->id}}' />
                                      </td>
                                      <td wdth="15%" class="left-left">{{$course->code}}</td>
                                      <td wdth="60%"class="text-left">{{$course->title}}</td>
                                    <td wdth="5%" class="left-center" >{{$course->status}}</td>
                                    <td wdth="5%" class="left-center">{{$course->credit}}</td>
                                  </tr>
                                @endforeach 
                              @else
                                @foreach (auth()->user()->userable->getSemesterCourses($program->semester) as $course)
                                @php $i++; @endphp  
                                  <tr>
                                      <td wdth="2%" class="text-left">{{$i}}
                                        <input  type='checkbox' checked="checked" name='courseId[]' value='{{$course->course->id}}' />
                                      </td>
                                      <td wdth="15%" class="left-left">{{$course->course->code}}</td>
                                      <td wdth="60%"class="text-left">{{$course->course->title}}</td>
                                    <td wdth="5%" class="left-center" >{{$course->course->status}}</td>
                                    <td wdth="5%" class="left-center">{{$course->course->credit}}</td>
                                    <td><a href='#' class='text-danger delete-row'>Remove</a></td>
                                  </tr>
                                @endforeach 
                              @endif                                                         
                              <tr>
                                <td colspan="5">
                                    <div class="form-group">
                                    <label for="courses-{{$program->semester}}">Add more {{$program->semester==1?'First':'Second'}} semester courses</label>
                                    <input type="text" name="course" id="courses-{{$program->semester}}" class="form-control" placeholder="Add course" value="{{ old('courses', '') }}">                                          
                                    <div id="coursesList-{{$program->semester}}"> </div>
                                  </div>
                                </td>                                                              
                              </tr>
                            </tbody>
                          @endforeach


                          @if(@auth()->user()->userable->getLevelPrograms()->count()<1)
                          <thead>
                            <tr>
                              <th colspan="5" class="text-center">{{auth()->user()->userable->program_id?auth()->user()->userable->program->name:'Choose program first'}}</th>
                            </tr>
                              <tr>
                                <td wdth="5%">#</td>
                                  <td wdth="15%"  class="text-left">Code</td>
                                  <td wdth="60%" class="text-left">Title</td>
                                  <td>Status</td>
                                  <td>Credit</td>
                              </tr>
                          </thead>
                          @for($i=1; $i<3; $i++)                          
                          <tbody class="text-left" id="TBody-{{$i}}">
                            <tr>
                              <td colspan="5">
                                  <div class="form-group">
                                  <label for="courses-{{$i}}">Add more {{$i==1?'First':'Second'}} semester courses</label>
                                  <input type="text" name="course" id="courses-{{$i}}" class="form-control" placeholder="Add course" value="{{ old('courses', '') }}">                                          
                                  <div id="coursesList-{{$i}}"> </div>
                                </div>
                              </td>                                                              
                            </tr>
                              @foreach (auth()->user()->userable->getSemesterCourses($i) as $course)  
                                <tr>
                                  <td wdth="2%" class="text-left">{{$i}}
                                    <input  type='checkbox' checked="checked" name='courseId[]' value='{{$course->course->id}}' />
                                  </td>
                                  <td wdth="15%" class="left-left">{{$course->course->code}}</td>
                                  <td wdth="60%"class="text-left">{{$course->course->title}}</td>
                                  <td wdth="5%" class="left-center" >{{$course->course->status}}</td>
                                  <td wdth="5%" class="left-center">{{$course->course->credit}}</td>
                                  <td><a href='#' onclick="deleteCourse({{$course->id}})" class='text-danger delete-row'>Remove</a></td>
                                </tr>
                              @endforeach 
                          </tbody>
                          @endfor
                          @endif
                          @endif
                          </table>
                        </div>
                        <div class="modal-footer">
                          <p>Make sure that you have checked each sellected course</p>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>                                          
                </div>
              </div>
            </div>
              
            </div> 
          </div>
          @endif
          @if($stage && $stage==4)
          <div class="row">
            <div class="col-md-12">
              <div class="card card-user">
                <div class="image">
                  <img src="{{asset('assets')}}/img/bg5.jpg" alt="...">
                </div>
                <div class="card-body">
                  <div class="author">
                      <img class="avatar border-gray" src="{{auth()->user()->profile_pic}}" alt="...">
                      @if(!@auth()->user()->userable_id)
                        <h5 class="title text-danger">Complete your profile</h5>
                      @else
                        <h5 class="title text-success">{{ auth()->user()->userable->name }}</h5>
                        <h4 class="description">{{ auth()->user()->userable->program->name }} - Level {{ auth()->user()->userable->level}}00</h4>
                        <h4 class="description">
                        Faculty of {{ auth()->user()->userable->faculty->name }}
                        </h4>
                        <h3>{{ auth()->user()->userable->institution->title }}</h3>
                      @endif
                  </div>
                </div>
                <hr>
                @if(auth()->user()->userable_id && @auth()->user()->userable->status)
                  <p class="text-center">
                    <a href="{{route('home')}}" class="btn btn-primary btn-round btn-sm">Resume lectures <i class="now-ui-icons ui-1_check"></i> </a>
                  </p>
                @endif
                @if(auth()->user()->userable_id && !@auth()->user()->userable->status)
                <div class="button-container">
                  <form method="post" action="{{ route('academic-profile.update') }}" autocomplete="off">
                      @csrf
                      @method('put')
                      @include('alerts.success')
                      
                  <input type="checkbox" name='status' value="1" >&nbsp;I&nbsp;Accept&nbsp;Terms&nbsp;&&nbsp;Conditions&nbsp;Governing&nbsp;this&nbsp;Institution.</input>
                  <div class="btn-group" role="group">        
                      <button type="submit" class="btn btn-primary  btn-round btn-sm">Complete registrationm</button>
                  </div>
                  @endif
                </form>
                </div>
              </div>
            </div>
          </div>
          @endif   
        </div>        
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function(){

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
        @for($i = 1; $i<3; $i++)
        $('#courses-{{$i}}').keyup(function(){ 
            var query = $(this).val();
            if(query != '')
            {
                var _token = $('input[name="_token"]').val();
                var courses = $('input[name="courseId[]"]').val();
                console.log(courses);
                $.ajax({
                    url:"{{ route('courses.fetch',$i) }}",
                    method:"POST",
                    data:{query:query,courses:courses, _token:_token},
                    success:function(data){
                        $('#coursesList-{{$i}}').fadeIn();  
                        $('#coursesList-{{$i}}').html(data);
                    }
                });
            }
      });
      $(document).on('click', '#course-{{$i}}', function(){  
        var del = "<td><a href='#' class='text-danger delete-row'>Remove</a></td>";          
        $('#TBody-{{$i}}').append($(this).html());
        $('#coursesList-{{$i}}').fadeOut();  
        $("#TBody-{{$i}} tr:last").append(del);
        $('#courses-{{$i}}').val('');
        $('#coursesList-{{$i}}').val('');
      });
      @endfor

      $(document).on('click','.delete-row', function(){ 
        $(this).parents("tr").remove();
      });  
    });  
    function deleteCourse(id){
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url:"{{ route('delete-student.course') }}",
        method:"POST",
        data:{courseId:id, _token:_token},
        success:function(data){
          alert('Course deleted');
        }
      });
    }
</script>
@endpush