{{-- buat halaman html kartu tanda anggota dengan ukuran 586 dan 1070 pixel --}}
{{-- background image dari /img/membercard.jpeg --}}
{{-- variable $user --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kartu Tanda Anggota AGPAII</title>
</head>

<body>
    <div style="width: 100vw; height: 100vh; background-image: url('/img/membercard.jpeg'); background-size: fit;">
        <div style="padding: 20px 20px 0 20px;">
            <div style="display: flex; justify-content: space-between;">
                <div style="font-size: 20px; font-weight: bold;">{{ $user->name }}</div>
                <div style="font-size: 20px; font-weight: bold;">{{ $user->id }}</div>
            </div>
            <div style="font-size: 20px; font-weight: bold;">{{ $user->email }}</div>
        </div>
    </div>
</body>

</html>
