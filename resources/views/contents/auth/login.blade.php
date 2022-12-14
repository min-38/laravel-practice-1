@extends('layouts.default')

@section('content')
    <div class="flex flex-row justify-center items-center">
        <div class="w-96">
            <div class="text-center">
                <h4 class="text-xl font-semibold mt-1 mb-5 pb-1">로그인</h4>
                @if (session('msg'))
                    @if (session('success'))
                        <div class="bg-green-300 mb-5">
                            {{ session('msg') }}
                        </div>
                    @else
                        <div class="bg-red-300 mb-5">
                            {{ session('msg') }}
                        </div>
                    @endif
                @endif
            </div>
            <form role="form" method="post" action="{{ route('loginProcess')}}">
                {{ csrf_field() }}
                <div class="mb-4">
                    <input
                        type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="userid"
                        name="userid"
                        placeholder="ID"
                    />
                </div>
                <div class="mb-4">
                    <input
                        type="password"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="password"
                        name="password"
                        placeholder="Password"
                    />
                </div>
                <div class="text-center pt-1 mb-8 pb-1">
                    <button
                        class="inline-block outline-blue-500 text-blue-800 px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover: hover:bg-gray-100 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
                        {{-- type="button" --}}
                        data-mdb-ripple="true"
                        data-mdb-ripple-color="light"
                    >
                        Log in
                    </button>
                    <a href="/register">
                        <button
                            class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3 bg-blue-800"
                            type="button"
                            data-mdb-ripple="true"
                            data-mdb-ripple-color="light"
                        >
                            Sign Up
                        </button>
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop