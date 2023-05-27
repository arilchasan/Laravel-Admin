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
    }
    public function all()
    {
        return view ('/dashboard/destinasi/destinasi',['destinasi' => Destinasi::all()]);    
    }
    public function create()
    {
        return view('/dashboard/destinasi/create');
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
            return redirect('/dashboard/destinasi/all')->with('error', 'Terjadi kesalahan');
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

            $image2 = $request->file('foto2');
            $image_name2 = Str::random(10) . '.' . $image2->getClientOriginalExtension();
            $image2->move(public_path('/foto'), $image_name2);

            $image3 = $request->file('foto3');
            $image_name3 = Str::random(10) . '.' . $image3->getClientOriginalExtension();
            $image3->move(public_path('/foto'), $image_name3);

            $image4 = $request->file('foto4');
            $image_name4 = Str::random(10) . '.' . $image4->getClientOriginalExtension();
            $image4->move(public_path('/foto'), $image_name4);

            $destinasi = Destinasi::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'foto' => $image_name,
                'foto2' => $image_name2,
                'foto3' => $image_name3,
                'foto4' => $image_name4,
                'deskripsi' => $request->deskripsi,
                'jenis'=> $request->jenis,
                
            ]);
            if ($destinasi) {
                return redirect('/dashboard/destinasi/all')->with('success', 'Berhasil menambahkan data');
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil menambahkan data',
                    'data' => $destinasi                    
                ], 200);
            } else {
                return redirect('/dashboard/destinasi/all')->with('error', 'Gagal menambahkan data');
                return response()->json([
                    'status' => 400,
                    'message' => 'Gagal menambahkan data',
                    'data' => $destinasi
                ], 400);
            }
        }
        Destinasi::create($validator);
    }

    public function show($id)
    {
        return view('dashboard.destinasi.detail', ['destinasi' => Destinasi::find($id)]);
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

    public function edit($id) 
    {
        return view('dashboard.destinasi.edit', ['destinasi' => Destinasi::find($id)]);
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
            File::delete(public_path('foto/' . $destinasi->foto2));
            File::delete(public_path('foto/' . $destinasi->foto3));
            File::delete(public_path('foto/' . $destinasi->foto4));
    
            // upload foto baru jika ada
            $image_name = $destinasi->foto;
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $image_name = Str::random(10) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/foto'), $image_name);
            }

            $image_name2 = $destinasi->foto2;
            if ($request->hasFile('foto2')) {
                $image2 = $request->file('foto2');
                $image_name2 = Str::random(10) . '.' . $image2->getClientOriginalExtension();
                $image2->move(public_path('/foto'), $image_name2);
            }

            $image_name3 = $destinasi->foto3;
            if ($request->hasFile('foto3')) {
                $image3 = $request->file('foto3');
                $image_name3 = Str::random(10) . '.' . $image3->getClientOriginalExtension();
                $image3->move(public_path('/foto'), $image_name3);
            }

            $image_name4 = $destinasi->foto4;
            if ($request->hasFile('foto4')) {
                $image4 = $request->file('foto4');
                $image_name4 = Str::random(10) . '.' . $image4->getClientOriginalExtension();
                $image4->move(public_path('/foto'), $image_name4);
            }

            $destinasi->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'foto' => $image_name,
                'foto2' => $image_name2,
                'foto3' => $image_name3,
                'foto4' => $image_name4,
                'deskripsi' => $request->deskripsi,
                'jenis' => $request->jenis,
            ]);
    
            if ($destinasi) {
                return redirect('/dashboard/destinasi/all')->with('success', 'Berhasil mengupdate data');
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil mengupdate data',
                    'data' => $destinasi
                ], 200);
            } else {
                return redirect('/dashboard/destinasi/all')->with('error', 'Gagal mengupdate data');
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
            return redirect('/dashboard/destinasi/all')->with('error', 'Data tidak ditemukan');
            return response()->json([
                'status' => 404,
                'message' => 'Data tidak ditemukan',
            ], 404);
        } else {
            File::delete(public_path('foto/' . $destinasi->foto));
            File::delete(public_path('foto/' . $destinasi->foto2));
            File::delete(public_path('foto/' . $destinasi->foto3));
            File::delete(public_path('foto/' . $destinasi->foto4));
            $destinasi->delete();
            return redirect('/dashboard/destinasi/all')->with('success', 'Berhasil menghapus data');
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil menghapus data',
                'data' => $destinasi
            ], 200);
        }
    }
}
