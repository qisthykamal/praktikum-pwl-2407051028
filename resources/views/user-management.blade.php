<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h1>User Management</h1>
    <p> ini adalah halaman user management</p>
    <table border="1" >
        <tr>
            <th>Nama</th>
            <th>NPM</th>
            <th>Jurusan</th>
            <th>Prodi</th>
        </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user['nama'] }}</td>
            <td>{{ $user['npm'] }}</td>
            <td>{{ $user['jurusan'] }}</td>
            <td>{{ $user['prodi'] }}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>