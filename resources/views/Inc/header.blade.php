<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}
    {{--    css style--}}
    <link rel="stylesheet" href="{{asset('fontawesome\css\all.min.css')}}" type='text/css'>
    <link rel="stylesheet" href="{{asset('/css/Style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/adminStyle.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

