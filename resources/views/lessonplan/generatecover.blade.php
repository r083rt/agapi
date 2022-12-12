{{-- buat halaman html kartu tanda anggota dengan ukuran 586 dan 1070 pixel --}}
{{-- background image dari /img/membercard.jpeg --}}
{{-- variable $user --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cover RPP</title>
    <style>
    </style>
</head>

<body>
    <div
        style="
            width: 50vw;
            height: 100vh;
            background-image: url({{ $image }});
            background-size: cover;
            align-items: center
            display:flex;
            flex-direction:column">
        <div style="display:flex; justify-content: center; padding-top: 20px;flex-direction:column;" >
            <div style="flex: 9; display:flex; flex-direction:column; align-items: center">
                <h1 style="font-size: 30px; font-weight: bold; ">Judul</h1>
            </div>
            <div style="flex: 1;display:flex; flex-direction:column; align-items: center">
                <div style="font-size: 20px; font-weight: bold; padding-bottom:10px">
                    Mata Pelajaran
                </div>
                <div style="font-size: 20px; padding-bottom:10px">
                    Kelas
                </div>
                <div style="font-size: 20px; padding-bottom:10px">
                    Oleh : penulis
                </div>
            </div>
        </div>
    </div>
</body>

</html>
