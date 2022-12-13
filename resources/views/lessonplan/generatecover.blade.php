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
            width: 50vh;
            height: 50vh;
            background-image: url({{ $data['image'] }});
            background-size: cover;
            align-items: center
            display:flex;
            flex-direction:column">
        <div
            style="display: flex; flex: 3, justify-content: center; align-items: center; padding-top: 10%; flex-direction:column">
            <div style="display: flex; flex-direction:column; align-items:center; width: 100%">
                <div style="font-size: 30px">
                    {{ $data['topic'] }}
                </div>
            </div>
            <div style="display: flex; flex-direction:column; align-items:center; width: 100%; padding-top: 5%">
                <h5>Mata Pelajaran : Pendidikan Agama islam</h5>
            </div>
            <div
                style="display: flex; flex-direction:column; align-items:center; width: 100%; padding-top: 10%; justify-content:center">
                <div style="font-size: 15px; font-weight:bold">
                    Kelas 6 SD
                </div>
                <div style="font-size: 15px; padding-top:3%; font-weight:bold">
                    Oleh Nama
                </div>
            </div>
        </div>
    </div>
</body>

</html>
