@if (isset($widget['content']))
@push('after_styles')
<link href="{{ asset($widget['content']) }}" rel="stylesheet" type="text/css" />
@endpush
@endif
