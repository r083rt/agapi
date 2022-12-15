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
            width: 100vh;
            height: 100vh;
            background-image: url({{ $data['image'] }});
            background-size: cover;
            align-items: center
            display:flex;
            flex-direction:column">
        <div
            style="display: flex; flex: 3, justify-content: center; align-items: center; padding-top: 10%; flex-direction:column">
            <div style="display: flex; flex-direction:column; align-items:center; width: 100%">
                <div style="font-size: 70px">
                    {{ $data['name'] }}
                </div>
            </div>
            <div style="display: flex; flex-direction:column; align-items:center; width: 100%; padding-top: 15%">
                <div style="font-size: 40px">Mata Pelajaran : {{ $data['subject'] }}</div>
            </div>
            <div
                style="display: flex; flex-direction:column; align-items:center; width: 100%; padding-top: 20%; justify-content:center">
                <div style="font-size: 35px; font-weight:bold">
                    Kelas {{ $data['grade'] }}
                </div>
                <div style="font-size: 35px; padding-top:3%; font-weight:bold">
                    Oleh {{ $data['creator'] }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
