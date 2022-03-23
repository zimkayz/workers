<table>
    <thead>
        <th>Phone Number</th>
<th>Date Registration</th>
<th>Profession</th>
    </thead>
    <tbody>
        @foreach ($users as $user)
<td>{{ $user->email }}</td>
<td>{{ $user->phone }}</td>
<td><a href="/admin/{{ $user->id }}/userview" type="button" class="badge bg-success">View</a></td>
@endforeach
    </tbody>
</table>





