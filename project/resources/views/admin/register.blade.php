@extends('layouts.siteMaster')

@section('title')
    <title>Register | {{$ASPTitle}}</title>
@stop

@section('head')
	<!-- <script src="https://unpkg.com/vue-recaptcha@latest/dist/vue-recaptcha.min.js"></script> -->
	<script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer></script>
@stop

@section('content')

<!--
#################################
    - Begin: PAGE CONTENT -
#################################
-->
<?php $error = session('error'); ?>
<?php $success = session('success'); ?>

<div id="app">
    <register dataerror="{{session('error')}}" datasuccess="{{session('success')}}"></register>
</div>
<!-- End: PAGE CONTENT -
################################################################## -->

@stop

@section('footer')
{!! NoCaptcha::renderJs() !!}
@stop