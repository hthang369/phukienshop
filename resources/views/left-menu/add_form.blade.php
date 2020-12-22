@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">@lang('custom_title.left_menu')</h5>
        @if(count($listTopMenu) == 0)
            <div class="alert alert-warning">
                <strong>@lang('custom_message.alert_no_top_menu')</strong>
            </div>
            <a class="my-2 btn btn-primary" href="/system-admin/top-menu/new" role="button">+ @lang('custom_label.add_new') @lang('custom_title.top_menu')</a>
        @else
            <div class="card-body">
                <form method="POST">
                    @csrf
                    <div class="form-group required">
                        <label>@lang('custom_label.name')</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="@lang('custom_label.name')"
                               name="name"
                               value="{{ old('name') }}"
                               autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>@lang('custom_label.top_menu')</label>
                        <select class="form-control @error('top_menu_id') is-invalid @enderror" id="exampleFormControlSelect1" name="top_menu_id"
                                value="{{ old('top_menu_id') }}">
                            @foreach($listTopMenu as $i => $topMenu)
                                <option
                                        value="{{$topMenu->id}}" {{ old('top_menu_id') == $topMenu->id ? 'selected' : '' }}>
                                    {{$topMenu->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('top_menu_id')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>@lang('custom_label.index_menu')</label>
                        <input class="form-control @error('index')
                            is-invalid @enderror" type="text"
                               placeholder="@lang('custom_label.index_menu')" name="index"
                               value="{{ old('index')  }}"
                               autocomplete="index">
                        @error('index')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>@lang('custom_label.url')</label>
                        <input class="form-control @error('url')
                            is-invalid @enderror" type="text"
                               placeholder="@lang('custom_label.url')" name="url"
                               value="{{ old('url')  }}"
                               autocomplete="url">
                        @error('url')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>@lang('custom_label.lang')</label>
                        <input class="form-control @error('lang') is-invalid @enderror" type="text" placeholder="@lang('custom_label.lang')"
                               name="lang"
                               value="{{ old('lang') }}"
                               autocomplete="lang">
                        @error('lang')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('custom_label.save')</button>
                    <a class="btn btn-danger ml-2" href="{{ route('left-menu.list') }}" role="button">@lang('custom_label.cancel')</a>
                </form>
            </div>
        @endif
    </div>
@endsection
