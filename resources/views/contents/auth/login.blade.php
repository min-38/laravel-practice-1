@extends('layouts.default')

@section('content')
    <section class="h-full gradient-form md:h-screen">
        <div class="container py-12 px-6">
            <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
                <div class="xl:w-1/11">
                    <div class="block bg-white shadow-lg rounded-lg">
                        <div class="md:p-12 md:mx-6">
                            <div class="text-center">
                                <h4 class="text-xl font-semibold mt-1 mb-12 pb-1">로그인</h4>
                                {{-- <img src="/imgs/login-lock.svg" alt="" class="mx-auto w-48 h-20"> --}}
                            </div>
                            <form>
                                <div class="mb-4">
                                    <input
                                        type="text"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        id="exampleFormControlInput1"
                                        placeholder="Username"
                                    />
                                </div>
                                <div class="mb-4">
                                    <input
                                        type="password"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        id="exampleFormControlInput1"
                                        placeholder="Password"
                                    />
                                </div>
                                <div class="text-center pt-1 mb-12 pb-1">
                                    <button
                                        class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3 bg-blue-800"
                                        type="button"
                                        data-mdb-ripple="true"
                                        data-mdb-ripple-color="light"
                                    >
                                        Log in
                                    </button>
                                    <a class="text-gray-500" href="#!"></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop