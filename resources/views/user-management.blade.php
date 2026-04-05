<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
   @extends('layouts.app')


@section('content')
    <h1 >User Management</h1>
    <p>ini adalah halaman user management</p>


    <table border="1" cellpadding="10" style="margin: 0 auto;">
        <tr style="background-color: #0000ff;">
            <th>ID</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Kelas</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->npm }}</td>
                <td>{{ $user->nama_kelas }}</td>
            </tr>
        @endforeach
    </table>
@endsection
