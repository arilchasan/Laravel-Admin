<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function sendVerificationEmail(Request $request)
     {

        $request->user()->sendEmailVerificationNotification();

        return response()->json([
            'message' => 'Email verifikasi telah dikirim!'
        ]);
    }

    public function verify($id , Request $request){
        if (!$request->hasValidSignature()) {
            return response()->json([
                'message' => 'Verifikasi gagal!'
            ], 400);
        }

        $user = User::findOrFail($id);
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            return redirect()->to('/login')->with('success', 'Email berhasil diverifikasi!');
        }
        return redirect()->to('/login');

    }
}
