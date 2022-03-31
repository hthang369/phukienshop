{!! Modal::start($data['modal']) !!}
    {!! $data['form'] !!}
{!! Modal::end() !!}
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script> CKEDITOR.replace('product_content'); </script>
@include('ckfinder::setup')
<script>
$(document).ready(function() {
    $('#list_category').multipleSelect({
        selectAll: false,
        keepOpen: false,
        isOpen: false,
        placeholder: '-- Chọn chuyên mục --'
    });
    $('#list_promotion').multipleSelect({
        selectAll: false,
        keepOpen: false,
        isOpen: false,
        placeholder: '-- Chọn khuyến mãi --'
    });
});
</script>
