

@extends('layouts.master')
@section('content')
    {{-- <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>    
        </div>
    </div> --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Poppins:wght@400&display=swap" rel="stylesheet">
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
    <h3 class="text-center" style="margin-top: 30px;font-weight:bold">Daftar</h3>

    
    <table class="table table-light table-striped text-left " >

            <tr class="text-center"> 
                <th><h5>id</h5></th>
                <th><h5>nama</h5></th>
                <th><h5>alamat</h5></th>
                <th><h5>Foto</h5></th>
                <th><h5>Deskripsi</h5></th>
                <th><h5>Jenis</h5></th>
                <th><h5>Aksi</h5></th>
                
                
            </tr>
            </thead>
        <tbody >
            <div class="col-lg-7">
                <a  class="btn btn-outline-primary" href="/dashboard/create">Tambah Data</a>
            </div>
        
       
                <tr class="text-center">
                   @foreach ( $destinasi as $data )
                    <th>{{  $data->nama }}</li>
                    <th>{{ $data->alamat }}</li>
                    <th>{{ $data->foto }}</li>
                    <th>{{ $data->deskrisi }}</li>
                    <th>{{ $data->jenis }}</li>
                    <td>
                    <a type="button" class="btn btn-outline-info" href="edit/" >Delete</a>
                    <a type="button" class="btn btn-outline-info" href="edit/" >Edit</a>
                   <a type="button" class="btn btn-outline-info" href="detail/" >Detail</a>
                </tr>
                   @endforeach    
        </tbody>
    </table>
                    {{-- {{ $data->links('pagination::bootstrap-5')}}  --}}

@endsection
