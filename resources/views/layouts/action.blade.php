<!doctype html>
<html>
<head>
   @include('includes.head')
   <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('js/my.js') }}"></script>
</head>
<body>
    <div>
        <header class="row">
            @include('includes.header')
        </header>
        <div class="md:container mx-auto px-4 h-screen">
            <div id="main" class="row">
                @yield('content')
            </div>
            {{-- <div>
                @include('includes.side')
            </div> --}}
        </div>
        <footer class="row">
            @include('includes.footer')
        </footer>
    </div>
</body>
</html>