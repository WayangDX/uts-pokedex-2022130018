<!-- File resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Pokedex</title>
    <!-- Tambahkan CSS dan JS sesuai kebutuhan -->
</head>
<body>
    <div>
        <h1>Selamat Datang di Pokedex!</h1>
        <a href="{{ route('pokemon.index') }}">Lihat Daftar Pokemon</a>
    </div>
</body>
</html>
