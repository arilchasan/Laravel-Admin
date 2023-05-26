@extends('layouts.master')

@section('content')
<div class="create-container">
    <div class="content container-fluid">
        <div class="content-container">
                <h1 align="center">Tambah Data Peta</h1>
                <form action="/dashboard/peta/add" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" class="form-control" id="latitude" name="latitude" value="{{ old('latitude') }}" placeholder="Masukkan Latitude">
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude') }}" placeholder="Masukkan Longitude">
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" value="{{ old('kategori') }}" placeholder="Masukkan Kategori">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Tempat</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Tempat">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" placeholder="Masukkan alamat">
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar Tempat</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" value="{{ old('gambar') }}" placeholder="Masukkan Gambar Wisata">
                </div>
              
                <div class="row">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/dashboard/peta/all" type="button" class="btn btn-secondary mx-2" >Kembali</a>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection