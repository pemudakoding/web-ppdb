@extends('layouts.admin')

@section('title','Daftar Zona Sekolah')
@section('page','Zona Sekolah')

@section('content')

<div class="col-lg-12 mb-4">

    {{-- ALERT --}}
    @include('components.admin.alert')
    {{-- END ALERT --}}
    <a href="{{route('zona.create')}}" class="btn btn-sm btn-info mb-3">Tambah Zona</a>
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Zona</h6>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Wilayah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($zona as $row)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$row->nama_zona}}</td>

                        <td class="d-flex">
                            <form action="{{route('zona.destroy',$row->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger ml-2">
                                    <i class="fas fa-trash text-white"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$zona->withQueryString()->links()}}
        </div>
    </div>
</div>

@endsection
