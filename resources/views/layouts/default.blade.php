<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jekyll CMS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/external/datetimepicker/css/jquery.datetimepicker.css">
</head>
<body>

@include('layouts._navbar')

<div class="container">
    @yield('content')
</div>

@include('layouts._footer')

</body>
</html>