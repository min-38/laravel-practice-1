@extends('layouts.default')

@section('content')
    <section class="h-full gradient-form md:h-screen">
        <div class="container py-12 px-6">
            <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
                <div class="xl:w-10/12">
                    <div class="block bg-white shadow-lg rounded-lg">
                        <div class="md:p-12 md:mx-6">
                            <div class="text-center">
                                <h4 class="text-xl font-semibold mt-1 mb-12 pb-1">회원가입</h4>
                            </div>
                            <form role="form" method="post" action="{{ route('SignUpProcess')}}">
                                {{ csrf_field() }}
                                <div class="mb-4">
                                    <label for="username">닉네임 <span class="text-red-600">*</span></label>
                                    <input
                                        type="text"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        id="username"
                                        name="username"
                                        placeholder="사용하실 닉네임을 입력하세요"
                                    />
                                </div>
                                <div class="mb-4">
                                    <label for="userid">아이디 <span class="text-red-600">*</span></label>
                                    <input
                                        type="text"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        id="userid"
                                        name="userid"
                                        placeholder="사용하실 아이디를 입력하세요"
                                    />
                                </div>
                                <div class="mb-4">
                                    <label for="useremail">이메일 <span class="text-red-600">*</span></label>
                                    <input
                                        type="text"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        id="useremail"
                                        name="useremail"
                                        placeholder="example@example.com"
                                    />
                                </div>
                                <div class="mb-4">
                                    <label for="password">패스워드 <span class="text-red-600">*</span></label>
                                    <input
                                        type="password"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        id="password"
                                        name="password"
                                        placeholder="문자, 숫자, 특수문자 포함 8자 이상"
                                    />
                                </div>
                                <div class="mb-4">
                                    <label for="userphone">전화번호</label>
                                    <input
                                        type="text"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        id="userphone"
                                        name="userphone"
                                        placeholder="010-xxxx-xxxx"
                                    />
                                </div>
                                <div class="text-center pt-1 mb-12 pb-1">
                                    <button
                                        class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3 bg-blue-800"
                                        data-mdb-ripple="true"
                                        data-mdb-ripple-color="light"
                                    >
                                        Sign Up!
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop