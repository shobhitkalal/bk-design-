<!doctype html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('css/bootstrap.css')}}"  rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('exzoom/jquery.exzoom.css') }}"/>
    <link rel="stylesheet" href="https//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>"
       <!-- Scripts -->

    @livewireStyles
</head>
<body>
    <div id="app">
        @include('frontend.navbar',["category"=>App\Models\Category::all(),"designcategory"=>App\Models\DesignCategory::all()])
        <main>
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
        crossorigin="anonymous"></script>
    <script src="{{asset('exzoom/jquery.exzoom.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    @livewireScripts
    @stack('scripts')
    @stack('paypalscript')
    <script>
        window.addEventListener("message",(event)=>{
            alertify.set('notifier','position', 'top-center');
            alertify.notify(event.detail.text, event.detail.type, 7);
           });
</script>
    @livewireScripts
</body>
</html>
