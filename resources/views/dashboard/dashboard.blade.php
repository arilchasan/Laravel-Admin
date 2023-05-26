

@extends('layouts.master')
@section('content')
@if (session()->has('success'))
      <div class="alert alert-success col-lg-12" role="alert">
        {{session ('success')}}
      </div> 
    @endif
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome Admin!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="button" style="width: 100%;background-color:red;position:relative;" >
                <a  style="position: absolute;right:10px;top:10px;" href="{{ route('login') }}" class="btn btn-primary">Login</a>
                <a  style="position: absolute;right:90PX;top:10px" href="/daftar" class="btn btn-secondary">Register</a>
            </div>

            


            
        </div>
    </div>
@endsection
