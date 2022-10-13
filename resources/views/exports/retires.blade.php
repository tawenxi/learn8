<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($Retires as $retire)
        <tr>
            <td>{{ $retire->certificateid }}</td>
            <td>{{ $retire->personname }}</td>
        </tr>
    @endforeach
    </tbody>
</table>