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
    <page-how-it-works></page-how-it-works>
</div>
<!-- End: PAGE CONTENT -
################################################################## -->

@stop
