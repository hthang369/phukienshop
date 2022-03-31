@extends('home::layouts.master')

@section('content')
<section id="product-detail">
  <div class="container">
    <x-row>
        <x-col size="12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">aaa</li>
            </ul>
        </x-col>
        <x-col size="12">
            <h5 class="page-title">{{$data['product']->product_title}}</h5>
        </x-col>
    </x-row>
    <x-row>
        <x-col>
            <div class="card">

                <!-- Badge -->
                <div class="badge badge-primary card-badge text-uppercase">
                  Sale
                </div>

                <!-- Slider -->
                <div class="mb-4" data-flickity='{"draggable": false, "fade": true}' id="productSlider">
                <!-- Item -->
                @foreach ($data['product']->pro_images() as $image)
                    <a href="{{vnn_asset($image)}}" data-fancybox>
                        <img src="{{vnn_asset($image)}}" alt="{{$image}}" class="card-img-top">
                    </a>
                @endforeach
                </div>

            </div>

              <!-- Slider -->
            <div class="flickity-nav mx-n2 mb-10 mb-md-0" data-flickity='{"asNavFor": "#productSlider", "contain": true, "wrapAround": false}'>

                <!-- Item -->
                <div class="col-12 px-2" style="max-width: 113px;">

                    <!-- Image -->
                    <div class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(assets/img/products/product-7.jpg);"></div>

                </div>

                <!-- Item -->
                <div class="col-12 px-2" style="max-width: 113px;">

                    <!-- Image -->
                    <div class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(assets/img/products/product-122.jpg);"></div>

                </div>

                <!-- Item -->
                <div class="col-12 px-2" style="max-width: 113px;">

                    <!-- Image -->
                    <div class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(assets/img/products/product-146.jpg);"></div>

                </div>

            </div>
        </x-col>
        <x-col>
            <div class="mb-7">
                <span class="font-size-lg font-weight-bold text-gray-350 text-decoration-line-through">{{format_currency($data['product']->product_price)}}</span>
                <span class="ml-1 font-size-h5 font-weight-bolder text-primary">{{format_currency($data['product']->promotion_price)}}</span>
                <span class="font-size-sm ml-1">(In Stock)</span>
            </div>
            <div class="">
                <x-form route="cart.add" method="POST">
                    <input type="hidden" name="product_id" value="{{$data['product']->id}}" />
                    <x-button type="submit" text="Mua ngay" size="lg" variant="danger"></x-button>
                </x-form>
            </div>
        </x-col>
    </x-row>
    <x-row>
        <x-col>
            <div class="card">
                <div class="card-header">San pham tuong tu</div>
                <div class="card-body">
                    <div class="card-deck">
                        @foreach ($data['similarProduct'] as $item)
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">{{$item->product_title}}</h5>
                              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </x-col>
    </x-row>
    <x-row>
        <x-col>
            <div class="card">
                <div class="card-header">Danh giá</div>
                <div class="card-body">
                    <div class="media">
                        <img src="..." class="mr-3" alt="...">
                        <div class="media-body">
                          <h5 class="mt-0">Media heading</h5>
                          <p>Standing on the frontline when the bombs start to fall. Heaven is jealous of our love, angels are crying from up above. Can't replace you with a million rings. Boy, when you're with me I'll give you a taste. There’s no going back. Before you met me I was alright but things were kinda heavy. Heavy is the head that wears the crown.</p>

                          <div class="media mt-3">
                            <a class="mr-3" href="#">
                              <img src="..." alt="...">
                            </a>
                            <div class="media-body">
                              <h5 class="mt-0">Media heading</h5>
                              <p>Greetings loved ones let's take a journey. Yes, we make angels cry, raining down on earth from up above. Give you something good to celebrate. I used to bite my tongue and hold my breath. I'm ma get your heart racing in my skin-tight jeans. As I march alone to a different beat. Summer after high school when we first met. You're so hypnotizing, could you be the devil? Could you be an angel? It's time to bring out the big balloons. Thought that I was the exception. Bikinis, zucchinis, Martinis, no weenies.</p>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>

        </x-col>
    </x-row>
  </div>
</section>
@endsection

@push('styles')
<link href="{{ asset('/css/flickity.min.css') }}" rel="stylesheet">
<link href="{{ asset('/source/jquery.fancybox.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('js/flickity.pkgd.min.js') }}"></script>
<script src="{{ asset('source/jquery.fancybox.js') }}"></script>
@endpush
