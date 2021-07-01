@extends('voyager::master')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@stop
@section('page_title', 'Report Perpanjangan Guru')
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-book"></i> Report Perpanjangan Guru
        </h1>
    </div>
@stop

@section('content')
<div class="page-content browse container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <table id="myTable" class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No Hp</th>
                                <th>Tanggal Bayar</th>
                                <th>Terlambat Perpanjang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->profile->contact ?? 'Kosong'}}</td>
                                    <td>{{$user->user_activated_at}}</td>
                                    <td>{{$user->late_paid}} Bulan</td>
                                    <td>
                                        <a href="https://wa.me/{{$user->profile->contact}}" target="_blank">Kontak Whatsapp</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-sm-6">{{$users->links()}}</div>
                        <div class="col-sm-6 text-right">Total {{number_format($users->total())}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('javascript')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script>

</script>
@stop