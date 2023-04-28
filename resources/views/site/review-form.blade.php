@extends('layouts.siteMaster')

@section('title')
    <title>Review | {{$ASPTitle}}</title>
    <meta name="description" content="Review">
	<meta name="keywords" content="Review">
	<meta name="author" content="">
@stop

@section('content')

<!--
#################################
    - Begin: PAGE CONTENT -
#################################
-->
<div id="app">
    <review :review="{{$Review}}"></review>
</div>
<!-- End: PAGE CONTENT -
################################################################## -->

@stop