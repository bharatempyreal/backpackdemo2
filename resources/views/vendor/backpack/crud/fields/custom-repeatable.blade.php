{{-- {{dd($field)}} --}}
@include('crud::fields.inc.wrapper_start')
  <label>{!! $field['label'] !!}</label>
  @include('crud::fields.inc.translatable_icon')
  <input
      type="hidden"
      name="{{ $field['name'] }}"
      data-init-function="bpFieldInitRepeatableElement"
      value="{{ $field['value'] }}"
      @include('crud::fields.inc.attributes')
  >

  {{-- HINT --}}
  @if (isset($field['hint']))
      <p class="help-block text-muted text-sm">{!! $field['hint'] !!}</p>
  @endif
