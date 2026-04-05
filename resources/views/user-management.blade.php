@extends('layouts.app')

@section('content')
<h1>User Management</h1>
<p>ini adalah halaman user management</p>

<a class="btn btn-primary" href="{{ route('user-management.create') }}">Tambah User</a>

<table border="1" cellpadding="10" style="margin: 0 auto;">
    <thead>
        <tr style="background-color: #b30a1bff; color:white;">
            <th>ID</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->npm }}</td>
            <td>{{ $user->nama_kelas }}</td>
            <td>
            <button 
    class="btn btn-primary btn-edit"
    data-id="{{ $user->id }}"
    data-name="{{ $user->name }}"
    data-npm="{{ $user->npm }}"
    data-kelas="{{ $user->kelas_id }}"
    data-bs-toggle="modal"
    data-bs-target="#editModal">
    Edit
</button>
                <form action="{{ route('user-management.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="modal fade" id="editModal" tabindex="-1">
  <div class="modal-dialog">
    <form method="POST" id="editForm">
        @csrf
        @method('PUT')

        <div class="modal-content">
            <div class="modal-header">
                <h5>Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <input type="text" name="name" id="edit_name" class="form-control mb-2">
                <input type="text" name="npm" id="edit_npm" class="form-control mb-2">

                <select name="kelas_id" id="edit_kelas" class="form-control">
                    @foreach($users as $u)
                        <option value="{{ $u->kelas_id }}">{{ $u->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </form>
  </div>
</div>
<script>
document.querySelectorAll('.btn-edit').forEach(button => {
    button.addEventListener('click', function () {
        let id = this.dataset.id;
        let name = this.dataset.name;
        let npm = this.dataset.npm;
        let kelas = this.dataset.kelas;

        document.getElementById('edit_name').value = name;
        document.getElementById('edit_npm').value = npm;
        document.getElementById('edit_kelas').value = kelas;

        document.getElementById('editForm').action = `/user-management/update/${id}`;
    });
});
</script>
@endsection