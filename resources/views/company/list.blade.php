@extends('layouts.system-admin')

@section('title', 'Danh sách công ty')

@section('sidebar')
    @parent
@endsection

@section('content')
    <!-- TITLE -->
    <div class="alert alert-primary" role="alert">
        <h1>@lang('custom_title.company')</h1>
    </div>
    <!-- ADD NEW BUTTON-->
    <a class="my-2 btn btn-primary" href="/system-admin/company/new" role="button">+ @lang('custom_label.add_new')</a>

    @if(session()->has('deleted'))
        <div class="alert alert-success">
            <strong>@lang('custom_message.deleted')</strong>
        </div>
    @endif
    <!-- SEARCH FORM -->
    <p>
        <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
           aria-controls="collapseExample">
            <i class="fa fa-chevron-down" aria-hidden="true"></i>
            Open Search form
        </a>
    </p>
    <div id="collapseExample"
         class="{{ request()->has('search') ? 'collapse.show' : 'collapse'  }} mb-4 alert alert-secondary">
        <form method="GET">
            <input type="hidden" name="search" value="true">
            <div class="form-group">
                <label>Name</label>
                <input value="{{ request()->name }}" name="name" class="form-control" placeholder="Find name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input value="{{ request()->email }}" name="email" class="form-control" placeholder="Find email">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input value="{{ request()->phone }}" name="phone" class="form-control" placeholder="Find phone">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input value="{{ request()->address }}" name="address" class="form-control" placeholder="Find address">
            </div>
            <div class="form-group">
                <label>Business plan</label>
                <input value="{{ request('business-plan') }}" name="business-plan" class="form-control"
                       placeholder="Find business plan">
            </div>
            <button type="submit" class="btn btn-success">Search
                <i class="fa fa-search"></i>
            </button>
            <!-- GET ALL BUTTON -->
            <a class="ml-3  my-2 btn  btn-secondary" href="/system-admin/company" role="button">
                <i class="fa fa-list" aria-hidden="true"></i>
                @lang('custom_label.get_all')
            </a>
        </form>
    </div>
    <strong>Total: </strong><label>{{$list->total()}}</label>
    <strong>Page: </strong><label>{{$list->currentPage() . '/' . $list->lastPage()}}</label>
    @if(count($list) == 0)
        <div class="alert alert-warning">
            @lang('custom_message.no_item_found')
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped bg-light">
                <thead>
                <tr>
                    <th scope="col">@lang('custom_label.index')</th>
                    <th scope="col">@lang('custom_label.name')
                        <a class="btn-cta-freequote"
                           href="{{ request()->fullUrlWithQuery(['sort' => 'name', 'direction' => request('sort') == 'name' ? request('direction') == 'desc' ? 'asc' : 'desc' : 'asc']) }}">
                            <i style="{{request()->sort == 'name' ? 'color:blue;' : 'color:gray;'}}"
                               class="fa fa-sort"></i>
                        </a>
                    </th>
                    <th scope="col">@lang('custom_label.email')
                        <a class="btn-cta-freequote" href="{{ request()->fullUrlWithQuery(['sort' => 'email', 'direction' => request('sort') == 'email' ? request('direction') == 'desc' ? 'asc' : 'desc' : 'asc']) }}">
                            <i style="{{request()->sort == 'email' ? 'color:blue;' : 'color:gray;'}}"
                               class="fa fa-sort"></i>
                        </a>
                    </th>
                    <th scope="col">@lang('custom_label.phone')
                        <a class="btn-cta-freequote" href="{{ request()->fullUrlWithQuery(['sort' => 'phone', 'direction' => request('sort') == 'phone' ? request('direction') == 'desc' ? 'asc' : 'desc' : 'asc']) }}">
                            <i style="{{request()->sort == 'phone' ? 'color:blue;' : 'color:gray;'}}"
                               class="fa fa-sort"></i>
                        </a>
                    </th>
                    <th scope="col">@lang('custom_label.address')
                        <a class="btn-cta-freequote" href="{{ request()->fullUrlWithQuery(['sort' => 'address', 'direction' => request('sort') == 'address' ? request('direction') == 'desc' ? 'asc' : 'desc' : 'asc']) }}">
                            <i style="{{request()->sort == 'address' ? 'color:blue;' : 'color:gray;'}}"
                               class="fa fa-sort"></i>
                        </a>
                    </th>
                    <th scope="col">@lang('custom_label.business_plan')
                        <a class="btn-cta-freequote" href="{{ request()->fullUrlWithQuery(['sort' => 'business-plan', 'direction' => request('sort') == 'business-plan' ? request('direction') == 'desc' ? 'asc' : 'desc' : 'asc']) }}">
                            <i style="{{request()->sort == 'business-plan' ? 'color:blue;' : 'color:gray;'}}"
                               class="fa fa-sort"></i>
                        </a>
                    </th>
                    <th scope="col">@lang('custom_label.action') </th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $i => $company)
                    <tr>
                        <th>{{($list->currentPage() - 1) * $list->perPage() + ($i + 1)}}</th>
                        <td>{{$company->name}}</td>
                        <td>{{$company->email}}</td>
                        <td>{{$company->phone}}</td>
                        <td>{{$company->address}}</td>
                        <td>{{$company->business_plan_name}}</td>
                        <td>
                            <a class="btn btn-info" href="/system-admin/company/detail/{{$company->id}}"
                               role="button">@lang('custom_label.detail')</a>
                            <a class="btn btn-primary" href="/system-admin/company/update/{{$company->id}}"
                               role="button">@lang('custom_label.update')</a>
                            <a onclick="return confirm('@lang('custom_message.confirm_delete')');"
                               class="btn btn-danger" href="/system-admin/company/delete/{{$company->id}}"
                               role="button">@lang('custom_label.delete')</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $list->appends(request()->input())->links() }}
    @endif
@endsection

