@extends('layouts.adminMaster')

@section('title')
<title>Terminals | {{$ASPTitle}}</title>
@stop

@section('head')
@stop

@section('content')

<!--START PAGE CONTENT -->
<div id="app">
	<setup-airport-terminals :airport="{{$Airport}}"></setup-airport-terminals>
</div>
<!--END PAGE CONTENT -->

@stop

@section('footer')
@stop