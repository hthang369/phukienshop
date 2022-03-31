{!! Modal::start($data['modal']) !!}
    {!! $data['form'] !!}
{!! Modal::end() !!}

<script>
$(document).ready(function() {
    $('#list_category').multipleSelect({
        selectAll: false,
        keepOpen: false,
        isOpen: false,
        placeholder: '-- Chọn chuyên mục --'
    });
});
</script>
