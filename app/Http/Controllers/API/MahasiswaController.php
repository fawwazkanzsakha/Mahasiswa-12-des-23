<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MahasiswaController extends Controller
{
     public function index(){
        $mahasiswa = mahasiswa::with('prodi.fakultas')->get();
        return response()->json($mahasiswa,Response::HTTP_OK);
}
}
