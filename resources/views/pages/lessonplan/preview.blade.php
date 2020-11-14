<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        #page{
            line-height: 20px;
        }
        hr{
            margin:10px
        }
    </style>
</head>

<body>
    <div class="container-fluid" id="page">
        <div class="row" style="text-align:center">
            <div class="col">
                <div class="form">
                    <h5>RENCANA PELAKSANAAN PEMBELAJARAN</h5>
                    <h5>{{$lessonplan->school ?? $lessonplan->user->profile->school_place}}</h5>
                </div>
            </div>
        </div>
        <hr style="visibility: hidden;">
        <div class="row">
            <table width="100%" style="border-collapse:separate;
            border-spacing:-10px;" cellspacing="0">
                {{-- <tr>
                    <td style="width:20%"><h6>Judul</h6></td>
                    <td style="width:5%">:</td>
                    <td><h6>{{$lessonplan->topic}}</h6></td>
                </tr> --}}
                <tr>
                    <td style="width:20%"><h6>Mata Pelajaran</h6></td>
                    <td style="width:5%">:</td>
                    <td><h6>{{$lessonplan->subject}}</h6></td>
                </tr>
                <tr>
                    <td><h6>Materi Pokok</h6></td>
                    <td>:</td>
                    <td><h6>{{$lessonplan->topic}}</h6></td>
                </tr>
                <tr>
                    <td><h6>Kelas</h6></td>
                    <td>:</td>
                    <td><h6>{{$lessonplan->grade->description}}</h6></td>
                </tr>
                <tr>
                    <td><h6>Alokasi Waktu</h6></td>
                    <td>:</td>
                    <td><h6>{{$lessonplan->duration}}</h6></td>
                </tr>
            </table>
        </div>
        <hr> @foreach ($lessonplan->contents as $content)
        <div class="row">
            <div class="form">
                <h6>{{$content->name}}</h6>
                {!!$content->value!!}
            </div>
        </div>
        @endforeach
        <hr>
        <div class="row">
            <table width="100%">
                <tbody>
                    <tr>
                        <td>
                            <div class="form">
                                <h6>Mengetahui,</h6>
                                <h6>Kepala Sekolah</h6>
                                <br><br><br>
                                <h6>{{$lessonplan->user->profile->headmaster_name ?? 'Tidak ada data nama kepala sekolah'}}</h6>
                                <h6>{{$lessonplan->user->profile->headmaster_nip ?? 'Tidak ada data nip kepala sekolah'}}</h6>
                            </div>
                        </td>
                        <td>
                            <div class="form">
                            <h6>{{ucwords(strtolower($lessonplan->user->profile->city->name))}},
                                @php
                                setlocale (LC_TIME, 'id_ID');
                                print strftime('%e %B %Y');
                                @endphp
                            </h6>
                                <h6>Guru Mata Pelajaran</h6>
                                <br><br><br>
                                <h6>{{$lessonplan->user->name}}</h6>
                                <h6>{{$lessonplan->user->profile->nip ?? 'Tidak ada Data NIP'}}</h6>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
