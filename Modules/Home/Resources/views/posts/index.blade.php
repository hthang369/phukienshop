@extends('home::layouts.master')

@section('content')
@if (count($data) > 0)
<x-card-header>
    {!! $data['post_title'] !!}
</x-card-header>
<div class="card-body">
    {!! $data['post_content'] !!}
</div>
@else
<div class="card-body">
    Chưa có bài viết nào
</div>
@endif
@endsection
