@extends('layout.adminMaster')

<?php use Illuminate\Support\Facades\Input; ?> @section('title')
<title>Access Control Logic | {{$ASPTitle}}</title>

@stop @section('headLinks')
<!-- HEADER LINKS -->
@include('include.header-links') @stop @section('sidebar') @include('include.sidebar-dashboard') @stop @section('body')
<div class="app-content content container-fluid">
	<div class="content-wrapper">

		<!-- MESSAGE -->
		@include('message.message-top')

		<div class="container m-top-30 m-bottom-30">
			<h1 class="text-uppercase text-center text-bold-600">
				User Rights Groups
			</h1>
		</div>

		<div class="content-body">
			<div class="card clearfix p-20">
				<div class="row">
					<div class="col-md-12">
						<div class="box inverse">
							<header>
								<!-- .toolbar -->
								<div class="toolbar">
									<nav style="padding: 8px;">
										{{-- <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
											<i class="fa fa-search"></i> Search Voucher
										</a> --}}
										{{--
										<a href="javascript:;" class="btn btn-default btn-xs full-box">
											<i class="fa fa-expand"></i>
										</a> --}}
									</nav>
								</div>
								<!-- /.toolbar -->
							</header>
							<div id="app" class="body collapse in" aria-expanded="true" style="">
                                <div class="row">
                                    <acl-group :data="{{json_encode(config('acl.modules'))}}"></acl-group>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

</div>
</div>

@stop @section('footerLinks')
@include('include.footer-links')
@include('message.message-bottom')
@include('common.common')
<!-- <script src="{{url('/')}}/js/app.js"></script> -->
@stop