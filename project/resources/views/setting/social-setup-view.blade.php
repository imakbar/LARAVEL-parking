@extends('layouts.adminMaster')

@section('title')
<title>Social | {{$ASPTitle}}</title>
@stop

@section('head')

@stop

@section('content')

<header class="page-header">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<h1 class="separator">Social</h1>
			<nav class="breadcrumb-wrapper" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/')}}"><i class="icon dripicons-home"></i></a></li>
					<li class="breadcrumb-item active" aria-current="page">Social</li>
				</ol>
			</nav>
		</div>
		<!-- <ul class="actions top-right">
			<li class="dropdown">
				<a href="javascript:void(0)" class="btn btn-fab" data-toggle="dropdown" aria-expanded="false">
					<i class="la la-ellipsis-h"></i>
				</a>
				<div class="dropdown-menu dropdown-icon-menu dropdown-menu-right">
					<div class="dropdown-header">
						Quick Actions
					</div>
					<a href="#" class="dropdown-item">
						<i class="icon dripicons-clockwise"></i> Refresh
					</a>
					<a href="#" class="dropdown-item">
						<i class="icon dripicons-gear"></i> Manage Widgets
					</a>
					<a href="#" class="dropdown-item">
						<i class="icon dripicons-cloud-download"></i> Export
					</a>
					<a href="#" class="dropdown-item">
						<i class="icon dripicons-help"></i> Support
					</a>
				</div>
			</li>
		</ul> -->
	</div>
</header>

<!--START PAGE CONTENT -->
<section class="page-content container-fluid">
	<div id="app">
		<social-setup :icons_data="{{json_encode(config('icon.icons'))}}"></social-setup>
	</div>
</section>
<!--END PAGE CONTENT -->

@stop

@section('footer')

@stop