<div id="iLeftmenu" class="col-md-3 col-sm-3 col-3 d-none d-sm-block p-0 pr-2 mt-2 text-light">
    <x-card :noBody="true">
        <x-card-header tag="h5" class="bg-primary py-2 text-uppercase">{{__('common.sidebar.service')}}</x-card-header>
        {!! $categoriesMenus !!}
    </x-card>
    @include('home::partial.support')
    @include('home::partial.counter')
</div>
