<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--CSRF Token-->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Angkor Pool</title>

        <!--Common App Styles-->
        {{ Html::style('assets/app/css/app.css') }}
        {{ Html::style('assets/admin/css/admin.css') }}
        {{ Html::style('assets/admin/css/custome.css') }}
        <!--Styles-->
        @yield('styles')

        <!--Head-->
        @yield('head')

    </head>
    <body class="@yield('body_class')">

        <!--Page-->
        @yield('page')

        <!--Common Scripts -->
        {{ Html::script('assets/app/js/app.js') }}
        {{ Html::script('assets/admin/js/admin.js') }}


        <!--Scripts-->
        @yield('scripts')
    </body>
</html>
