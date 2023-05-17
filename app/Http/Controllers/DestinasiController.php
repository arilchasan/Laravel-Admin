<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestinasiStoreRequest;
use App\Models\Destinasi;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DestinasiController extends Controller
{
    //
    public function index()
    {

        $destinasi = Destinasi::all();
        if ($destinasi->count() > 0) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil menampilkan data',
                'data' => $destinasi
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data tidak ada',
                'data' => $destinasi
            ], 404);
        }
        return view('/dashboard/data', ['destinasi' => $destinasi]);
        
    }
    public function create()
    {
        return view('/dashboard/create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto4' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required',
            'jenis' => 'required',
           
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Terjadi kesalahan',
                'data' => $validator->errors()
            ], 400);
        } else {
            $image = $request->file('foto');
            $image_name = Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/foto'), $image_name);
            // Storage::putFileAs('/public/foto', $image, $image_name);

            $destinasi = Destinasi::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'foto' => $image_name,
                'foto2' => $image_name,
                'foto3' => $image_name,
                'foto4' => $image_name,
                'deskripsi' => $request->deskripsi,
                'jenis'=> $request->jenis,
                
            ]);
            if ($destinasi) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil menambahkan data',
                    'data' => $destinasi                    
                ], 200);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Gagal menambahkan data',
                    'data' => $destinasi
                ], 400);
            }
        }
        Destinasi::create($validator);
        return redirect()->route('dashboard/data');
    }
    public function show($id)
    {
        $destinasi = Destinasi::find($id);
        if ($destinasi) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil menampilkan data',
                'data' => $destinasi
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data tidak ditemukan',
                'data' => $destinasi
            ], 404);
        }
    }

    public function update(int $id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto4' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required',
            'jenis' => 'required',
            'kuliner' => 'required'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Terjadi kesalahan',
                'data' => $validator->errors()
            ], 400);
        } else {
            $destinasi = Destinasi::find($id);
    
            if (!$destinasi) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Data tidak ditemukan',
                ], 404);
            }
    
            // hapus foto lama
            File::delete(public_path('foto/' . $destinasi->foto));
    
            // upload foto baru jika ada
            $image_name = $destinasi->foto;
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $image_name = Str::random(10) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/foto'), $image_name);
            }
    
            $destinasi->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'foto' => $image_name,
                'foto2' => $image_name,
                'foto3' => $image_name,
                'foto4' => $image_name,
                'deskripsi' => $request->deskripsi,
                'jenis' => $request->jenis,
                'kuliner' => $request->kuliner,
            ]);
    
            if ($destinasi) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil mengupdate data',
                    'data' => $destinasi
                ], 200);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Gagal mengupdate data',
                    'data' => $destinasi
                ], 400);
            }
        }
    }
    

    public function destroy($id) 
    {
        $destinasi = Destinasi::find($id);  
        if (!$destinasi) {
            return response()->json([
                'status' => 404,
                'message' => 'Data tidak ditemukan',
            ], 404);
        } else {
            File::delete(public_path('foto/' . $destinasi->foto));
            $destinasi->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil menghapus data',
                'data' => $destinasi
            ], 200);
        }
    }
}
