<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function userall() 
    {
        return view('dashboard.userlogin.index',['user' => User::all()]);
    }

    public function index(){
        $users = User::all();
        if ($users->count() > 0) {
            return response()->json([
                'data' => $users,
                'status' => 200,
                'message' => 'Data User ditampilkan',
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data User tidak ada',
            ], 404);
        }
    }

    public function destroy($id) 
    {
        $user = User::find($id);  
        if (!$user) {
            
            if($user->wantJson()) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Data tidak ditemukan',
                ], 404);
            }
            return redirect()->to('/dashboard/userlogin/all')->with('error', 'Data tidak ditemukan');
            
        } else {
            if($user->wantJson()){
                $user->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil menghapus data',
                    'data' => $user
                ], 200);
            }     
            return redirect()->to('/dashboard/userlogin/all')->with('success', 'Berhasil menghapus data');
        }
    }

    public function store(int $id , Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        } else {
            $user = User::find($id);
            if (!$user) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Data tidak ditemukan',
                ], 404);
            }
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = Str::Random(10) . '_' . $avatar->getClientOriginalName();
            $avatar->move(public_path('assets/img/avatar'), $avatarName);
            Storage::put('/public/assets/img/avatar', $avatarName);;
        }
        $user->update([
            'name' => $request->name,
            'avatar' => $avatarName,           
        ]);
        if($user){
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil mengupdate data',
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal mengupdate data',
            ], 400);
        }
    }
}

}
