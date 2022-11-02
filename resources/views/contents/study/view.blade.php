@extends('layouts.default')

@section('content')
    <section class="h-full gradient-form md:h-screen">
        <div class="container py-4 px-6">
            <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
                <div class="xl:w-10/12">
                    <div class="block bg-white shadow-lg rounded-lg">
                        <div class="md:p-12">
                            <div class="text-center">
                                <h4 class="text-xl font-bold mt-1 mb-4 pb-1">{{ $study->study_title }}</h4>
                                <div class="flex-col mb-12 md:flex-row text-center">
                                    <span class="text-sm mt-1 pb-1 mr-2 ml-2"><span class="font-semibold">작성자: </span>{{ $study->userName }}</span>
                                    <span class="text-sm mt-1 pb-1 mr-2 ml-2"><span class="font-semibold">작성일: </span>{{ $study->created_at }}</span>
                                    <span class="text-sm mt-1 pb-1 mr-2 ml-2"><span class="font-semibold">마지막 수정일: </span>{{ $study->updated_at }}</span>
                                </div>
                            </div>
                            <div class="mb-12">
                                {{ $study->study_content }}
                            </div>

                            <div class="control text-right">
                                <a href="{{ route('studyList') }}">
                                    <button>목록으로</button>
                                </a>
                                @if ($study->study_writer == Session::get('userpid'))
                                    <button>수정</button>
                                @endif
                            </div>
                        </div>
                       
                        <div>
                            <form role="form" method="post" action="{{ route('studyWrite')}}">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop