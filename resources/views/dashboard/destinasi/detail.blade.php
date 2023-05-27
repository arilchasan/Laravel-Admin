@extends('layouts.master')

@section('content')
<div class="detailpeta">
        <div class="create-content">
                <h1 align="center">Detail Detinasi Wisata</h1>
                <form class="row g-3">
                
                <div class="col-md-6">
                    <label for="">Nama Tempat</label>
                    <input type="text" class="form-control" id="" name="" value="{{$destinasi->nama}}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="">Kategori</label>
                    <input type="text" class="form-control" id="" name="" value="{{$destinasi->jenis}}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="">Latitude</label>
                    <input type="text" class="form-control" id="" name="" value="{{$destinasi->latitude}}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="">Longitude</label>
                    <input type="text" class="form-control" id="" name="" value="{{$destinasi->longitude}}" readonly>
                </div>
                <div class="col-md-12">
                    <label for="">Lokasi</label>
                    <input type="text" class="form-control" id="" name="" value="{{$destinasi->alamat}}" readonly>
                </div>               
                <div class="col-md-12">
                    <label for="">Deskripsi</label>
                    <textarea  type="textarea" class="form-control" id="" name="" value="{{$destinasi->deskripsi}}" readonly>{{$destinasi->deskripsi}} </textarea>
                </div>
            
                    <div class="col-md-6">
                        <label for="">Gambar</label>
                        <br>
                        <img src="{{asset('foto/'.$destinasi->foto)}}" alt="" width="500" class="image">
                    </div>
                    <div class="col-md-6">
                        <label for="">Gambar</label>
                        <br>
                        <img src="{{asset('foto/'.$destinasi->foto2)}}" alt="" width="500" class="image">
                    </div>
                    <div class="col-md-12">
                        <label>
                            
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label for="">Gambar</label>
                        <br>
                        <img src="{{asset('foto/'.$destinasi->foto3)}}" alt="" width="500" class="image">
                    </div>
                    <div class="col-md-6">
                        <label for="">Gambar</label>
                        <br>
                        <img src="{{asset('foto/'.$destinasi->foto4)}}" alt="" width="500" class="image">
                    </div>

                <div class="col-md-12" style="margin-top:4%">
                    <a href="/dashboard/destinasi/all" type="button" class="btn btn-secondary mx-2" >Kembali</a>
                
                </div>       
            </form>
        </div>
        
</div>

@endsection
<style>
    .detailpeta {
        /* padding: 5vh; */
    margin-top: 7%;
    /* background-color: #722525; */
    height: 75vh;
    margin-left: 30vh;
    width: 165vh;
    overflow-y: scroll;
    position: relative;
    }
    label{
        margin-top: 20px
    }
    .image{
        border: 1px solid #000000;
    }
</style>