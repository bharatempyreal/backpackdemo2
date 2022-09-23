@if (isset($widget['content']))
    @push('after_scripts')
        <script src="{{ asset($widget['content']) }}"></script>
    @endpush
@endif
