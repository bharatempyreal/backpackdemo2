@php
    $field['prefix'] = $field['prefix'] ?? '';
    $field['disk'] = $field['disk'] ?? null;
    $value = old(square_brackets_to_dots($field['name'])) ?? $field['value'] ?? $field['default'] ?? '';
@endphp
{{-- {{dd( $field['value'] )}} --}}
@include('crud::fields.inc.wrapper_start')

<div class="mb-3">
    <label for="formFileSm" class="form-label">{{ $field['label'] }}</label>
    {{-- @if($field['value'] != null){ --}}
    {{-- storage_path('/app/public/image/'{{ $field['value'] }} --}}
        <img src="{{ $field['value'] }}" width="100px" height="100"> 
    {{-- } --}}
    <input class="form-control form-control-sm" id="file" name="{{ $field['name'] }}" type="file">
    {{-- <input class="form-control form-control-sm" id="file" name="file_id" type="hidden"> --}}
</div>

@include('crud::fields.inc.wrapper_end')

