<?php

namespace App\Http\Controllers;
use App\Models\Destinasi;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /** index page dashboard */
    public function index()
    {
        return view('dashboard.dashboard');
    }
    public function data () {
        return view('dashboard.data',['destinasi' => Destinasi::all()]);
    }
}
