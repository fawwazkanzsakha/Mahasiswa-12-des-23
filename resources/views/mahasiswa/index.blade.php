@extends('layout.main')
@section('title','Mahasiswa')

@section('content')
<h2 class="text-center">Halaman Mahasiswa</h2>
 <a href="{{route('mahasiswa.create')}}" class="btn btn-info btn-rounded btn-fw">Tambah</a>
    <table class="table table-striped-columns">
        <thead>
        <tr>
            <th>NPM</th>
            <th>Nama Mahasiswa</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Foto</th>
            <th>Program Studi</th>
            {{-- <th>Fakultas</th> --}}
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($mahasiswa as $item)
        <tr>
            <td>{{$item['npm']}}</td>
            <td>{{$item['nama']}}</td>
            <td>{{$item['tempat_lahir']}}</td>
            <td>{{$item['tanggal_lahir']}}</td>
            <td><img src="images/{{$item['foto']}}" alt="" class="rounded-circle" width="70px"></td>
            <td>{{$item['prodi']['nama']}}</td>
            {{-- <td>{{$item['prodi']['fakultas']['nama']}}</td> --}}
            <td>
                <div class="d-flex justify-content-center">
                    <a href="{{route('mahasiswa.edit', $item->id)}}">
                    <button class="btn btn-success btn-sm">Edit</button>
                     </a>
                    <form method="POST" action="{{route('mahasiswa.destroy', $item->id)}}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>

                </div>

            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
<script>
    @if (Session::get('success'))
        toastr.success("{{Session::get('success')}}");
    @endif
</script>
@endsection
