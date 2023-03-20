<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        .card {
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* align-items: center; */
            background-image: url('/img/back_membercard.png');
            background-size: contain;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100vw;
        }

        .card-content {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding: 20px;
            /* background-color: blue; */
        }

        .card-image {
            flex: 2;
            max-width: 50%;
            margin-right: 20px;
            /* center */
            display: flex;
            /* // full height */
            flex-direction: column;
            justify-content: center;
            align-items: center;
            /* background-color: red; */
        }

        .card-image img {
            max-width: 100%;
            /* height: auto; */
        }

        .card-info {
            flex: 5;
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* color: white; */
        }

        .info-header {
            height: 150px;
        }

        .card-info h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .card-info p {
            margin: 5px 0;
        }
    </style>
</head>

<body>

    <div class="card">

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
