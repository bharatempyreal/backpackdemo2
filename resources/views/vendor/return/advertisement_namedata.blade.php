<div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Advertisement Name</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($entry as $data )
                <tr>
                    <td>{{ $data->name }}</td>
                </tr>
            @endforeach

        </tbody>

    </table>
</div>
