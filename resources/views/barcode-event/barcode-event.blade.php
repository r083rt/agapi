{{-- buat halaman html kartu tanda anggota dengan ukuran 586 dan 1070 pixel --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div
        style="width: 600px; height: 600px; background-image: url('/img/bg-barcode-event.png'); background-size: 100% 100%; background-repeat: no-repeat; position: relative;">
        {{-- center div --}}
        <div style="position: absolute; top: 50%; left: 48.5%; transform: translate(-50%, -50%);">
            {{-- nama --}}
            <div style="font-size: 24px; font-weight: bold; text-align: center; margin-bottom: 10px; color: #fff">
                {{ $event->name }}
            </div>
            <div style="font-size: 15px; font-weight: bold; text-align: center; margin-bottom: 10px;  color: #fff">
                Scan untuk absen
            </div>
            {{-- generate barcode from id event --}}
            <div style="flex:3;display:flex; justify-content:center">
                <div id="qrcode"></div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"
        integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var qrcode = new QRCode("qrcode", {
            text: "{{ $event->id }}",
            width: 200,
            height: 200,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    </script>
</body>

</html>
