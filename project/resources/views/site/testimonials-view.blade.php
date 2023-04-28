@extends('layouts.siteMaster')

@section('title')
    <title>Testimonials | {{$ASPTitle}}</title>
    <meta name="description" content="Testimonials">
	<meta name="keywords" content="Testimonials">
	<meta name="author" content="">
@stop

@section('content')

<!--
#################################
    - Begin: PAGE CONTENT -
#################################
-->
<div id="app">
    <testimonials></testimonials>
</div>
<!-- End: PAGE CONTENT -
################################################################## -->

@stop
