@extends('layouts.siteMaster')

@section('title')
    <title>FAQs | {{$ASPTitle}}</title>
    <meta name="description" content="FAQs">
	<meta name="keywords" content="FAQs">
	<meta name="author" content="">
@stop

@section('content')

<!--
#################################
    - Begin: PAGE CONTENT -
#################################
-->
<div id="app">
    <faqs></faqs>
</div>
<!-- End: PAGE CONTENT -
################################################################## -->

@stop
