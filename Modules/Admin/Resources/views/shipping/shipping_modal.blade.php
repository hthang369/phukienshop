{!! Modal::start($data['modal']) !!}
    {!! $data['form'] !!}
{!! Modal::end() !!}
<script>
function chooseOption(url, data, target) {
    $api.post(url, data, {
        contentType: 'application/json',
        beforeSend: function() {
            $(target).attr('disabled', 'disabled');
        },
        onSuccess: function(data) {
            $(target).empty();
            $(target).removeAttr('disabled');
            $.each(data.data, function(idx, item) {
                let selected = item.selected ? 'selected' : '';
                $(target).append('<option value="'+item.id+'" '+selected+'>'+item.name+'</option>');
            });
        }
    })
}
$(document).ready(function() {
    $('#province_id').change(function() {
        chooseOption('{{route("district.choose-district")}}', JSON.stringify({"id": $(this).val()}), '#district_id')
    });

    $('#district_id').change(function() {
        chooseOption('{{route("ward.choose-ward")}}', JSON.stringify({"id": $(this).val()}), '#ward_id')
    });
});
</script>
