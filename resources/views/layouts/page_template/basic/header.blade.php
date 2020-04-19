<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="top_menu row m0">
        <div class="container">
         <div class="float-left">
             <ul class="list header_social">
                 <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                 <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                 <li><a href="#"><i class="fa fa-github"></i></a></li>
             </ul>
         </div>
         <div class="float-right">
             <a class="dn_btn" href="tel:+4400123654896">+234-70353-84184</a>
             <a class="dn_btn" href="mailto:support@colorlib.com">developer@vlearn.edu.ng</a>
         </div>
        </div>	
    </div>	
 <div class="main_menu">
     <nav class="navbar navbar-expand-lg navbar-light">
         <div class="container">
             <!-- Brand and toggle get grouped for better mobile display -->
             <a class="navbar-brand logo_h" href="index.html"><img src="{{ asset('assets') }}/basic/img/logo.png" alt=""></a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
             </button>
             <!-- Collect the nav links, forms, and other content for toggling -->
             <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                 <ul class="nav navbar-nav menu_nav ml-auto">
                     <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li> 
                     <li class="nav-item"><a class="nav-link" href="about-us.html">ABOUT-ME</a></li> 
                     <li class="nav-item submenu dropdown">
                         <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PROGRAMS</a>
                         <ul class="dropdown-menu">
                            @foreach (getPrograms()->take(5) as $program)
                                <li class="nav-item"><a class="nav-link" href="courses.html">{{$program->title}}</a></li>
                            @endforeach
                            <li class="nav-item"><a class="nav-link" href="courses.html">More programs</a>
                         </ul>
                     </li> 
                     <li class="nav-item submenu dropdown">
                         <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">FACULTIES</a>
                         <ul class="dropdown-menu">
                            @foreach (getFaculties()->take(5) as $faculty)
                                <li class="nav-item"><a class="nav-link" href="faculty.html">{{$faculty->name}}</a></li>                                 
                            @endforeach
                            <li class="nav-item"><a class="nav-link" href="elements.html">More faculties</a></li>
                         </ul>
                     </li> 
                     <li class="nav-item submenu dropdown">
                         <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">NOTICE BOARD</a>
                         <ul class="dropdown-menu">
                             <li class="nav-item"><a class="nav-link" href="blog.html">NOTICE BOARD</a></li>
                             <li class="nav-item"><a class="nav-link" href="single-blog.html">ACADEMIC CALENDER</a></li>
                         </ul>
                     </li> 
                     <li class="nav-item"><a class="nav-link" href="contact.html">ABOUT PROJECT</a></li>
                 </ul>
             </div> 
         </div>
     </nav>
 </div>
</header>
<!--================Header Menu Area =================-->