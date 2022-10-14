<!doctype html>
<html>
<head>
   @include('includes.head')
</head>
<body>
    <div class="bg-gray-200">
        <header class="row">
            @include('includes.header')
        </header>
        <div class="md:container mx-auto my-3 px-4">
            <div id="main" class="row col-span-3">
                @yield('content')
            </div>
        </div>
        {{-- <footer class="row">
            @include('includes.footer')
        </footer> --}}
    </div>
</body>
</html>