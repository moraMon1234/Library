<!doctype html>
<html lang="en">
<head>
    <title>Library</title>
    @include('layout.head')
</head>
<body id="page" class="d-flex flex-column min-vh-100 text-light bg-black">

    <div class="container-scroller d-flex flex-column flex-grow-1 ">
        @include('layout.header')
        <div class="d-flex">
            <aside>
                @include('layout.sidebar')    
            </aside>
            <div class="container-fluid page-body-wrapper flex-grow-1">
                <main class="p-5 m-5 bg-black">
                    @yield('pages')
                </main>
            </div>
        </div>
    </div>
    <footer class="footer bg-dark text-center p-2 w-100">
        @include('layout.footer')    
    </footer>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/javascript.js') }}"></script>
    <script src="{{ asset('js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/misc.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>




</body>
</html>
