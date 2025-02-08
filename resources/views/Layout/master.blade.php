<!doctype html>
<html lang="en">
    <head>
        <title>Library</title>
        @include('layout.head')
    </head>

    <body id="page" class="d-flex flex-column min-vh-100">
        <header>
            @include('layout.header')    
        </header>
        <main> @yield('pages') </main>
        <footer class=" w-100">
        @include('layout.footer')    
        </footer>

        <script src="{{ asset('script/bootstrap.js') }}"></script>
        <script src="{{ asset('script/javascript.js') }}"></script>

    </body>
</html>
