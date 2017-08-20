<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Angkor Pool</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="{{ url('css/font.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
</head>
<body>
@include('partial.top-navigation')
<div class="middle-wrapper d-flex flex-column flex-lg-row">
    @include('partial.side-nav')
    <div class="content-wrapper p-3">
        @yield('content')
        @include('partial.footer')
    </div>
</div>
<script src="{{ url('js/jquery.js') }}"></script>
<script src="{{ url('js/bootstrap.js') }}"></script>
<script src="{{ url('js/bootstrap-datepicker.min.js') }}"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd'
    });

    $('.navbar-toggler.desktop').on('click', function(){
        $('.page-sidebar.desktop').toggleClass('open');
    });

    $('.navbar-toggler.mobile').on('click', function(){
        var sidebar = $('.page-sidebar.mobile');
        $(sidebar).toggleClass('open')
        if($(sidebar).hasClass('open')){
            $(sidebar).css('height', $('.page-sidebar.mobile ul').height() + 'px');
        }else{
            $(sidebar).css('height', 0);
        }
    });

    $('.page-sidebar .navbar-nav > .nav-item.expand').on('click', function(e){
        e.preventDefault();
        $(this).find('.sub-menu').toggleClass('open');
        if($(this).find('.sub-menu').hasClass('open')){
            $(this).find('.nav-link .arrow i').removeClass('fa-chevron-down');
            $(this).find('.nav-link .arrow i').addClass('fa-chevron-up');
        }else{
            $(this).find('.nav-link .arrow i').removeClass('fa-chevron-up');
            $(this).find('.nav-link .arrow i').addClass('fa-chevron-down');
        }
    });
</script>
@yield('script')
</body>
</html>
