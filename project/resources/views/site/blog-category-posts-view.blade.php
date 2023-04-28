@extends('layouts.siteMaster')

@section('title')
    <title>{{$BlogCategorySetup->title}} | {{$ASPTitle}}</title>
    <meta name="description" content="{{$BlogCategorySetup->meta_tags}}">
	<meta name="keywords" content="{{$BlogCategorySetup->meta_description}}">
	<meta name="author" content="{{$ASPTitle}}">
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
    <blog-category-posts :category="{{$BlogCategorySetup}}" authcheck="{{json_encode(Auth::check())}}"></blog-category-posts>
</div>
<!-- End: PAGE CONTENT -
################################################################## -->

@stop

@section('footer')
@stop