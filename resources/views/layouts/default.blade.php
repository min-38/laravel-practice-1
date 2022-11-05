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
        <div class="container mx-auto my-3 px-4">
            <div id="main" class="row col-span-3">
                <section class="h-full gradient-form md:h-screen">
                    <div class="container py-4 px-6">
                        <div class="justify-center items-center flex-wrap h-full g-6 text-gray-800">
                            <div class="block bg-white shadow-lg rounded-lg">
                                <div class="md:p-12">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        {{-- <footer class="row">
            @include('includes.footer')
        </footer> --}}
    </div>
</body>
</html>