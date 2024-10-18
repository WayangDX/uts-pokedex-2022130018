<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pokemon</title>
</head>
<body>
    <h1>Daftar Pokemon</h1>

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('pokemon.create') }}">Tambah Pokemon Baru</a>
    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tipe Utama</th>
                <th>Berat</th>
                <th>Tinggi</th>
                <th>HP</th>
                <th>Serangan</th>
                <th>Pertahanan</th>
                <th>Legendary</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pokemon as $p)
                <tr>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->species }}</td>
                    <td>{{ $p->primary_type }}</td>
                    <td>{{ $p->weight }}</td>
                    <td>{{ $p->height }}</td>
                    <td>{{ $p->hp }}</td>
                    <td>{{ $p->attack }}</td>
                    <td>{{ $p->defense }}</td>
                    <td>{{ $p->is_legendary ? 'Ya' : 'Tidak' }}</td>
                    <td>
                        <a href="{{ route('pokemon.show', $p->id) }}">Lihat</a>
                        <a href="{{ route('pokemon.edit', $p->id) }}">Edit</a>
                        <form action="{{ route('pokemon.destroy', $p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
