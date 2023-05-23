@extends('layouts.master')

@section('content')
<div class="create-container">
        <div class="create-content">
                <h1 align="center">Edit Data Peta</h1>
                <form action="/dashboard/peta/update/{{$allpeta->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" class="form-control" id="latitude" name="latitude" required value="{{ old('latitude',$allpeta->latitude) }}">
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" class="form-control" id="longitude" name="longitude" required value="{{ old('longitude',$allpeta->longitude) }}" >
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" required value="{{ old('kategori',$allpeta->kategori) }}" >
                </div>
                <div class="form-group">
                    <label for="nama">Nama Tempat</label>
                    <input type="text" class="form-control" id="nama" name="nama" required value="{{ old('nama',$allpeta->nama) }}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat"  required value="{{ old('alamat',$allpeta->alamat) }}">
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar Tempat</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" required value="{{ old('gambar',$allpeta->gambar) }}">
                    <br>
                    <img src="{{ asset('peta/'.$allpeta->gambar) }}" alt="" width="500"  >
                </div>
              
                <div class="row">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/dashboard/peta/all" type="button" class="btn btn-secondary mx-2" >Kembali</a>

                </div>
            </form>
        </div>
           
</div>

@endsection