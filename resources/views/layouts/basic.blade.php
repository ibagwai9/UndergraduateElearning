<!Doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="{{ asset('assets') }}/basic/img/favicon.png" type="image/png">
        <title>ULearn - UG: Unified learning for Undergraduate</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets') }}/basic/css/bootstrap.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/basic/vendors/linericon/style.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/basic/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/basic/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/basic/vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/basic/vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/basic/vendors/animate-css/animate.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/basic/vendors/popup/magnific-popup.css">
        <!-- main css -->
        <link rel="stylesheet" href="{{ asset('assets') }}/basic/css/style.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/basic/css/responsive.css">
        
    </head>
    <body class="{{ $class ?? '' }}">
        @if(@$backgroundImage)
            <div class="full-page-background" style="background-image: url('{{$backgroundImage}}') "/>
        @endif

        @include('layouts.page_template.basic.header')

        @include('layouts.page_template.basic.banner')
        
        @include('layouts.page_template.basic.feature-icons')

		@yield('content')              
        
        @include('layouts.page_template.basic.footer')
        
        
        @if(@$backgroundImage)
            </div>
        @endif
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('assets') }}/basic/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('assets') }}/basic/js/popper.js"></script>
    <script src="{{ asset('assets') }}/basic/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/basic/js/stellar.js"></script>
    <script src="{{ asset('assets') }}/basic/vendors/lightbox/simpleLightbox.min.js"></script>
    <script src="{{ asset('assets') }}/basic/vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('assets') }}/basic/vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('assets') }}/basic/vendors/isotope/isotope.pkgd.min.js"></script>
    <script src="{{ asset('assets') }}/basic/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="{{ asset('assets') }}/basic/vendors/popup/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('assets') }}/basic/js/jquery.ajaxchimp.min.js"></script>
    <script src="{{ asset('assets') }}/basic/vendors/counter-up/jquery.waypoints.min.js"></script>
    <script src="{{ asset('assets') }}/basic/vendors/counter-up/jquery.counterup.js"></script>
    <script src="{{ asset('assets') }}/basic/js/mail-script.js"></script>
    <script src="{{ asset('assets') }}/basic/js/theme.js"></script>
    @stack('js')
    
</body>

</html>