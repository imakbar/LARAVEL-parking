@extends('layouts.siteMaster')

@section('title')
    <title>Profile | {{$ASPTitle}}</title>
@stop

@section('head')
	<!-- IMAGE UPLOADER -->
	<link href="{{url('/')}}/assets/vendors/fileupload/img-upload.css" rel="stylesheet">
@stop

@section('content')

<!--
#################################
    - Begin: PAGE CONTENT -
#################################
-->
<div id="app">
    <myprofile></myprofile>
</div>
<!-- End: PAGE CONTENT -
################################################################## -->

@stop

@section('footer')
	<!-- IMAGE UPLOADER -->
	<script src="{{url('/')}}/assets/vendors/fileupload/img-upload.js"></script>
	<script>
	  $('.img-upload').imgUpload();
	</script>
@stop