

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
    <h3 class="text-center" style="margin-top: 30px;font-weight:bold">Daftar Peta CRUD</h3>
    
    <table class="table table-light table-striped text-left " >
        @if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{ session('success') }}
        </div>
        @endif
    
        @if (session()->has('error'))
        <div class="alert alert-danger col-lg-12" role="alert">
            {{ session('error') }}
        </div>
     @endif

            <tr class="text-center"> 
                <th><h5>ID</h5></th>
                <th><h5>Latitude</h5></th>
                <th><h5>Longitude</h5></th>
                <th><h5>Kategori</h5></th>
                <th><h5>Nama</h5></th>
                <th><h5>Alamat</h5></th>
                <th><h5>Gambar</h5></th> 
                <th><h5></h5></th> 
                <th><h5>Opsi</h5></th> 
                <th><h5></h5></th> 

            </tr>
        </thead>
        <div class="col-lg-7">
            <a  class="btn btn-outline-primary" href="/dashboard/peta/create">Tambah Data</a>
        </div>
        <br>
            <tbody >
            @if ( $allpeta->count())
        
       
                <tr class="text-center">
                   @foreach ( $allpeta as $data )
                    <th>{{  $data->id }}</li>
                    <td>{{  $data->latitude }}</td>
                    <td>{{  $data->longitude }}</td>
                    <td>{{  $data->kategori }}</td>
                    <td>{{  $data->nama }}</td>
                    <td>{{  $data->alamat }}</td>
                    <td><img src="{{ asset('peta/' . $data->gambar) }}" width="150"></td>
                    <td><a type="button" class="btn btn-outline-info" href="/dashboard/peta/detail/{{ $data->id }}" >Detail</a> </td>
                    <td>  
                        <a type="button" class="btn btn-outline-success" href="/dashboard/peta/edit/{{ $data->id }}" >Edit</a>
                    </td>
                    <td>
                    <form action="/dashboard/peta/destroy/{{ $data->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-outline-danger"
                            onclick="return confirm('Yakin Mau Hapus ?')">Hapus</button>
                    </form>
                    </td>
                </tr>
                   @endforeach    
        </tbody>
        @else
        <tbody>
            <tr>
                <td colspan="10" class="text-center">Data Tidak Ada</td>
            </tr>
        </tbody>
        @endif
    </table>
                    {{-- {{ $data->links('pagination::bootstrap-5')}}  --}}

@endsection
