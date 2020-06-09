@extends('layouts.app')

@section('content')
    <baking-oven :default-waffle="{{ $waffle }}"></baking-oven>
@endsection
