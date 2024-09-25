<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mi Sitio Web') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="py-5 bg-blue-100 px-8 flex justify-between items-center">
        <a class="font-medium" href="{{route('inicio')}}">Inicio</a>

        <div class="flex gap-4">
            <a class="bg-blue-500 px-4 py-2 rounded text-white font-medium" href="{{route('login')}}">Iniciar Sesión</a>
            <p class="text-2xl">¡Hola <span class="text-blue-500">mundo!</span></p>
        </div>
    </header>

    <div class="w-full py-40 flex flex-col gap-6 justify-center items-center">
        <h1 class="text-5xl">¡Hola <span class="text-blue-500">mundo!</span></h1>
        <p class="text-2xl">Bienvenido a esta prueba de login utilizando laravel y php</p>
    </div>

    <footer
        class="bg-blue-300 py-10 flex flex-col justify-center items-center text-white font-semibold bottom-0 absolute w-full">
        <p>Made by Eduardo Ramírez Galindo</p>
        <p id="reloj"></p>
    </footer>

    <script>
        function updateClock() {
            const now = new Date();
            const formatted = now.toLocaleDateString('es-ES') + ' ' + now.toLocaleTimeString('es-ES');
            document.getElementById('reloj').innerText = `La fecha y hora actual es: ${formatted}`;
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
</body>

</html>