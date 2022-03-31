@extends('home::layouts.master')

@section('content')
<div class="card-body">
    {!! $data['post_content'] !!}
</div>
@endsection
