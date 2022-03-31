{!! Modal::start($data['modal']) !!}
    {!! Form::hidden('category_type', ifnull(data_get($data, 'modal.type'), data_get($data, 'modal.model.category_type'))) !!}
    {!! $data['form'] !!}
{!! Modal::end() !!}
