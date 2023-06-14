<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Oman | Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-[Poppins] bg-gray-100 grid place-items-center h-screen w-screen">
    <div class="p-6">
        @yield('content')
    </div>
    @yield('js')
</body>

</html>
