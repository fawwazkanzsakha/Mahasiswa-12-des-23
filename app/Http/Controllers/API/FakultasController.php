<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\fakultas;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FakultasController extends Controller
{
    public function index(){
        $fakultas =fakultas::all();
        return response()->json($fakultas,Response::HTTP_OK);
    }
    public function store(Request $request){
        $validate = $request->validate([
            'nama' => 'required|unique:fakultas'
        ]);
       $fakultas = Fakultas::create($validate);
        if ($fakultas){
        $response['success'] = true;
        $response['message'] ='fakultas berhasil ditambahkan.';
        return response()->json($response,200);
      }

       
    }
}
