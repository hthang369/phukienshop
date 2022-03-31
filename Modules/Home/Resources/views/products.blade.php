@extends('home::layouts.master')

@section('content')
<main id="main">
    <x-section-box id="product" class="product" :title="$category_name">
        @foreach($data_list as $data)
        <x-card>
            <x-slot name="header">
                {!! link_to(route('page.show-post', $data['category_link']), $data['category_name']) !!}
            </x-slot>
            <x-portfolio :items="$data['post_list']" />
        </x-card>
        @endforeach

    </x-section-box>
</main>
@endsection
