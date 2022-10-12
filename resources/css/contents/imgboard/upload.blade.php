@extends('layouts.action')

@section('content')
<div class="w-full my-1.5">
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
            Title
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Image board title">
    </div>
    <div class="mb-2">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="image_section">
            Image Upload
        </label>
        <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="imgInput" type="file" name="images[]" multiple />

        <img id="image_section" src="#" alt="your image"/>
    </div>
    <div class="mb-4 flex justify-center items-center">
        <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
            Upload!
        </button>
    </div>
</div>
<script>
    // 이벤트를 바인딩해서 input에 파일이 올라올때 (input에 change를 트리거할때) 위의 함수를 this context로 실행합니다.
$("#imgInput").change(function(){
    readURL(this);
});
</script>
@stop