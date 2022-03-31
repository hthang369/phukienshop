@extends('home::layouts.master')

@section('content')
<main id="main">
    <x-section-box id="category" class="category" title="">
        <p class="">Thương hiệu hàng đầu</p>
        @foreach ($data['results']->brands as $brand)
            <span class="btn border">{{$brand->brand_name}}</span>
        @endforeach
        @foreach ($data['results']->children as $category)
            <x-card :header="$category->category_name" class="my-5">
                <x-portfolio-products :items="$category->product_list"></x-portfolio-products>
            </x-card>
        @endforeach
    </x-section-box>
</main>
@endsection
