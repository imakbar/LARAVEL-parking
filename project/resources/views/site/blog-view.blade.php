@extends('layouts.siteMaster')

@section('title')
    <title>Blog | {{$ASPTitle}}</title>
    <meta name="description" content="Blog">
	<meta name="keywords" content="Blog">
	<meta name="author" content="">
@stop

@section('content')

<!--
#################################
    - Begin: PAGE CONTENT -
#################################
-->
<div id="app">
    <blog></blog>
</div>
<!-- End: PAGE CONTENT -
################################################################## -->

@stop
