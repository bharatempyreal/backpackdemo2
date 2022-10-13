<div>
    {{-- @foreach($attributegroup_name as $name)
        $groupname  = $name->name;
        {{dd($name->name)}}
    @endforeach --}}
    {{-- {{dd($attribute->attributegroup_id)}} --}}
    
    <h4>Group: {{$groupname}}</h4>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Attribute Name</th>
            <th scope="col">Attribute Value</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($entry as $data )
            {{-- {{ dd($data->attribute)}} --}}
                <tr>
                    <td>{{ $data->name }}</td>
                    @if ($data->attribute->category_type == 6)
                        <td><img src="{{asset_storage() . $data->value}}" style="height: 50px"/></td>
                    @elseif ($data->attribute->category_type == 3)
                        <td>
                            @foreach (json_decode($data->value) as $value)
                            <img src="{{asset_storage() . $value}}" style="height: 50px"/>
                            @endforeach
                        </td>
                    @else
                        <td>{{ $data->value }}</td>
                    @endif
                </tr>
            @endforeach

        </tbody>

    </table>
</div>
