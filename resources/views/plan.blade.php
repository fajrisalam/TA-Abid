@extends('voyager::master')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-shop"></i> {{$plan->nama_ruang}}
        </h1>
        @if($plan->id == 1)
        <a href="{{asset('/img/plan_A.png')}}" class="btn btn-primary" style="position:absolute; right: 3%; top: 15%;" rel="no-follow" target="_blank">
            <i class="voyager-warning"></i> Jalur Evakuasi 
        </a>
        @elseif($plan->id == 2)
        <a href="{{asset('/img/plan_B.png')}}" class="btn btn-primary" style="position:absolute; right: 3%; top: 15%;" rel="no-follow" target="_blank">
            <i class="voyager-warning"></i> Jalur Evakuasi
        </a>
        @endif
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{$c++}}</td>
                                        <td>{{ $d->nama_karyawan }}</td>
                                        <td>{{ $d->jabatan }}</td>
                                    </tr>
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