@extends('layouts.master')
@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Poppins:wght@400&display=swap"
        rel="stylesheet">
    <div class="create-container">
        <div class="content container-fluid">
            <div class="content-container">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3 class="text-center">Daftar Peta</h3>
                            <table class="table table-info table-striped text-left ">
                                @if (session()->has('success'))
                                    <div class="alert alert-success col-lg-12" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if (session()->has('error'))
                                    <div class="alert alert-danger col-lg-12" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <tr class="text-center">
                                    <th>
                                        <h5>ID</h5>
                                    </th>
                                    <th>
                                        <h5>Latitude</h5>
                                    </th>
                                    <th>
                                        <h5>Longitude</h5>
                                    </th>
                                    <th>
                                        <h5>Kategori</h5>
                                    </th>
                                    <th>
                                        <h5>Nama</h5>
                                    </th>
                                    <th>
                                        <h5>Alamat</h5>
                                    </th>
                                    <th>
                                        <h5>Gambar</h5>
                                    </th>
                                    <th>
                                        <h5></h5>
                                    </th>
                                    <th>
                                        <h5>Opsi</h5>
                                    </th>
                                    <th>
                                        <h5></h5>
                                    </th>

                                </tr>
                                </thead>
                                <div class="col-lg-7">
                                    <a class="btn btn-outline-primary" href="/dashboard/peta/create">Tambah Data</a>
                                </div>
                                <br>
                                <tbody>
                                    @if ($allpeta->count())
                                        <tr class="text-center">
                                            @foreach ($allpeta as $data)
                                                <th>{{ $data->id }}</li>
                                                <td>{{ $data->latitude }}</td>
                                                <td>{{ $data->longitude }}</td>
                                                <td>{{ $data->kategori }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->alamat }}</td>
                                                <td><img src="{{ asset('peta/' . $data->gambar) }}" width="150"></td>
                                                <td><a type="button" class="btn btn-outline-info"
                                                        href="/dashboard/peta/detail/{{ $data->id }}">Detail</a> </td>
                                                <td>
                                                    <a type="button" class="btn btn-outline-success"
                                                        href="/dashboard/peta/edit/{{ $data->id }}">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="/dashboard/peta/destroy/{{ $data->id }}"
                                                        method="post">
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- {{ $data->links('pagination::bootstrap-5')}}  --}}

@endsection

<style>
    .peta-container {
        /* padding: 5vh; */
        margin-top: 7%;
        /* background-color: #722525; */
        height: 70vh;
        margin-left: 30vh;
        width: 165vh;
        overflow-y: scroll;
        position: relative;

    }

    .peta-content {
        top: 0;
        padding: 4vh;
    }
</style>
