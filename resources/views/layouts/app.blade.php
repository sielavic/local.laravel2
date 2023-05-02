<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('seo')
    @stack('styles')
</head>
<body>


<div class ="main-content">
    @yield('content')
</div>




</body>
</html>
