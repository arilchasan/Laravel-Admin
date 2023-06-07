@extends('layouts.master')

@section('content')
<div class="create-container">
    <div class="content container-fluid">
        <div class="content-container">
                <h1 align="center">Tambah Data Kuliner</h1>
                <form action="/dashboard/kuliner/add" method="post" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label for="nama">Nama Kuliner</label>
                    <input type="text" class="form-control" id="nama_kuliner" name="nama_kuliner" value="{{ $kuliner->nama_kuliner }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="latitude">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $kuliner->deskripsi }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="longitude">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="{{ $kuliner->harga }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="">Foto Kuliner</label>
                    <br>
                    <img src="{{asset('foto/'.$kuliner->foto)}}" alt="" width="300" class="image">
                </div>
                <div class="col-md-6">
                    <label for="">Foto Kuliner</label>
                    <br>
                    <img src="{{asset('foto/'.$kuliner->foto2)}}" alt="" width="300" class="image">
                </div>
                <div class="col-md-12">
                    <label>
                        
                    </label>
                </div>
                <div class="col-md-6">
                    <label for="">Foto Kuliner</label>
                    <br>
                    <img src="{{asset('foto/'.$kuliner->foto3)}}" alt="" width="300" class="image">
                </div>
                <br>
                <div class="col-md-12 mt-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/dashboard/kuliner/all" type="button" class="btn btn-secondary mx-2" >Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection