<!DOCTYPE html>
<html>
<head>
    <title>Detail Pokemon</title>
</head>
<body>
    <h1>Detail Pokemon: {{ $pokemon->name }}</h1>

    <p><strong>Spesies:</strong> {{ $pokemon->species }}</p>
    <p><strong>Tipe Utama:</strong> {{ $pokemon->primary_type }}</p>
    <p><strong>Berat:</strong> {{ number_format($pokemon->weight, 2) }} kg</p>
    <p><strong>Tinggi:</strong> {{ number_format($pokemon->height, 2) }} m</p>
    <p><strong>HP:</strong> {{ $pokemon->hp }}</p>
    <p><strong>Serangan:</strong> {{ $pokemon->attack }}</p>
    <p><strong>Pertahanan:</strong> {{ $pokemon->defense }}</p>
    <p><strong>Legendary:</strong> {{ $pokemon->is_legendary ? 'Ya' : 'Tidak' }}</p>

    @if ($pokemon->photo)
        <img src="{{ asset('storage/' . $pokemon->photo) }}" alt="{{ $pokemon->name }}" style="max-width: 200px;">
    @endif

    <a href="{{ route('pokemon.index') }}">Kembali ke Daftar Pokemon</a>
</body>
</html>
