<div>
 @isset($data)
@foreach ($data as $key=>$value )
    <h4>Group:{{$key}}</h4>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Attribute Name</th>
            <th scope="col">Attribute Value</th>
          </tr>
        </thead>
        <tbody>
            @isset($value)
                @foreach ($value as $val )
                    @isset($val->advertisement_data)
                    @foreach ($val->advertisement_data as $v)
                        @if($v->advertisement_id == $adid)
                            <tr>
                                <td>{{ myisset($v->name) }}</td>
                                @if ($val->category_type == 6)
                                <td><img src="{{asset_storage() . myisset($v->value)}}" style="height: 50px"/></td>
                                @elseif ($val->category_type == 3)
                                <td>
                                    @isset($v->value)
                                        @foreach (json_decode($v->value) as $value)
                                        <img src="{{asset_storage() . myisset($value)}}" style="height: 50px"/>
                                        @endforeach
                                    @endisset
                                </td>
                                @elseif ($val->category_type == 1)
                                <td>{{implode(', ',json_decode($v->value))}}</td>
                                @else
                                <td>{{ $v->value }}</td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                    @endisset
                @endforeach
            @endisset
        </tbody>
    </table>
@endforeach
@endisset


</div>
