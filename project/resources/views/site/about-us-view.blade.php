@extends('layouts.siteMaster')

@section('title')
    <title>About Us | {{$ASPTitle}}</title>
    <meta name="description" content="About Us">
	<meta name="keywords" content="About Us">
	<meta name="author" content="">
@stop

@section('content')

<!--
#################################
    - Begin: PAGE CONTENT -
#################################
-->
<div id="app">
    <about-us></about-us>
</div>
<!-- End: PAGE CONTENT -
################################################################## -->

@stop
