<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pokemon</title>
</head>
<body>
    <h1>Tambah Pokemon</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pokemon.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" required>
        <br>

        <label for="species">Spesies:</label>
        <input type="text" name="species" id="species" required>
        <br>

        <label for="primary_type">Tipe Utama:</label>
        <input type="text" name="primary_type" id="primary_type" required>
        <br>

        <label for="weight">Berat (kg):</label>
        <input type="number" step="0.01" name="weight" id="weight" required>
        <br>

        <label for="height">Tinggi (m):</label>
        <input type="number" step="0.01" name="height" id="height" required>
        <br>

        <label for="hp">HP:</label>
        <input type="number" name="hp" id="hp" required>
        <br>

        <label for="attack">Serangan:</for=>
        <input type="number" name="attack" id="attack" required>
        <br>

        <label for="defense">Pertahanan:</label>
        <input type="number" name="defense" id="defense" required>
        <br>

        <label for="is_legendary">Legendary:</label>
        <input type="checkbox" name="is_legendary" id="is_legendary">
        <br>

        <label for="photo">Foto:</label>
        <input type="file" name="photo" id="photo" accept="image/*">
        <br>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('pokemon.index') }}">Kembali ke Daftar Pokemon</a>
</body>
</html>
