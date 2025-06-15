<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bakelicious</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    @include('layouts.navbar')

    <main>
        @yield('content')
    </main>

</body>
</html>
