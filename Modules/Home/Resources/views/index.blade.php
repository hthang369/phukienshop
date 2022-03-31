@extends('home::layouts.master')

@section('content')
<section id="hero1">

  <x-carousel :items="$data['slides']" :indicators="true" :control="true" id="heroCarousel" class="mb-3" />

  <div class="container">
      {{-- <x-portfolio :items="$products" /> --}}
    <x-card header="Sản phẩm khuyến mãi" class="my-5">
        <x-portfolio-products :items="$data['products']"></x-portfolio-products>
    </x-card>

    <x-card header="Điện thoại nổi bật" class="my-4">
    </x-card>

    <x-card header="Laptop nổi bật" class="my-4">
    </x-card>

    <x-card header="Phụ kiện nổi bật" class="my-4">
    </x-card>

    <x-card header="Tin tức nổi bật" class="my-5">
    </x-card>
  </div>
</section>
@endsection
