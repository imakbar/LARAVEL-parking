@extends('layouts.siteMaster')

@section('title')
    <title>My Bookings | {{$ASPTitle}}</title>
    <meta name="description" content="My Bookings">
	<meta name="keywords" content="My Bookings">
	<meta name="author" content="">
@stop

@section('content')

<!--
#################################
    - Begin: PAGE CONTENT -
#################################
-->
<div id="app">
    <my-bookings authcheck="{{json_encode(Auth::check())}}" :myorders="{{$Orders}}"></my-bookings>
</div>
<!-- End: PAGE CONTENT -
################################################################## -->

@stop
