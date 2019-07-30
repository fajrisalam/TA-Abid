@extends('voyager::master')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-check"></i> Rekap Kehadiran
        </h1>
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Karyawan</th>
                                        <th>Jabatan</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($karyawan as $d)
                                    <?php 
                                        if((string)$d->id_karyawan == (string)$tmp){
                                            continue;
                                        } 
                                        if(!$d->karyawan){
                                            continue;
                                        }
                                    ?>
                                    <tr>
                                        <td>{{$c++}}</td>
                                        <td>{{ $d->karyawan->nama_karyawan }}</td>
                                        <td>{{ $d->karyawan->status }}</td>
                                        <td>{{ $d->created_at }}</td>
                                    </tr>
                                    <?php 
                                        $tmp = $d->id_karyawan;
                                    ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        
    </div>
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@stop

@section('javascript')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();
        } );
    </script>
@stop