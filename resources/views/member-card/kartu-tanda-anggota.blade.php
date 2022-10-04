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
    <style>
    </style>
</head>

<body>
    <div
        style="
            width: 100vw;
            height: 100vh;
            background-image: url('/img/membercard.jpeg');
            background-size: cover;
            display:flex;
            flex-direction:column">
        <div style="display:flex; flex:5; align-items: flex-end; justify-content: center">
            <img src="{{ $storageUrl }}/{{ $user->avatar }}" alt="photo"
                style="
                    width: 150px;
                    height: 150px;
                    border-radius: 50%;
                    ">
        </div>
        <div style="flex:6; display:flex; justify-content: center; padding-top: 50px">
            <div style="display:flex; flex-direction:column; align-items: center">
                <h1 style="font-size: 30px; font-weight: bold; ">{{ $user->name }}</h1>
                <h2 style="font-size: 20px; font-weight: bold; ">{{ $user->role->display_name }}
                    {{ $user->profile->school_place }}</h2>
                <h2 style="font-size: 20px; font-weight: bold; ">{{ $user->email }}</h2>
            </div>
        </div>
    </div>
</body>

</html>
