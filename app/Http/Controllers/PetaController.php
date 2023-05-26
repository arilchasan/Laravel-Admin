<?php

namespace App\Http\Controllers;

use App\Models\Peta;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PetaController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.peta.peta',['allpeta' => Peta::all()]);
    }

    public function get()
    {
        $allpeta = Peta::all();
        if($allpeta->count() > 0){
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil menampilkan data peta',
                'data' => $allpeta
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data tidak ada',
                'data' => $allpeta
            ]);
        }
    }

    public function create()
    {
        return view('dashboard.peta.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'latitude' => 'required',
            'longitude' => 'required',
            'kategori' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($validator->fails()){
            return redirect('/dashboard/peta/create')->with('error', 'Terjadi kesalahan');
            return response()->json([
                'status' => 400,
                'message' => 'Terjadi kesalahan',
                'data' => $validator->errors()
            ],400);
        } else {
            $image = $request->file('gambar');
            $image_name = Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/peta'), $image_name);

            $allpeta = Peta::create([
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'kategori' => $request->kategori,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'gambar' => $image_name
            ]);
            if ($allpeta) {
                return redirect('/dashboard/peta/all')->with('success', 'Data berhasil ditambahkan');
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil menambahkan data',
                    'data' => $allpeta                    
                ], 200);
            } else {
                return redirect('/dashboard/peta/create')->with('error', 'Gagal menambahkan data');
                return response()->json([
                    'status' => 400,
                    'message' => 'Gagal menambahkan data',
                    'data' => $allpeta
                ], 400);
            }
        }
        Peta::create($validator);
        // ->redirect('/dashboard/peta')->with('success', 'Data berhasil ditambahkan');
    }

    public function show ($id) 
    {
        return view('dashboard.peta.detail', ['allpeta' => Peta::find($id)]);
        $allpeta = Peta::find($id);
        if($allpeta){
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil menampilkan data',
                'data' => $allpeta
            ], 200);
            return redirect('/dashboard/peta')->with('success', 'Data berhasil ditampilkan');
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data tidak ada',
                'data' => $allpeta
            ], 404);
            return redirect('/dashboard/peta')->with('error', 'Data tidak ditemukan');
        }
    }

    public function edit($id)
    {
        return view('dashboard.peta.edit', ['allpeta' => Peta::find($id)]);
    }

    public function update(int $id, Request $request) 
    {
        $validator = Validator::make($request->all(),[
            'latitude' => 'required',
            'longitude' => 'required',
            'kategori' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'message' => 'Terjadi kesalahan',
                'data' => $validator->errors()
            ],400);
        } else {
            $allpeta = Peta::find($id);
    
            if (!$allpeta) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Data tidak ditemukan',
                ], 404);
            }
            File::delete(public_path('/peta' . $request->gambar));
            $image_name = $allpeta->gambar;
            if($request->hasFile('gambar')){
                $image = $request->file('gambar');
                $image_name = Str::random(10) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/peta'), $image_name);
                Storage::put('/public/peta/', $image_name);
            }

            $allpeta->update([
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'kategori' => $request->kategori,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'gambar' => $image_name
            ]);
            if ($allpeta) {
                return redirect('/dashboard/peta/all')->with('success', 'Data berhasil diubah');
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil mengubah data',
                    'data' => $allpeta                    
                ], 200);    
                
            } else {
                return redirect('/dashboard/peta/all')->with('error', 'Data gagal diubah');
                return response()->json([
                    'status' => 400,
                    'message' => 'Gagal mengubah data',
                    'data' => $allpeta
                ], 400);
                
            }
            
        }      
    }

    public function destroy($id)
    {
        $allpeta = Peta::find($id);
        if (!$allpeta) {
            return redirect('/dashboard/peta/all')->with('error', 'Data tidak ditemukan');
            return response()->json([
                'status' => 404,
                'message' => 'Data tidak ditemukan',
            ], 404);
        } else {
            File::delete(public_path('peta/' . $allpeta->gambar));
            $allpeta->delete();
            return redirect('/dashboard/peta/all')->with('success', 'Data berhasil dihapus');
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil menghapus data',
                'data' => $allpeta
            ], 200);
        }
    }
}
