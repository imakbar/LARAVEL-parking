@extends('layouts.siteMaster')

@section('title')
    <title>Password Reset | iProperty</title>
@stop

@section('content')

<!--
#################################
    - Begin: PAGE CONTENT -
#################################
-->
<div id="app">
    <passwordresetform :user_id="{{$user_id}}" :token="{{$token}}"></passwordresetform>
</div>
<!-- End: PAGE CONTENT -
################################################################## -->

@stop
