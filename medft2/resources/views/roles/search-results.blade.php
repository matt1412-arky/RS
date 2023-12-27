<!-- resources/views/roles/search-results.blade.php -->

<h2>Search Results</h2>
<table class="table table-dark">
    <thead>
        <tr>
            <th>NAMA</th>
            <th>KODE</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $data)
            <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->code }}</td>
                <td>
                    <button class="btn btn-warning" onclick="edit('{{ $data->id }}')">Ubah</button>
                    &nbsp;
                    <button class="btn btn-danger" onclick="hapus('{{ $data->id }}')">Hapus</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
