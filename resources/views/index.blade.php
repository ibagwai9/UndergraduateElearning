@extends('layouts.basic', [
    'namePage' => 'Homepage',
    'class' => '',
    'activePage' => 'index',
])

@section('content')
<!--================Courses Area =================-->
<section class="courses_area p_120">
    <div class="container">
        <div class="main_title">
            <h2>Popular Programs</h2>
            <p>Continues learning through E-Learnign programs, experience our resourcefull platform.</p>
            <p>Currently we are offering ({{\App\Program::all()->count()}}) fully online based udergraduate degree programs</p>
            <p>Supported by ({{\App\Institution::all()->count()}}) Universities accros Nigeria.</p>
            <br>
            <p><a class="main_btn" href="#">EXPLORE <i class="fa fa-carret"></i></a></p>
        </div>
        <div class="row courses_inner">
            <div class="col-lg-9">
                <div class="grid_inner">
                    <div class="grid_item wd55">
                        <div class="courses_item">
                            <img  width="300" height="300"  src="{{ asset('assets') }}/basic/img/courses/course-1.jpg" alt="">
                            <div class="hover_text">
                                <a class="cat" href="{{route('home')}}">Join</a>
                                <a href="#"><h4>{{getProgram(1)->name}}</h4></a>
                                <ul class="list">
                                    <h5>{{getProgram(1)->title}}</h5>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="grid_item wd44">
                        <div class="courses_item">
                            <img  width="400"" height="300"  src="{{ asset('assets') }}/basic/img/courses/course-2.jpg" alt="">
                            <div class="hover_text">
                                <a class="cat" href="{{route('home')}}">Join</a>
                                <a href="#"><h4><a href="#"><h4>{{getProgram(2)->name}}</h4></a>
                                <ul class="list">
                                    <h5>{{getProgram(2)->title}}</h5>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="grid_item wd44">
                        <div class="courses_item">
                            <img   width="400" height="300"  src="{{ asset('assets') }}/basic/img/courses/course-4.jpg" alt="">
                            <div class="hover_text">
                                <a class="cat" href="{{route('home')}}">Join</a>
                                <a href="#"><h4><a href="#"><h4>{{getProgram(4)->name}}</h4></a>
                                <ul class="list">
                                    <h5>{{getProgram(4)->title}}</h5>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="grid_item wd55">
                        <div class="courses_item">
                            <img  width="400" height="300"  src="{{ asset('assets') }}/basic/img/courses/course-5.jpg" alt="">
                            <div class="hover_text">
                                <a class="cat" href="{{route('home')}}">Join</a>
                                <a href="#"><h4><a href="#"><h4>{{getProgram(3)->name}}</h4></a>
                                <ul class="list">
                                    <h5>{{getProgram(3)->title}}</h5>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="course_item">
                    <img  width="400" height="650" src="{{ asset('assets') }}/basic/img/courses/course-3.jpg" alt="">
                    <div class="hover_text">
                        <a class="cat" href="{{route('home')}}">Join</a>
                        <a href="#"><h4>{{getProgram(5)->name}}</h4></a>
                        <ul class="list">
                            <h5>{{getProgram(5)->title}}</h5>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Courses Area =================-->

<!--================Team Area =================-->
<section class="team_area p_120">
    <div class="container">
        <div class="main_title">
            <h2>Supported and Accredited by</h2>
            <p>The key Nigerian Universities.</p>
        </div>
        <div class="row team_inner">
            <div class="col-lg-3 col-sm-6">
                <div class="team_item">
                    <div class="team_img">
                        <img class="rounded-circle"  width="250" height="250" src="{{ asset('assets') }}/basic/img/team/buk-vc.jpg" alt="">
                        <div class="hover">
                            <h2>Prof. Muhammad Bello</h2>
                        </div>
                    </div>
                    <div class="team_name">
                        <h4>BUK (VC)</h4>
                        <p>Prof. Muhammad Bello</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="team_item">
                    <div class="team_img">
                        <img class="rounded-circle" width="250" height="250" src="{{ asset('assets') }}/basic/img/team/abu-vc.jpg" alt="">
                        <div class="hover">
                            <h2>Prof. Kabir Bala</h2>
                        </div>
                    </div>
                    <div class="team_name">
                        <h4>ABU (VC)</h4>
                        <p>Prof. Kabir Bala</p>
                        <p>MBA, Ph.D, FNIOB, MAPM, MCABE, Msclarb</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="team_item">
                    <div class="team_img">
                        <img class="rounded-circle"  width="250" height="250" src="{{ asset('assets') }}/basic/img/team/noun-vc.png" alt="">
                        <div class="hover">
                            <h2>Prof. Abdalla Uba Adamu</h2>
                        </div>
                    </div>
                    <div class="team_name">
                        <h4>NOUN (VC)</h4>
                        <p>Prof. Abdalla Uba Adamu</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="team_item">
                    <div class="team_img">
                        <img class="rounded-circle"  width="250" height="250" src="{{ asset('assets') }}/basic/img/team/Adam-Adamu.jpg" alt="">
                        <div class="hover">
                            <h2>Adamu Adamu</h2>
                        </div>
                    </div>
                    <div class="team_name">
                        <h4>Adamu Adamu</h4>
                        <p>Nigerian Minister of Education</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Team Area =================-->

<!--================Testimonials Area =================-->
<section class="testimonials_area p_120">
    <div class="container">
        <div class="testi_slider owl-carousel">
            <div class="item">
                <div class="testi_item">
                    <img class="rounded-circle" width="150" height="150" src="{{ asset('assets') }}/img/me.jpg" alt="">
                       <h4>Ishaq Ibrahim</h4>
                       <ul class="list">
                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                       </ul>
                       <p>Full stack Laravel developer. Data scientist Hobbyist. I Love Computing and communicating with Machines to solve real-life problems.</p>
                </div>
            </div>
            <div class="item">
                <div class="testi_item">
                    <img class="rounded-circle" width="150" height="150" src="{{ asset('assets') }}/img/me.jpg" alt="">
                       <h4>iBagwai</h4>
                       <ul class="list">
                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                       <p>ICA SRCOE Compus ambasador, Code clube Founder 2020.</p>
                </div>
            </div>
            <div class="item">
                <div class="testi_item">
                    <img class="rounded-circle" width="150" height="150" src="{{ asset('assets') }}/img/me.jpg" alt="">
                       <h4>iBagwai</h4>
                       <ul class="list">
                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                       </ul>
                       <p>Contact: <a href="https://github.com/ibagwai9">My Git Repo</a> Email: ibagwai9@gmail.com.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Testimonials Area =================-->

<!--================Pagkages Area =================-->
<section class="packages_area p_120">
    <div class="container">
        <div class="row packages_inner">
            <div class="col-lg-4">
                <div class="packages_text">
                    <h3 style="color:#4dbf1c;">Unified Elearnig platform</h3>
                    <p>Never stop learning, <br />Engage in our Virtual transfer of knowledge</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="packages_item">
                    <div class="pack_head">
                        <i class="lnr lnr-graduation-hat"></i>
                        <h3>Learn</h3>
                        <p>Create your student profile</p>
                    </div>
                    <div class="pack_body">
                        <ul class="list">
                            <li><a href="#">Never miss Lectures</a></li>
                            <li><a href="#">Communicate & Collaborate</a></li>
                            <li><a href="#">Acquire virtual learning experience</a></li>
                        </ul>
                    </div>
                    <div class="pack_footer">
                        <h4>Student</h4>
                        <a class="main_btn" href="{{route('home')}}">Join Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="packages_item">
                    <div class="pack_head">
                        <i class="fa fa-book"></i>
                        <h3>Fercilitator</h3>
                        <p>Fercilitate e-leaning</p>
                    </div>
                    <div class="pack_body">
                        <ul class="list">
                            <li><a href="#">Easy lecture planing</a></li>
                            <li><a href="#">Full class room managent</a></li>
                            <li><a href="#">Easy assesment</a></li>
                        </ul>
                    </div>
                    <div class="pack_footer">
                        <h4>Lecturer</h4>
                        <a class="main_btn" href="{{route('home')}}">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Pagkages Area =================-->

<!--================Latest Blog Area =================-->
<section class="latest_blog_area p_120">
    <div class="container">
        <div class="main_title">
            <h2>School notice board</h2>
            <p>Stay connected and get updates with our realtime latest schools' information.</p>
        </div>
        <div class="row latest_blog_inner">
            <div class="col-lg-3 col-md-6">
                <div class="l_blog_item">
                    <img class="img-fluid" src="{{ asset('assets') }}/basic/img/courses/course-1.jpg" alt="">
                    <a class="date" href="#">This project was been initiated on 15/03/2020</a>
                    <a href="single-blog.html"><h4>Schools would be resumed by 01/April, 2020.</h4></a>
                    <p>Federal Ministry of Education announced the day to resume study Nation wide. <a href="#">Read more</a></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="l_blog_item">
                    <img class="img-fluid" src="{{ asset('assets') }}/basic/img/latest-blog/l-blog-2.jpg" alt="">
                    <a class="date" href="#">25 October, 2018  |  By Mark Wiens</a>
                    <a href="single-blog.html"><h4>Addiction When Gambling Becomes A Problem</h4></a>
                    <p>Computers have become ubiquitous in almost every facet of our lives. At work, desk jockeys spend hours in front of their desktops, while delivery</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="l_blog_item">
                    <img class="img-fluid" src="{{ asset('assets') }}/basic/img/latest-blog/l-blog-3.jpg" alt="">
                    <a class="date" href="#">25 October, 2018  |  By Mark Wiens</a>
                    <a href="single-blog.html"><h4>Addiction When Gambling Becomes A Problem</h4></a>
                    <p>Computers have become ubiquitous in almost every facet of our lives. At work, desk jockeys spend hours in front of their desktops, while delivery</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="l_blog_item">
                    <img class="img-fluid" src="{{ asset('assets') }}/basic/img/latest-blog/l-blog-4.jpg" alt="">
                    <a class="date" href="#">25 October, 2018  |  By Mark Wiens</a>
                    <a href="single-blog.html"><h4>Addiction When Gambling Becomes A Problem</h4></a>
                    <p>Computers have become ubiquitous in almost every facet of our lives. At work, desk jockeys spend hours in front of their desktops, while delivery</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Latest Blog Area =================-->
@endsection