@extends('layouts.default')

@section('content')
    <section class="h-full gradient-form md:h-screen">
        <div class="container py-12 px-6">
            <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
                <div class="xl:w-10/12">
                    <div class="block bg-white shadow-lg rounded-lg">
                        <div class="md:p-12 md:mx-6">
                            <div class="text-center">
                                <h4 class="text-xl font-semibold mt-1 mb-12 pb-1">게시글 작성</h4>
                            </div>
                            <form role="form" method="post" action="{{ route('studyWrite')}}">
                                {{ csrf_field() }}
                                <div class="mb-4">
                                    <label for="studyTitle">제목 <span class="text-red-600">*</span></label>
                                    <input
                                        type="text"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        id="title"
                                        name="studyTitle"
                                        placeholder="제목을 입력해주세요"
                                        value="{{ old('studyTitle') }}"
                                    />
                                </div>
                                <div class="mb-4">
                                    <label for="userid">본문 <span class="text-red-600">*</span></label>
                                    <div>
                                        <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            name="studyContent" id="" cols="30" rows="10" placeholder="본문을 작성해주세요">{{ old('studyContent') }}</textarea>
                                    </div>
                                </div>
                                <div class="mb-4 inline-grid">
                                    <label for="priChkBox">비밀글 </label>
                                    <input
                                        type="checkbox"
                                        class="form-control block inline"
                                        id="priChkBox"
                                        name="private"
                                    />
                                </div>
                                <div class="text-center pt-1 mb-12 pb-1">
                                    <button
                                        class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3 bg-blue-800"
                                        data-mdb-ripple="true"
                                        data-mdb-ripple-color="light"
                                    >
                                        등록
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

