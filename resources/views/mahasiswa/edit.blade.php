@extends('layout.main')
@section('title','Mahasiswa')

@section('content')
<div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Mahasiswa</h4>
                    <p class="card-description">
                        Daftar Mahasiswa di Universitas MDP
                    </p>

                     <form class="forms-sample" method="POST" action="{{route('mahasiswa.update',$mahasiswa->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    {{-- mengisi NPM --}}
                    <div class="form-group">
                      <label for="mahasiswa_id">NPM</label>
                      <input type="text" class="form-control" name="npm" placeholder="NPM" value="{{$mahasiswa->npm}}">

                      @error('npm')
                        <label for="" class="text-danger">{{$message}}</label>
                       @enderror
                    </div>
                    {{-- Mengisi nama --}}
                    <div class="form-group">
                      <label for="mahasiswa_id">Nama Mahasiswa</label>
                      <input type="text" class="form-control" nama="name" placeholder="Nama Mahasiswa" value="{{$mahasiswa->nama}}">
                      @error('nama')
                        <label for="" class="text-danger">{{$message}}</label>
                       @enderror
                    </div>
                    {{-- Mengisi tempat lahir --}}
                    <div class="form-group">
                      <label for="mahasiswa_id">Tempat Lahir</label>
                      <input type="text" class="form-control" nama="tempat_lahir" placeholder="Tempat Lahir" value="{{$mahasiswa->tempat_lahir}}">
                      @error('tempat_Lahir')
                        <label for="" class="text-danger">{{$message}}</label>
                       @enderror
                    </div>
                    {{-- Mengisi tanggal lahir --}}
                    <div class="form-group">
                      <label for="mahasiswa_id">Tanggal lahir</label>
                      <input type="date" class="form-control" nama="tanggal_lahir" placeholder="Tanggal lahir" value="{{$mahasiswa->tanggal_lahir}}">
                      @error('tanggal_lahir')
                        <label for="" class="text-danger">{{$message}}</label>
                       @enderror
                    </div>

                    {{-- Mengisi Foto --}}
                     <div class="form-group">
                      <label for="mahasiswa_id">Foto</label>
                      <input type="file" class="form-control" nama="foto" placeholder="Foto">
                      @error('foto')
                        <label for="" class="text-danger">{{$message}}</label>
                       @enderror
                    </div>


                    {{-- Memilih Prodi --}}
                    <div class="form-group">
                      <label for="exampleInputUsername1">Prodi</label>
                      <select  class="form-control" nama="prodi_id" >
                        <option value="">Pilih</option>
                        @foreach ($prodi as $item)
                            <option value="{{$item->id}}"
                                @if (old('prodi_id',$mahasiswa->prodi_id) == $item['id'])
                                    selected
                                @endif
                                >{{$item->nama}}</option>
                        @endforeach
                      </select>
                      @error('Prodi_id')
                        <label for="" class="text-danger">{{$message}}</label>
                       @enderror
                    </div>


                    <button type="submit" class="btn btn-primary mr-2">simpan</button>
                    <a href="{{url('mahasiswa')}}" class="btn btn-light">Cancel</a>
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection
