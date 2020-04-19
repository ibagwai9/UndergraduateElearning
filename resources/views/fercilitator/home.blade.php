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
        @if(auth()->user()->userable_id && !@auth()->user()->userable->status)
        <div class="button-container">
          <form method="post" action="{{ route('academic-profile.update') }}" autocomplete="off">
              @csrf
              @method('put')
              @include('alerts.success')
              
          <input type="checkbox" name='status' value="1" >&nbsp;I&nbsp;Accept&nbsp;Terms&nbsp;&&nbsp;Conditions&nbsp;Governing&nbsp;this&nbsp;Institution.</input>
          <div class="btn-group" role="group">        
              <button type="submit" class="btn btn-primary  btn-round btn-sm">Resume study</button>
          </div>
          @endif
        </form>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              <h5 class="title">{{auth()->user()->userable->program_id ? auth()->user()->userable->program->name:'Choose program first'}}</h5>
                <p class="category">Level 200 1st semester
                  <a href="https://nucleoapp.com/?ref=1712">2020</a>
                </p>
              </div>
              <div class="card-body all-icons">
                <div class="row">
                  @foreach (auth()->user()->userable->courses as  $course)                    
                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                      <div class="font-icon-detail">
                        <i class="fa fa-book"></i>
                        <h4>{{$course->course->code}}</h4>
                        <p>{{$course->course->title}}</p>

                        <p> 
                          @if($course->course->lectures && $course->course->lectures->count()>0)
                            <a class=" btn btn-sm btn-success"  href="{{route('lectures',$course->course->id)}}"> Resume &raquo;</a>
                            <br />
                              Total lectures <strong class="text-success">{{$course->course->lectures?$course->course->lectures->count():0}}</strong>
                          @else 
                            <a href="#">No lectures</a>
                          @endif 
                        </p>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @stop