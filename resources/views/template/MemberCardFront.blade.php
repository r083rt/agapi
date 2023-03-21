<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        .container {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background-image: url('/img/front_membercard.jpeg');
            background-size: contain;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100vw;
        }

        #item1 {
            flex: 4;
            /* Mengatur flex item pertama menjadi 2 */
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
            width: 100%;
            height: 100%;
            /* background-color: rgba(151, 56, 56, 0.5); */
        }

        #item2 {
            flex: 5;
            /* Mengatur flex item kedua menjadi 3 */
            display: flex;
            flex-direction: column;
            /* justify-content: center; */
            padding: 25px;
            align-items: center;
            width: 100%;
            height: 100%;
            /* background-color: rgba(37, 6, 6, 0.5); */
        }

        #item2 p {
            font-size: 14px;
            color: #202020;
            margin-bottom: 5px;
            font-weight: bold;
        }

        #item2 h3 {
            font-size: 18px;
            color: #202020;
            margin-bottom: 10px;
            font-weight: bold;
        }

        #item2 img {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        #item2 .qr-code {
            width: 80%;
            max-width: 200px;
            margin-top: 20px;
        }

        #item2 .valid-until {
            font-size: 14px;
            font-weight: bold;
            color: #202020;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div id="item1">
            <img src="{{ $storageUrl }}/{{ $user->avatar }}" alt="Foto Anggota" height="100px" width="100px"
                style="
                    border-radius: 50%;
                    border: 5px solid #fff;
                ">
        </div>
        <div id="item2">
            <h3>{{ $user->name }}</h3>
            <p>{{ $user->role->display_name }}</p>
            <p>Nomor Kartu Tanda Anggota:</p>
            <p> {{ $user->kta_id }}</p>
            <p>{{ $user->profile->school_place }}</p>
            <p>Email: {{ $user->email }}</p>
            <div id="qrcode"></div>
            <p class="valid-until">Masa Berlaku sampai tanggal {{ date('d M Y', strtotime($user->expired_at)) }}</p>
        </div>
    </div>

    <script src="
            https://cdn.jsdelivr.net/npm/qrcode-js-package@1.0.4/qrcode.min.js
            "></script>
    <script type="text/javascript">
        const qrcode = {!! $user->kta_id !!}

        new QRCode(document.getElementById("qrcode"), {
            text: qrcode,
            width: 100,
            height: 100,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H,
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
