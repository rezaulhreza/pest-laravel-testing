<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>The New Delhi @yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>

<x-layouts.header/>

<main class="pt-6 px-4">

 @isset($header)
 <nav class="rounded-md w-full">
    <ol class="list-reset flex">
      <li><a href="#" class="text-blue-600 hover:text-blue-700">{{ $header }}</a></li>
      <li><span class="text-gray-500 mx-2">/</span></li>
      @isset($subheader)
      <li class="text-gray-500">{{ $subheader }}</li>
      @endisset
    </ol>
  </nav>


 @endisset
@yield('content')

<x-layouts.footer/>
</main>

</body>
</html>
