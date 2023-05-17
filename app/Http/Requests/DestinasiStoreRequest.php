<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class DestinasiStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
       if(Request()->isMethod('post')) {
         return [
            'nama' => 'required',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required',
            'jenis' => 'required',
            'kuliner' => 'required'
         ];
       } else {
         return [
            'nama' => 'required',
            'alamat' => 'required',
            'foto' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required',
            'jenis' => 'required',
            'kuliner' => 'required'
         ];
       }
    }

    public function messages()
    {
       if(request()->isMethod('post')) {
        return [
            'nama.required' => 'Nama harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'Foto harus berupa gambar',
            'foto.mimes' => 'Foto harus berupa gambar',
            'foto.max' => 'Foto maksimal 2MB',
            'deskripsi.required' => 'Deskripsi harus diisi'
        ];
        } else {
            return [
                'nama.required' => 'Nama harus diisi',
                'alamat.required' => 'Alamat harus diisi',
                'foto.image' => 'Foto harus berupa gambar',
                'foto.mimes' => 'Foto harus berupa gambar',
                'foto.max' => 'Foto maksimal 2MB',
                'deskripsi.required' => 'Deskripsi harus diisi'
            ];
        }
    }
}
