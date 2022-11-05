@extends('layouts.default')

@section('content')         
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
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 w-10">
                        번호
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 w-96">
                        게시글 제목
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 w-10">
                        작성자
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 w-10">
                        작성 시간
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 w-10">
                        조회수
                    </th>
                </tr>
            </thead class="border-b">
            <tbody>
                @foreach($studies as $key => $study)
                <tr class="bg-white border-b">
                    <td class="text-sm text-gray-90 px-6 py-4 font-medium whitespace-nowrap">
                        {{ $studies->total() - $studies->firstItem() - $key + 1}}
                    </td>
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
    <div class="">
        {{ $studies->onEachSide(5)->links() }}
        @if ( Session::get('userpid') != null && Session::get('userpid') < 2)
            {{ Session::get('userpid') }}
            <div class="control text-right">
                <a href="{{ route('studyWrite') }}">
                    <button class="bg-green-500 hover:bg-green-700 text-white
                        font-bold py-2 px-4 rounded">글 작성</button>
                </a>
            </div>
        @endif
    </div>
@stop