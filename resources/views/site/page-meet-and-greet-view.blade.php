@extends('layouts.siteMaster')

@section('title')
    <title>{{$Page->title}} | {{$ASPTitle}}</title>
    <meta name="description" content="{{$Page->title}}">
	<meta name="keywords" content="{{$Page->title}}">
	<meta name="author" content="">
@stop

@section('content')

<!--
#################################
    - Begin: PAGE CONTENT -
#################################
-->
<div id="app">
    <page-meet-and-greet></page-meet-and-greet>
</div>
<!-- End: PAGE CONTENT -
################################################################## -->

@stop