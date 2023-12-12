<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $mahasiswa = Mahasiswa::all();
        return view("mahasiswa.index")->with("mahasiswa", $mahasiswa);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
         return view("mahasiswa.create")->with("prodi", $prodi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            "npm" =>"required|unique:mahasiswas",
            "nama" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir"=> "required",
            "foto"=> "required",
            "prodis_id"=> "required",
        ]);
        $ext = $request->foto->getClientOriginalExtension();
        $validasi["foto"]= $request->npm.".".$ext;
        $request->foto->move(public_path('foto'), $validasi['foto']);
        mahasiswa::create($validasi);
        return redirect('mahasiswa')->with('success','Data Mahasiwa Berhasil di simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mahasiswa $mahasiswa)
    {
        $prodi = Prodi::all();
        return view("mahasiswa.edit")->with("mahasiswa", $mahasiswa)->with("prodi", $prodi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, mahasiswa $mahasiswa)
    {
       $validasi = $request->validate([
            "npm" => "required",
            "nama" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required",
            "prodis_id" => "required",
            "foto" => "image|nullable"
        ]);

        if ($request->foto != null){
            //ambil extensi file foto
            $ext = $request->foto->getclientOriginalExtension();
            //rename file foto menjadi npm.extensi (contoh: 2226250077.jpg)
            $validasi["foto"] = $request->npm.".".$ext;
            //upload file foto ke dalam folder public/foto
            $request->foto->move(public_path('foto'),$validasi["foto"]);
            //simpan data mahasiswa ke tabel mahasiswas
            $mahasiswa->update($validasi);

           return redirect("mahasiswa")->with("success", "Data fakultas berhasil disimpan");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mahasiswa $mahasiswa)
    {
        $mahasiswa ->delete();
        return redirect()->route('mahasiswa.index')->with('success','Berhasil Dihapus');
    }
}
