<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{url('/')}}/assets/images/logo/favicon.png">
    <link rel="apple-touch-icon" href="{{url('/')}}/assets/images/logo/apple-touch-icon.png">
    
    @yield('title')
    
    @include('includes.admin-header-links')

    @yield('head')

</head>
<body>

    <!-- START APP WRAPPER -->
    <div id="mainapp">

        @include('includes.admin-sidebar')

        <div class="content-wrapper">
            
            @include('includes.admin-header')

            @yield('content')

        </div> <!-- END CONTENT WRAPPER -->

        @include('includes.admin-footer-links')

        @yield('footer')

    </div>
    <!-- END APP WRAPPER -->
    
</body>
</html>