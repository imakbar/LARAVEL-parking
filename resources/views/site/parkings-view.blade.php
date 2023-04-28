@extends('layouts.siteMaster')

@section('title')
    <title>Parkings | {{$ASPTitle}}</title>
    <meta name="description" content="Parkings">
	<meta name="keywords" content="Parkings">
	<meta name="author" content="{{$ASPTitle}}">
@stop

@section('head')
@stop

@section('content')

<!--
#################################
    - Begin: PAGE CONTENT -
#################################
-->
<div id="app">
    <parkings></parkings>
</div>
<!-- End: PAGE CONTENT -
################################################################## -->

@stop

@section('footer')
@stop