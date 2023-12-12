<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\prodi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProdiController extends Controller
{
     public function index(){
        $prodi = prodi::with('fakultas')->get();
        return response()->json($prodi,Response::HTTP_OK);
    }
}
