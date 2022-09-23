<label>{!! $field['label'] !!}</label>

@foreach ($field['options'] as $key => $option)
    <div class="col-sm-{{ isset($field['number_of_columns']) ? intval(12/$field['number_of_columns']) : '4'}}">
        <div class="checkbox">
            <label class="font-weight-normal">
            <input type="checkbox" value="{{ $key }}"> {{ $option }}
            </label>
        </div>
    </div>
@endforeach
