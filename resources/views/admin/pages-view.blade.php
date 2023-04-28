@extends('layouts.adminMaster')

@section('title')
<title>Pages | {{$ASPTitle}}</title>
@stop

@section('head')
@stop

@section('content')

<!--START PAGE CONTENT -->
<div id="app">
	<pags-form></pags-form>
</div>
<!--END PAGE CONTENT -->

@stop

@section('footer')
<!-- CKEDITOR -->
<script src="{{url('/')}}/plugins/ckeditor/ckeditor.js"></script>
<script src="{{url('/')}}/plugins/ckeditor/samples/js/sample.js"></script>
@stop