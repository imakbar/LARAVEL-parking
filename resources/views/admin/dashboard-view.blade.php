@extends('layouts.adminMaster')

@section('title')
<title>Dashboard | {{$ASPTitle}}</title>
@stop

@section('head')

@stop

@section('content')

<!--START PAGE CONTENT -->
<section class="page-content container-fluid">
	<div id="app">
		<dashboard></dashboard>
	</div>
</section>
<!--END PAGE CONTENT -->

@stop

@section('footer')

@stop