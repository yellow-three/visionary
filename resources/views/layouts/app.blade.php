<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gözlük Satış Sitesi</title>

    <!-- Styles -->
    @vite(['resources/assets/js/app.js'])
</head>
<body>

{{--<x-visionary::navbar></x-visionary::navbar>--}}

{{ $slot }}

</body>
</html>
