@extends('layouts.default')

@section('content')
<section id="hero">
    <div class="container mx-auto">
        <section class="h-56 flex justify-center box-border pt-16">
            <h1 class="text-3xl font-fredoka text-white">Form Pendaftaran <span class="hidden border-red-400"></span></h1>

        </section>
    </div>
</section>
<section id='form' class="bg-blue-50 pb-48 ">
    <div class="container mx-auto  md:px-32 ">

        <section id="form-register" class="relative flex justify-center h-full">
            <section id="siswa" class="py-8 px-5 w-11/12 md:w-3/4  mx-auto shadow-lg bg-white rounded-md absolute -mt-16">
                @if (Session::has('errors'))
                    <div class="px-3  mb-4">
                        <div class="alert bg-red-400 px-5 py-4">
                            <h3 class="font-fredoka text-white text-lg">Opps ada kesalahan pada form !!!</h3>
                            @error('nisn')
                                <p class="mt-3 text-white text-sm">
                                    *{{$message}}
                                </p>
                            @enderror
                            @error('nik')
                                <p class="mt-3 text-white text-sm">
                                    *{{$message}}
                                </p>
                            @enderror
                        </div>
                    </div>
                @endif
                <form action="{{route('register.store')}}" method="POST">
                    @csrf
                    @include('components.alert')
                    <div class="md:flex mb-2 ">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="nama_asli" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Nama Asli
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none"
                                type="text"
                                name="nama_asli"
                                id="nama_asli"
                                value="{{old('nama_asli') ?? ''}}">
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="nama_panggilan" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Nama Panggilan
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none"
                                type="text"
                                name="nama_panggilan"
                                id="nama_panggilan"
                                value="{{old('nama_panggilan') ?? ''}}">
                        </div>
                    </div>
                    <div class="md:flex mb-5">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0 relative">
                            <label for="tanggal_lahir" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Tanggal Lahir
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:border-gray-500"
                                    id="tanggal_lahir"
                                    name="tanggal_lahir">
                                    <option value="">Pilih Tanggal</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        @if ((old('tanggal_lahir') ?? '') == $i)
                                            <option value="{{str_pad($i,2,'0',STR_PAD_LEFT)}}" selected>{{str_pad($i,2,'0',STR_PAD_LEFT)}}</option>
                                        @else
                                            <option value="{{str_pad($i,2,'0',STR_PAD_LEFT)}}">{{str_pad($i,2,'0',STR_PAD_LEFT)}}</option>
                                        @endif
                                    @endfor
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0 relative">
                            <label for="bulan_lahir" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Bulan Lahir
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:border-gray-500"
                                    id="bulan_lahir"
                                    name="bulan_lahir"
                                    class="bulan_lahir">
                                    <option value="">Pilih Bulan</option>
                                    @foreach ($month as $row)
                                        @if ((old('bulan_lahir') ?? '') == $loop->iteration)
                                            <option value="{{str_pad($loop->iteration,2,'0',STR_PAD_LEFT)}}" selected>{{$row}}</option>
                                        @else
                                            <option value="{{str_pad($loop->iteration,2,'0',STR_PAD_LEFT)}}">{{$row}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0 relative">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="tahun_lahir">
                                Tahun Lahir
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:border-gray-500"
                                    id="tahun_lahir"
                                    name="tahun_lahir">
                                    <option value="">Pilih Tahun</option>
                                    @for ($i = date('Y'); $i > 1930; $i--)
                                        @if ((old('tahun_lahir') ?? '') == $i)
                                            <option value="{{$i}}" selected>{{$i}}</option>
                                        @else
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endif
                                    @endfor
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex mb-5">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 relative">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="jenis_kelamin">
                                Jenis Kelamin
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:border-gray-500"
                                    id="jenis_kelamin"
                                    name="jenis_kelamin">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki" @if((old('jenis_kelamin') ??'') == 'Laki-Laki') selected @endif>Laki-Laki</option>
                                    <option value="Perempuan" @if((old('jenis_kelamin') ??'') == 'Perempuan') selected @endif>Perempuan</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 relative">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="agama">
                                Agama
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:border-gray-500"
                                    id="agama"
                                    name="agama">
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam" @if((old('agama') ??'') == 'Islam') selected @endif>Islam</option>
                                    <option value="Kristen" @if((old('agama') ??'') == 'Kristen') selected @endif>Kristen</option>
                                    <option value="Katolik" @if((old('agama') ??'') == 'Katolik') selected @endif>Katolik</option>
                                    <option value="Hindu" @if((old('agama') ??'') == 'Hindu') selected @endif>Hindu</option>
                                    <option value="Budha" @if((old('agama') ??'') == 'Budha') selected @endif>Budha</option>
                                    <option value="Khong Hu Cu" @if((old('agama') ??'') == 'Khong Hu Cu') selected @endif>Khong Hu Cu</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex mb-5">
                        <div class="w-full md:w-1/1 px-3 mb-6 md:mb-0 relative">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="kelurahan">
                                Kelurahan
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:border-gray-500"
                                    id="kelurahan"
                                    name="kelurahan">
                                    <option value="">Pilih Kelurahan</option>
                                    @foreach ($zonaSekolah as $zona)
                                        <option value="{{$zona->nama_zona}}">{{$zona->nama_zona}}</option>
                                    @endforeach
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex mb-2">
                        <div class="w-full md:w-1/1 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="alamat">
                                Alamat
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none"
                                type="text"
                                name="alamat"
                                id="alamat"
                                value="{{old('alamat') ?? ''}}">
                        </div>
                    </div>
                    <div class="md:flex mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="nisn">
                                Nisn
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none"
                                type="text"
                                name="nisn"
                                id="nisn"
                                value="{{old('nisn') ?? ''}}">
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="nik">
                                NIK Pendaftar
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none"
                                type="text"
                                name="nik"
                                id="nik"
                                value="{{old('nik') ?? ''}}">
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="no_kk">
                                Nomor Kartu Keluarga
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none"
                                type="text"
                                name="no_kk"
                                id="no_kk"
                                value="{{old('no_kk') ?? ''}}">
                        </div>
                    </div>
                    <div class="md:flex mb-2">
                        <div class="w-full md:w-1/1 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="no_hp">
                                Nomor HP Orang Tua/ Wali Murid
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none"
                                type="text"
                                name="no_hp"
                                id="no_hp"
                                value="{{old('no_hp') ?? ''}}">
                        </div>
                    </div>
                    <div class="md:flex mb-5">
                        <div class="w-full md:w-1/1 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="sekolah_asal">
                                Sekolah Asal
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none"
                                type="text"
                                name="sekolah_asal"
                                id="sekolah_asal"
                                value="{{old('sekolah_asal') ?? ''}}">
                        </div>
                        <div class="w-full md:w-1/1 px-3 mb-6 md:mb-0 relative">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="status_sekolah">
                                Status Sekolah
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:border-gray-500"
                                    id="status_sekolah"
                                    name="status_sekolah">
                                    <option value="">Pilih Status</option>
                                    <option value="Negeri">Negeri</option>
                                    <option value="Swasta">Swasta</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 py-2 px-12 font-bold text-white rounded shadow-md ml-3">Daftar</button>
                </form>
            </section>
        </section>
    </div>
</section>
@endsection

@push('scripts')
    <script src="{{asset('js/form.js')}}"></script>
@endpush
