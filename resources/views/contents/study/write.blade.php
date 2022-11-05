@extends('layouts.default')

@section('content')
    <div class="text-center">
        <h4 class="text-xl font-semibold mt-1 mb-12 pb-1">게시글 {{ $action }}</h4>
    </div>
    <form role="form" method="post" action="{{ $actionTo }}">
        @method($method)
        @csrf
        <div class="mb-4">
            <label for="studyTitle">제목 <span class="text-red-600">*</span></label>
            <input
                type="text"
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                id="title"
                name="studyTitle"
                placeholder="제목을 입력해주세요"
                value="{{ old('studyTitle') ?? $study->study_title ?? '' }}"
            />
        </div>
        <div class="mb-4">
            <label for="userid">본문 <span class="text-red-600">*</span></label>
            <div>
                <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    name="studyContent" id="" cols="30" rows="10" placeholder="본문을 작성해주세요">{{ old('studyContent') ?? $study->study_content ?? '' }}</textarea>
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
        @if ($study != null) 
            <input type="hidden" name="id" value={{ $study->study_id }}>
        @endif
        <div class="text-center pt-1 pb-1">
            <button
                class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full bg-blue-800"
                data-mdb-ripple="true"
                data-mdb-ripple-color="light"
            >
                {{ $action }}
            </button>
        </div>
    </form>
    <div class="text-center pt-1 mb-12 pb-1">
        <button
            class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-100 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3 text-blue-800"
            data-mdb-ripple="true"
            data-mdb-ripple-color="light"
        >
            뒤로
        </button>
    </div>
@stop

