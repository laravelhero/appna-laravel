<html>
    <head>
        <title>{{ $title ?? 'APPNA South Texas Chapter' }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png')}}">
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body>
        <section>
           @include('partials/header')
        </section>
        <section>
            {{ $slot }}
        </section>
        <section>
            @include('partials/footer')
        </section>
    </body>
</html>