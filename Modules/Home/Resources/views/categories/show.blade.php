@extends('home::layouts.master')

@section('content')
<main id="main">
    <x-section-box id="about" class="about" :title="$data['post_title']">
        {!! $data['post_content'] !!}
    </x-section-box>
</main>
@endsection
