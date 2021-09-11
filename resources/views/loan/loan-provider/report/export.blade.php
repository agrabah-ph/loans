<table>
    <thead>
        <tr>
            <th>Photo</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $datum)
    <tr>
        <td><img src="images/landing/featured-1.jpg" alt="" width="100"></td>
        <td>{{$datum['name']}}</td>
    </tr>
    @endforeach
    </tbody>
</table>