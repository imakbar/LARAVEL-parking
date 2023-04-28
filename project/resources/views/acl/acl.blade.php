@extends('layouts.adminMaster')

@section('title')
<title>Access Control Logic | {{$ASPTitle}}</title>
@stop

@section('head')
<!-- IMAGE UPLOADER -->
<link href="{{url('/')}}/assets/vendors/fileupload/img-upload.css" rel="stylesheet">
@stop

@section('content')

<!--START PAGE CONTENT -->
<section class="page-content container-fluid">
	<div id="app">
		<acl :data="{{json_encode(config('acl.modules'))}}"></acl>
	</div>
</section>
<!--END PAGE CONTENT -->

@stop

@section('footer')
<!-- IMAGE UPLOADER -->
<script src="{{url('/')}}/assets/vendors/fileupload/img-upload.js"></script>
<script>
	$('.img-upload').imgUpload();
</script>
@stop