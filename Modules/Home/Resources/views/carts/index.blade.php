@extends('home::layouts.master')

@section('content')
<section id="cart-detail">
    <div class="container">
        <x-row class="justify-content-center">
            <x-col size="8">
                <x-card :noBody="true" id="cart-info">
                    <x-card-header tag="div" class="d-flex justify-content-between">
                        <span>@icon('fa fa-angle-left') Trở về</span>
                        <span class="flex-fill text-center">Giỏ hàng</span>
                    </x-card-header>
                    <div class="card-body">
                    @forelse ($data as $rowId => $item)
                        <x-media :image="['src' => vnn_asset(data_get($item, 'options.image')), 'width' => 180, 'class' => 'p-2 mr-1']"
                            text="{{$item['name']}}">
                            <button type="button" class="close" data-rowid="{{$rowId}}" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="media-meta">
                                <span>{{ format_currency(data_get($item, 'price')) }}</span>
                                <div class="">
                                    <span>Số lượng:</span>
                                    <x-number data-rowid="{{$rowId}}" class="input-qty" name="qty" min="1" max="3" value="{{data_get($item, 'qty')}}"></x-number>
                                </div>
                            </div>
                        </x-media>
                    @empty
                        <div class="text-center">
                            <img src="{{vnn_asset('empty_cart.png')}}" />
                            <div>{{ __('common.cart.empty') }}</div>
                            <div class="mt-2">{!! bt_link_to_route('home', 'Quay lại trang chủ', 'danger') !!}</div>
                        </div>
                    @endforelse
                    </div>
                    @if (count($data) > 0)
                    <x-card-footer class="d-flex justify-content-between">
                        <span>Tổng tiền tạm tính:</span>
                        <span>{{format_currency(Cart::totalFloat())}}</span>
                    </x-card-footer>
                    @endif
                </x-card>
            </x-col>
        </x-row>
    </div>
</section>
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    $('button.close').click(function() {
        let data = JSON.stringify({'rowId': $(this).data('rowid')});
        $api.put('{{route("cart.delete")}}', data, {
            'pjaxContainer': '#cart-info'
        });
    });
    $('.input-qty button').click(function() {
        let data = JSON.stringify({'rowId': $(this).parent().data('rowid'), 'qty': $(this).parent().find('input').val()});
        $api.put('{{route("cart.update")}}', data, {
            'pjaxContainer': '#cart-info'
        });
    });
});
</script>
@endpush
