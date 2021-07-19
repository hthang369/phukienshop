@extends('components.system-admin.detail')

@section('body_content')
    {!! Form::open(['route' => "{$sectionCode}.store", 'method' => 'POST']) !!}
        @yield('form_content')

        <div class="form-row">
        {!! Form::submit(__('custom_label.save'), ['class' => 'btn btn-primary btn-sm']) !!}
        {!! Form::button(__('custom_label.back'), ['class' => 'btn btn-danger btn-sm ml-2', 'onclick' => "history.back()"]) !!}
        </div>
    {!! Form::close() !!}
@endsection
