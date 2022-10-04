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
        <div style="flex:3; display:flex; justify-content: center; padding-top: 20px">
            <div style="display:flex; flex-direction:column; align-items: center">
                <h1 style="font-size: 30px; font-weight: bold; ">{{ $user->name }}</h1>
                <div style="font-size: 20px; font-weight: bold; padding-bottom:10px">({{ $user->role->display_name }})
                </div>
                <div style="font-size: 20px; padding-bottom:10px">{{ $user->kta_id }}</div>
                <div style="font-size: 20px; padding-bottom:10px">{{ $user->profile->school_place }}
                </div>
                <div style="font-size: 20px; padding-bottom:10px">{{ $user->email }}</div>

            </div>
        </div>
        <div style="flex:3;display:flex; justify-content:center">
            <div id="qrcode"></div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"
        integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var qrcode = new QRCode("qrcode", {
            text: "{{ $user->kta_id }}",
            width: 200,
            height: 200,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    </script>
</body>

</html>
