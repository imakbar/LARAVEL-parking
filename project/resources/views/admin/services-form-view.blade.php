@extends('layouts.adminMaster')

@section('title')
<title>Services | {{$ASPTitle}}</title>
@stop

@section('head')
@stop

@section('content')

<!--START PAGE CONTENT -->
<div id="app">
	<services-form :icons_data="{{json_encode(config('icon.icons'))}}"></services-form>
</div>
<!--END PAGE CONTENT -->

@stop

@section('footer')
<!-- CKEDITOR -->
<script src="{{url('/')}}/plugins/ckeditor/ckeditor.js"></script>
<script src="{{url('/')}}/plugins/ckeditor/samples/js/sample.js"></script>
@stop