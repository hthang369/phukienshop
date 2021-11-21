@extends('admin::layouts.master')

@section('content')
    {!! $data['grid'] !!}
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('.btn-save').on('click', function(e) {
        e.preventDefault();
        let frm = $('#frmPermissionRole');
        $.ajax({
            method: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serializeObject(),
            success: function success(data) {
                $.pjax.reload({ container: '#frmPermissionRole' });
            },
            error: function error(data) {
                if (typeof toastr !== 'undefined') {
                    toastr.error('An error occurred', 'Whoops!');
                } else {
                    alert('An error occurred');
                }
            }
        });
    });
});
</script>
@endsection
