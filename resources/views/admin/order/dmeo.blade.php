<table border="1">
    <tr>
        <th>Name</th>
        <td>Email</td>
    </tr>

    @foreach($users as $user)
    <tr>
        <th>{{$user->name}}</th>
        <td>{{$user->email}}</td>
    </tr>
    @endforeach

</table>

