@extends('layouts.adminMaster')

@section('title')
<title>Agencies | {{$ASPTitle}}</title>
@stop

@section('head')
<!-- IMAGE UPLOADER -->
<link href="{{url('/')}}/assets/vendors/fileupload/img-upload.css" rel="stylesheet">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Example -->
<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css"> -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"> -->

@stop

@section('content')

<!-- <div class="input-group">
	<span class="input-group-btn">
		<a id="" data-input="thumbnail" data-preview="holder" class="btn btn-primary lfm">
			<i class="fa fa-picture-o"></i> Choose
		</a>
	</span>
	<input id="thumbnail" class="form-control" type="text" name="filepath">
</div>
<img id="holder" style="margin-top:15px;max-height:100px;"> -->

<!--START PAGE CONTENT -->
<div id="app">
	<agencies></agencies>
</div>
<!--END PAGE CONTENT -->

@stop

@section('footer')
<!-- CKEDITOR -->
<script src="{{url('/')}}/plugins/ckeditor/ckeditor.js"></script>
<script src="{{url('/')}}/plugins/ckeditor/samples/js/sample.js"></script>

<!-- IMAGE UPLOADER -->
<script src="{{url('/')}}/assets/vendors/fileupload/img-upload.js"></script>
<!-- <script src="{{url('/')}}/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
	$('.img-upload').imgUpload();
	$('.lfm').filemanager('image');
	$('.lfm').filemanager('file');
</script> -->
@stop