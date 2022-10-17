{{-- REPEATABLE FIELD TYPE --}}
{{-- {{dd($field['fields'])}} --}}
@php
  $field['value'] = old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' ));
  // make sure the value is a JSON string (not array, if it's cast in the model)
  $field['value'] = is_array($field['value']) ? json_encode($field['value']) : $field['value'];

  $field['init_rows'] = $field['init_rows'] ?? $field['min_rows'] ?? 1;
  $field['max_rows'] = $field['max_rows'] ?? 0;
  $field['min_rows'] =  $field['min_rows'] ?? 0;
@endphp

@include('crud::fields.inc.wrapper_start')
  <label>{!! $field['label'] !!}</label>
  @include('crud::fields.inc.translatable_icon')
  {{-- <input
      type="hidden"
      name="{{ $field['name'] }}"
      data-init-function="bpFieldInitRepeatableElement"
      value="{{ $field['value'] }}"
      @include('crud::fields.inc.attributes')
  > --}}

  {{-- HINT --}}
  {{-- @if (isset($field['hint']))
      <p class="help-block text-muted text-sm">{!! $field['hint'] !!}</p>
  @endif --}}



<div class="container-repeatable-elements">
    {{-- <div
        data-repeatable-holder="{{ $field['name'] }}"
        data-init-rows="{{ $field['init_rows'] }}"
        data-max-rows="{{ $field['max_rows'] }}"
        data-min-rows="{{ $field['min_rows'] }}"
    ></div> --}}

    {{-- @push('before_scripts') --}}
    {{-- <div class="col-md-12 well repeatable-element row m-1 p-2" data-repeatable-identifier="{{ $field['name'] }}"> --}}
      @if (isset($field['fields']) && is_array($field['fields']) && count($field['fields']))
        @foreach($field['fields'] as $subfield)
        {{-- {{dd($subfield)}} --}}
          @php
              $subfield = $crud->makeSureFieldHasNecessaryAttributes($subfield);
              $fieldViewNamespace = $subfield['view_namespace'] ?? 'crud::fields';
              $fieldViewPath = $fieldViewNamespace.'.'.$subfield['type'];
            //   dd($fieldViewPath);
          @endphp
          @include($fieldViewPath, ['field' => $subfield])
        @endforeach

      @endif
    {{-- </div> --}}
    {{-- @endpush --}}

  </div>

@include('crud::fields.inc.wrapper_end')
