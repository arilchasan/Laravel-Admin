@extends('layouts.master')

@section('content')
<div class="create-container">
    <div class="content container-fluid">
        <div class="content-container">
                <h1 align="center">Edit Destinasi Wisata</h1>
                <form action="/dashboard/kuliner/update/{{$kuliner->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">

            
                <div class="col-md-6">
                    <label class="label" for="nama_kuliner">Nama Kuliner</label>
                    <input type="text" class="form-control" id="nama_kuliner" name="nama_kuliner" value="{{ old('nama_kuliner',$kuliner->nama_kuliner) }}" >
                </div>               
                <div class="col-md-6">
                    <label class="label" for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi',$kuliner->deskripsi) }}">
                </div>
                <div class="col-md-6">
                    <label class="label" for="harga">harga</label>
                    <input type="text" class="form-control" id="harga" name="harga"  value="{{ old('harga',$kuliner->harga) }}">
                </div>
                <div class="col-md-6">
                    <label class="label" for="foto">Foto Wisata</label>
                    <input type="file" class="form-control" id="foto" name="foto"  value="{{ old('foto',$kuliner->foto) }}">
                    <br>
                    <img src="{{ asset('foto/'.$kuliner->foto) }}" alt="" width="500"  >
                </div>
                <div class="col-md-6">
                    <label class="label" for="foto2">Foto Wisata</label>
                    <input type="file" class="form-control" id="foto2" name="foto2"  value="{{ old('foto2',$kuliner->foto2) }}">
                    <br>
                    <img src="{{ asset('foto/'.$kuliner->foto2) }}" alt="" width="500"  >
                </div>
                <div class="col-md-6">
                    <label class="label" for="foto3">Foto Wisata</label>
                    <input type="file" class="form-control" id="foto3" name="foto3"  value="{{ old('foto3',$kuliner->foto3) }}">
                    <br>
                    <img src="{{ asset('foto/'.$kuliner->foto3) }}" alt="" width="500"  >
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
    .kategori {
        display: flex;
        flex-direction: column;       
    }

    .kategori select {
        height: 2.5rem;
        text-align: center;
    }
</style>