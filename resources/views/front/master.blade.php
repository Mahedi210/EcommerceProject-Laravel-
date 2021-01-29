<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

@include('front.includes.header')

<body>


@include('front.includes.header-top')
@include('front.includes.header-bottom')
@include('front.includes.navbar')

@yield('body')

@include('front.includes.footer')

</body>
</html>
