<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

  <title>{{ $title ?? 'Simple Cat' }}</title>
  <link rel="icon" href="{{ asset('img/Logo-Simple-Cat.svg') }}" type="image/x-icon">
  @vite('resources/css/app.css')
  
  @livewireStyles
</head>

<body class="bg-slate-200 dark:bg-slate-700">
  
  {{-- <main class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto"> --}}
  <main data-scroll-container>
    @livewire('partials.navbar')
    @livewire('partials.cart')
    {{ $slot }}
    @livewire('partials.newsletter')
    @livewire('partials.footer')
  </main>
  @livewireScripts
  <script src="https://kit.fontawesome.com/0f25473561.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  @vite('resources/js/swiper.js')
  @vite('resources/js/app.js')
</body>

</html>