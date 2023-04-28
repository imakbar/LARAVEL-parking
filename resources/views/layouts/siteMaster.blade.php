<!DOCTYPE html>
<html>
<head>
    
    @yield('title')
    
    @include('includes.site-header-links')

    @yield('head')

</head>
<body>
	<div class="se-pre-con"></div>

    @include('includes.site-header')

    @yield('content')

    @include('includes.site-footer')

    @include('includes.site-footer-links')

    @yield('footer')
    
</body>
</html>