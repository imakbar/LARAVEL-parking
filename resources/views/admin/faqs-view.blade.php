@extends('layouts.adminMaster')

@section('title')
<title>FAQs | {{$ASPTitle}}</title>
<meta name="description" content="FAQs">
<meta name="keywords" content="FAQs">
<meta name="author" content="">
@stop

@section('head')
@stop

@section('content')

<!--START PAGE CONTENT -->
<div id="app">
	<faqs-form></faqs-form>
</div>
<!--END PAGE CONTENT -->

@stop

@section('footer')
<!-- CKEDITOR -->
<script src="{{url('/')}}/plugins/ckeditor/ckeditor.js"></script>
<script src="{{url('/')}}/plugins/ckeditor/samples/js/sample.js"></script>
@stop