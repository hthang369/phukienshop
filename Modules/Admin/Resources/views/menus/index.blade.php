@extends('admin::layouts.master')

@section('content')
{!! $grid !!}
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#menu_type').change(function(e) {
            location.href = "{{route('menus.index')}}/" + $(this).val();
        });
        $(document).on('change', '#tablist', function(e) {
            $('.tab-pane').removeClass('show active')
            $('#link_'+$(this).val()).addClass('show active')
        });
    });
</script>
@endpush
