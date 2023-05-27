@extends('layouts.master')

@section('content')
<div class="create-container">
    <div class="content container-fluid">
        <div class="content-container">
                <h1 align="center">Tambah Data Wisata</h1>
                <form action="/dashboard/destinasi/add" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Wisata</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Wisata">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Wisata</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" placeholder="Masukkan Alamat Wisata">
                </div>
                <div class="form-group">
                    <label for="foto">Foto Wisata</label>
                    <input type="file" class="form-control" id="foto" name="foto" value="{{ old('foto') }}" placeholder="Masukkan Foto Wisata">
                </div>
                <div class="form-group">
                    <label for="foto2">Foto Wisata 2</label>
                    <input type="file" class="form-control" id="foto2" name="foto2" value="{{ old('foto2') }}" placeholder="Masukkan Foto Wisata">
                </div>
                <div class="form-group">
                    <label for="foto3">Foto Wisata 3</label>
                    <input type="file" class="form-control" id="foto3" name="foto3" value="{{ old('foto3') }}" placeholder="Masukkan Foto Wisata">
                </div>
                <div class="form-group">
                    <label for="foto4">Foto Wisata 4</label>
                    <input type="file" class="form-control" id="foto4" name="foto4" value="{{ old('foto4') }}" placeholder="Masukkan Foto Wisata">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Wisata</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}" placeholder="Masukkan Deskripsi Wisata">
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis Wisata</label>
                    <input type="text" class="form-control" id="jenis" name="jenis" value="{{ old('jenis') }}" placeholder="Masukkan Jenis Wisata" width=50% height=50%>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/dashboard/destinasi/all" type="button" class="btn btn-secondary mx-2" >Kembali</a>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection