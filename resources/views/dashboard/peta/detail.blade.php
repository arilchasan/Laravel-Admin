@extends('layouts.master')

@section('content')
<div class="detailpeta">
        <div class="create-content">
                <h1 align="center">Detail Data Peta</h1>
                <form class="row g-3">
                
                <div class="col-md-6">
                    <label for="">Latitude</label>
                    <input type="text" class="form-control" id="latitude" name="latitude" value="{{$allpeta->latitude}}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="">Longitude</label>
                    <input type="text" class="form-control" id="longitude" name="longitude" value="{{$allpeta->longitude}}" readonly>
                </div>               
                <div class="col-md-6">
                    <label for="">Nama Tempat</label>
                    <input type="text" class="form-control" id="" name="" value="{{$allpeta->nama}}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="">Kategori</label>
                    <input type="text" class="form-control" id="" name="" value="{{$allpeta->kategori}}" readonly>
                </div>
                <div class="col-md-12">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control" id="" name="" value="{{$allpeta->alamat}}" readonly>
                </div>
                <div class="col-md-12">
                    <label for="">Gambar</label>
                    <img src="{{asset('peta/'.$allpeta->gambar)}}" alt="" width="100%" height="100%">
                </div>
                <div class="col-md-12" style="margin-top:4%">
                    <a href="/dashboard/peta/all" type="button" class="btn btn-secondary mx-2" >Kembali</a>
                
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
</style>