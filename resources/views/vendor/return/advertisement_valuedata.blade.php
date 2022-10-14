<div>
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
            @foreach ($value as $val )
                @foreach ($val->advertisement_data as $v)
                    @if($v->advertisement_id == $adid)
                        <tr>
                            <td>{{ $v->name }}</td>
                            @if ($val->category_type == 6)
                            <td><img src="{{asset_storage() . $v->value}}" style="height: 50px"/></td>
                            @elseif ($val->category_type == 3)
                            <td>
                                @foreach (json_decode($v->value) as $value)
                                <img src="{{asset_storage() . $value}}" style="height: 50px"/>
                                @endforeach
                            </td>
                            @else
                            <td>{{ $v->value }}</td>
                            @endif
                        </tr>
                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table>
@endforeach

</div>
