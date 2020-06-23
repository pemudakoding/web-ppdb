{{-- --}}

@extends('layouts.admin')

@section('title','Tambah Zona Sekolah')
@section('page','Zona Sekolah')
@section('sub-page','Tambah Zona')

@section('content')

<div class="col-lg-12 mb-4">

    <form action="{{route('zona.store')}}" method="POST">
        @csrf

        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Zona</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label>Nama Wilayah
                            @error('nama_zona')
                                <small class="ml-1 text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </label>
                        <input type="text" name="nama_zona" class="form-control"">

                </div>
                <button type=" submit" class="btn btn-primary">Tambah Zona</button>
                </form>
            </div>
        </div>
    </form>
</div>

@endsection
