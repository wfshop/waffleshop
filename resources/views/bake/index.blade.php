@extends('layouts.app')

@section('content')
    <div class="flex flex-column relative" style="height: calc(100vh - 6.44rem);">
        <div class="flex" style="height: 40%;">
            <div class="flex-1 bg-indigo-200">HTML</div>
            <div class="flex-1 bg-pink-200">CSS</div>
            <div class="flex-1 bg-green-200">JS</div>
        </div>
        <div class="flex-1 bg-gray-200">
            Preview
        </div>
    </div>
@endsection
