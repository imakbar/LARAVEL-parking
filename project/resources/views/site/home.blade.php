@extends('layouts.siteMaster')

@section('title')
    <title>{{$ASPTitle}}</title>
    <meta name="description" content="{{$ASPTitle}}}">
	<meta name="keywords" content="{{$ASPTitle}}}">
	<meta name="author" content="">
@stop

@section('content')

<!--
#################################
    - Begin: PAGE CONTENT -
#################################
-->
<div id="app">
    <homepage :setting="{{$ASPSetting}}"></homepage>
</div>
<!-- End: PAGE CONTENT -
################################################################## -->

@stop
