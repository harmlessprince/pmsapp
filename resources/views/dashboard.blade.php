<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>
    @yield('page_name', 'Dashboard')
</h1>
<header>
    <a>Home</a> <a>House</a> <a>Run</a>
</header>
<div>
    @yield('body')
</div>
<aside>
    <a>Home aside</a> <a>Aside</a> <a>Aside</a>
</aside>
</body>
</html>
