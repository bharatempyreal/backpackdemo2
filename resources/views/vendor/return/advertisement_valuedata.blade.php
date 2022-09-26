<div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Attribute Name</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($entry as $data )
                <tr>
                <td>{{ $data->attribute_name }}</td>
            @endforeach 

        </tbody>

    </table>
</div>
