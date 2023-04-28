@extends('layouts.siteMaster')

@section('title')
    <title>{{$BlogPost->title}} | {{$BlogCategorySetup->title}} | {{$ASPTitle}}</title>
    <meta name="description" content="{{$BlogPost->meta_tags}}">
	<meta name="keywords" content="{{$BlogPost->meta_description}}">
	<meta name="author" content="{{$BlogPost->CreatedBy->Profile->first_name}} {{$BlogPost->CreatedBy->Profile->last_name}}">
@stop

@section('head')
@stop

@section('content')

<!--
#################################
    - Begin: PAGE CONTENT -
#################################
-->
<div id="app">
    <blog-post :category="{{$BlogCategorySetup}}" :post="{{$BlogPost}}" authcheck="{{json_encode(Auth::check())}}"></blog-post>
</div>
<!-- End: PAGE CONTENT -
################################################################## -->

@stop

@section('footer')
@stop