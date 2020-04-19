@extends('layouts.student-setup', [
'namePage' => 'Lecture listening',
'class' => 'sidebar-mini',
'activePage' => 'Lecture listening',
])

@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-user">
            <div class="">
                <h2 class=" title text-center">{{ auth()->user()->userable->institution->title}}</h2>
                <h3 class="text-center">Faculty of {{ auth()->user()->userable->faculty->name}}</h3>
            </div>
            <div class="card-body">
                <div class="author">
                    
                    <h4 class="title">Department: {{ $course->program->name }} </h4>
                    <h5 class="title">Course: {{$course->code }} - {{$course->title }}</h5>
                    <h4> Level {{ auth()->user()->userable->level}}00</h4>
                    <h4 class="description">Total lectures:  {{$course->lectures->count()}}</h4>
                    
                </div>
            </div>
            <hr />
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8" style="display:inline-block">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title text-center">{{$course->lectures[0]->title}}</h5> 
                        <p class="title"><a href="#">{{$course->lectures[0]->fercilitator->name}}</a></p>                   
                    </div>
                    <div class="card-body text-justify">
                        {!!$course->lectures[0]->contents!!}
                    </div>
                    <div class="card-footer text-justify">
                        @php
                            $i =1
                        @endphp
                        @if($course->lectures[0]->chapters->count()>0)
                            @foreach ($course->lectures[0]->chapters as $chapter)
                            <h4> <strong></strong> {{$chapter->title}}</h4>                            
                            @if ($chapter->attachments->count()>0)
                                <h5>This Chapter has  {{$chapter->attachments->count()>1?'attachments':'attachment'}}</h5>
                                @php $i =1 @endphp
                                @foreach ($chapter->attachments as $attachment)
                                <li class="list-group-item  clearfix">
                                  <strong>{{$i++}}. </strong>&nbsp;{{$attachment->name}} <a href="#" class="btn btn-success btn-sm pull-right">({{strtoupper($attachment->ext)}}) Download <i class="fa  fa-download"></i> </a>
                                    @if ($attachment->mime_type=='video')
                                        <div class="embed-responsive embed-responsive-16by9 clearfix">
                                            <iframe width="768" height="480" src="https://www.youtube.com/embed/uHWtNyKmbWA?list=PLm8ZSArAXicJAzGE7ebwSOiFN-f9xEOKu" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                      </div>
                                    @endif
                                </li>
                                @endforeach                                
                            @endif
                            <p>{{$chapter->content}}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div> 
            <div class="col-md-4" style="float:right">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h3 class="text-center text-info">AVAILABLE LECTURES</h3>
                            </li>
                            @foreach ($course->lectures as $lecture)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    @php
                                        $i=1;
                                    @endphp
                                    {{$i++}}. {{$lecture->title}}
                                    @php
                                        $chapters_count = $course->lectures[0]->chapters->count();
                                    @endphp
                                    @if($course->lectures[0]->chapters && $chapters_count >0)
                                        <span class="badge badge-primary badge-pill">{{$chapters_count}} {{$chapters_count>1?'chapters':'chapter'}}</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
  @stop