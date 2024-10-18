<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pokemon</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('https://example.com/pokemon-background.jpg'); /* Ganti dengan URL latar belakang yang sesuai */
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            padding: 20px;
            color: #fff; /* Warna teks putih untuk kontras */
        }

        h1 {
            text-align: center;
            color: #ffcc00; /* Warna kuning cerah */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Bayangan teks untuk efek 3D */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
            background-color: rgba(0, 0, 0, 0.7); /* Latar belakang tabel transparan */
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #ff5733; /* Warna merah cerah untuk header */
            color: white;
        }

        tr:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Efek hover yang lebih halus */
        }

        a {
            text-decoration: none;
            color: #ffcc00; /* Warna kuning untuk tautan */
        }

        a:hover {
            text-decoration: underline;
            color: #ff5733; /* Ubah warna saat hover */
        }

        button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #d32f2f;
        }

        .success-message {
            background-color: rgba(0, 255, 0, 0.7); /* Warna hijau transparan */
            color: #3c763d;
            padding: 10px;
            border: 1px solid #d6e9c6;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .add-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            text-align: center;
            width: 200px;
        }

        .add-button:hover {
            background-color: #0056b3;
        }

        .pokemon-image {
            width: 50px; /* Set a fixed width for images */
            height: auto; /* Maintain aspect ratio */
        }
    </style>
</head>
<body>
    <h1>Daftar Pokemon</h1>

    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('pokemon.create') }}" class="add-button">Tambah Pokemon Baru</a>
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Spesies</th>
                    <th>Tipe Utama</th>
                    <th>Berat (kg)</th>
                    <th>Tinggi (m)</th>
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
                        <td>
                            @if ($p->photo)
                                <img src="{{ asset('storage/' . $p->photo) }}" alt="{{ $p->name }}" class="pokemon-image">
                            @else
                            <img src="default_image.png" alt="Gambar tidak tersedia" class="pokemon-image">
                            @endif
                        </td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->species }}</td>
                        <td>{{ $p->primary_type }}</td>
                        <td>{{ number_format($p->weight, 2) }}</td>
                        <td>{{ number_format($p->height, 2) }}</td>
                        <td>{{ $p->hp }}</td>
                        <td>{{ $p->attack }}</td>
                        <td>{{ $p->defense }}</td>
                        <td>{{ $p->is_legendary ? 'Ya' : 'Tidak' }}</td>
                        <td>
                            <a href="{{ route('pokemon.show', $p->id) }}" aria-label="Lihat {{ $p->name }}">Lihat</a>
                            <a href="{{ route('pokemon.edit', $p->id) }}" aria-label="Edit {{ $p->name }}">Edit</a>
                            <form action="{{ route('pokemon.destroy', $p->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" aria-label="Hapus {{ $p->name }}">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
