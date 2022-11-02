@extends('layouts.default')

@section('content')
    <section class="h-full gradient-form md:h-screen">
        <div class="container py-12 px-6">
            <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
                <div class="xl:w-10/12">
                    <div class="block bg-white shadow-lg rounded-lg">
                        <div class="md:p-12">
                            <div class="text-center">
                                <h4 class="text-xl font-semibold mt-1 mb-12 pb-1">공부</h4>
                            </div>
                            <form role="form" method="post" action="{{ route('studyWrite')}}">
                                {{ csrf_field() }}
                            </form>
                                
                            <div class="mb-4">
                                <table class="min-w-full text-center">
                                    <thead class="border-b bg-gray-50">
                                        <tr>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                                번호
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                                게시글 제목
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                                작성자
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                                작성 시간
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                                조회수
                                            </th>
                                        </tr>
                                    </thead class="border-b">
                                    <tbody>
                                        @foreach($studies as $study)
                                        <tr class="bg-white border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">번호</td>
                                            <td class="text-sm text-gray-900 px-6 py-4 whitespace-nowrap">
                                                <a href="{{ route('studyView', $study->study_id) }}">{{ $study->study_title }}</a>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $study->userName }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $study->created_at }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                
                                            </td>
                                        </tr class="bg-white border-b">
                                        @endforeach 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop