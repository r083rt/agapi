{{-- buat halaman html kartu tanda anggota dengan ukuran 586 dan 1070 pixel --}}
{{-- background image dari /img/membercard.jpeg --}}
{{-- variable $user --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div style="width: 586px; height: 1070px; background-image: url('/img/membercard.jpeg'); background-size: cover;">
        <div style="padding: 20px 20px 0 20px;">
            <div style="display: flex; justify-content: space-between;">
                <div style="font-size: 20px; font-weight: bold; color: #fff;">{{ $user->name }}</div>
                <div style="font-size: 20px; font-weight: bold; color: #fff;">{{ $user->id }}</div>
            </div>
            <div style="font-size: 20px; font-weight: bold; color: #fff;">{{ $user->email }}</div>
            <div style="font-size: 20px; font-weight: bold; color: #fff;">{{ $user->phone }}</div>
            <div style="font-size: 20px; font-weight: bold; color: #fff;">{{ $user->address }}</div>
        </div>
    </div>
</body>

</html>
