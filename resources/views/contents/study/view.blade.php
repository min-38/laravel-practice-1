@extends('layouts.default')

@section('content')
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
        @if ($study->study_writer == Session::get('userpid'))
            <a href="{{ route('studyWrite', ['id' => $study->study_id]) }}">
                <button class="bg-green-500 hover:bg-green-700 text-white
                    font-bold py-2 px-4 rounded">수정</button>
            </a>
        @endif
        <a href="{{ route('studyList') }}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white
                font-bold py-2 px-4 rounded">목록으로</button>
        </a>
    </div>
            
    <div>
        <form role="form" method="post" action="{{ route('studyWrite')}}">
            {{ csrf_field() }}
        </form>
    </div>
@stop