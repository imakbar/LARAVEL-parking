@extends('layouts.adminMaster')

@section('title')
<title>Blog Post | {{$ASPTitle}}</title>
@stop

@section('head')
<!-- IMAGE UPLOADER -->
<link href="{{url('/')}}/assets/vendors/fileupload/img-upload.css" rel="stylesheet">
@stop

@section('content')

<!--START PAGE CONTENT -->
<div id="app">
	<blog-post-form></blog-post-form>
</div>
<!--END PAGE CONTENT -->

@stop

@section('footer')
<!-- CKEDITOR -->
<script src="{{url('/')}}/plugins/ckeditor/ckeditor.js"></script>
<script src="{{url('/')}}/plugins/ckeditor/samples/js/sample.js"></script>
<!-- IMAGE UPLOADER -->
<script src="{{url('/')}}/assets/vendors/fileupload/img-upload.js"></script>
<script>
	$('.img-upload').imgUpload();
</script>
@stop