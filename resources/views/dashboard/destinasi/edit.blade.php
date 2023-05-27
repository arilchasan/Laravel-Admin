@extends('layouts.master')

@section('content')
<div class="create-container">
    <div class="content container-fluid">
        <div class="content-container">
                <h1 align="center">Edit Destinasi Wisata</h1>
                <form action="/dashboard/destinasi/update/{{$destinasi->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">

            
                <div class="col-md-12">
                    <label class="label" for="nama">Nama Wisata</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama',$destinasi->nama) }}" >
                </div>
                <div class="col-md-12">
                    <label class="label" for="alamat">Lokasi Wisata</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat',$destinasi->alamat) }}" >
                </div>
                <div class="col-md-6">
                    <label class="label" for="foto">Foto Wisata</label>
                    <input type="file" class="form-control" id="foto" name="foto" required value="{{ old('foto',$destinasi->foto) }}">
                    <br>
                    <img src="{{ asset('foto/'.$destinasi->foto) }}" alt="" width="500"  >
                </div>
                <div class="col-md-6">
                    <label class="label" for="foto2">Foto Wisata</label>
                    <input type="file" class="form-control" id="foto2" name="foto2" required value="{{ old('foto2',$destinasi->foto2) }}">
                    <br>
                    <img src="{{ asset('foto/'.$destinasi->foto2) }}" alt="" width="500"  >
                </div>
                <div class="col-md-6">
                    <label class="label" for="foto3">Foto Wisata</label>
                    <input type="file" class="form-control" id="foto3" name="foto3" required value="{{ old('foto3',$destinasi->foto3) }}">
                    <br>
                    <img src="{{ asset('foto/'.$destinasi->foto3) }}" alt="" width="500"  >
                </div>
                <div class="col-md-6">
                    <label class="label" for="foto4">Foto Wisata</label>
                    <input type="file" class="form-control" id="foto4" name="foto4" required value="{{ old('foto4',$destinasi->foto4) }}">
                    <br>
                    <img src="{{ asset('foto/'.$destinasi->foto4) }}" alt="" width="500"  >
                </div>
            
                <div class="col-md-12">
                    <label class="label" for="deskripsi">Deskripsi Wisata</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" required value="{{ old('deskripsi',$destinasi->deskripsi) }}">
                </div>
                <div class="col-md-12">
                    <label class="label" for="jenis">Jenis Wisata</label>
                    <input type="text" class="form-control" id="jenis" name="jenis" required value="{{ old('jenis',$destinasi->jenis) }}">
                </div>
                <br>
                <br>
                <div class="col-md-12 mt-2">
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/dashboard/destinasi/all" type="button" class="btn btn-secondary mx-2" >Kembali</a>

                </div>
            </form>
        </div>
        </div>
    </div>     
</div>

@endsection

<style>
    label{
        margin-top: 15px;
    }
</style>