@extends('layouts.admin')

@section('title','Daftar Calon Peserta Didik')
@section('page','Peserta Didik')

@section('content')

<div class="col-lg-12 mb-4">

    {{-- ALERT --}}
    @include('components.admin.alert')
    {{-- END ALERT --}}
    <a href="{{route('calon-peserta.updateStatusAll')}}" class="btn btn-info mb-3 btn-sm">Terima Semua</a>
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Pendaftar</h6>
            <div>
                <a href="{{route('calon-peserta.index')}}" class="btn btn-secondary btn-sm">Semua</a>
                <a href="{{route('calon-peserta.index')}}?status=Pending" class="btn btn-warning ml-1 btn-sm">Pending</a>
                <a href="{{route('calon-peserta.index')}}?status=Diterima" class="btn btn-success ml-1 btn-sm">Diterima</a>
                <a href="{{route('calon-peserta.index')}}?status=Ditolak" class="btn btn-danger ml-1 btn-sm">Ditolak</a>
            </div>
            <form>
                <div class="form-group m-0" method="GET">
                    <input type="text" class="form-control form-control-sm" name="search" placeholder="Nomor Pendaftaran">
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>Nomor Pendaftaran</th>
                        <th>Nama</th>
                        <th>Kelurahan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($peserta as $row)
                    <tr>
                        <td>{{$row->nomor_pendaftaran}}</td>
                        <td>{{$row->nama_asli}}</td>
                        <td>{{$row->kelurahan}}</td>
                        <td>
                            @if ($row->status == 'Diterima')
                            <span class="badge badge-success">
                                @elseif ($row->status == 'Pending')
                                <span class="badge badge-warning">
                                    @else
                                    <span class="badge badge-danger">
                                        @endif
                                        {{$row->status}}
                                    </span>
                        </td>
                        <td class="d-flex">

                            <a href="javascript:void(0)"
                                class="btn btn-sm btn-secondary"
                                data-toggle="modal"
                                data-target="#showModal"
                                data-url_target='{{route('calon-peserta.show',$row->nomor_pendaftaran)}}'
                                data-set_status='{{route('calon-peserta.updateStatus',['nomor_pendaftaran' => $row->nomor_pendaftaran])}}'

                                id="#btn-show"
                                >
                                <i class="fas fa-eye text-white"></i>
                            </a>

                            <a
                                href="{{route('calon-peserta.updateStatus',['nomor_pendaftaran' => $row->nomor_pendaftaran])}}?set_status=terima"
                                class="btn btn-sm btn-success ml-2">
                                <i class="fas fa-check"></i>
                            </a>

                            <a
                                href="{{route('calon-peserta.updateStatus',['nomor_pendaftaran' => $row->nomor_pendaftaran])}}?set_status=tolak"
                                class="btn btn-sm btn-warning ml-2">
                                <i class="fas fa-times "></i>
                            </a>

                            <form action="{{route('calon-peserta.destroy',$row->id)}}" method="POST">
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
            {{$peserta->withQueryString()->links()}}
        </div>
    </div>
</div>


<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tableModal">
                    <tr>
                        <td>Nomor Pendaftaran</td>
                        <td>:</td>
                        <td id="nomor_pendaftaran"></td>
                    </tr>
                    <tr>
                        <td>NISN</td>
                        <td>:</td>
                        <td id="nisn"></td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td id="nik"></td>
                    </tr>
                    <tr>
                        <td>Nomor KK</td>
                        <td>:</td>
                        <td id="no_kk"></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td id="nama_asli"></td>
                    </tr>
                    <tr>
                        <td>Nama Panggilan</td>
                        <td>:</td>
                        <td id="nama_panggilan"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td id="tanggal_lahir"></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td id="jenis_kelamin"></td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td id="agama"></td>
                    </tr>
                    <tr>
                        <td>Kelurahan</td>
                        <td>:</td>
                        <td id="kelurahan"></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td id="alamat"></td>
                    </tr>
                    <tr>
                        <td>Sekolah Asal</td>
                        <td>:</td>
                        <td id="sekolah_asal"></td>
                    </tr>
                    <tr>
                        <td>Status Sekolah</td>
                        <td>:</td>
                        <td id="status_sekolah"></td>
                    </tr>
                    <tr>
                        <td>Nomor Sertifikat BTQ</td>
                        <td>:</td>
                        <td id="nomor_btq"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <a href="" class="set-terima btn btn-success mb-3 ml-1 btn-sm">Terima</a>
                <a href="" class="set-tolak btn btn-danger mb-3 ml-1 btn-sm">Tolak</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>

        $('#showModal').on('show.bs.modal', function (event) {
            const button = event.relatedTarget // Button that triggered the modal
            let   btnTerima = document.querySelector('.set-terima');
            const btnTolak  = document.querySelector('.set-tolak');
            const urlTarget = button.dataset.url_target;

            btnTerima.href = button.dataset.set_status+'?set_status=terima';
            btnTolak.href  = button.dataset.set_status+'?set_status=tolak';

            fetch(urlTarget)
                .then( response => response.json())
                .then( (data,button) => {
                    const tableModal       = document.querySelector('#tableModal');
                    const titleModal       = document.querySelector('.modal-title');
                    const nomorPendaftaran = document.querySelector('#nomor_pendaftaran');
                    const nisn             = document.querySelector('#nisn');
                    const nik              = document.querySelector('#nik');
                    const noKk             = document.querySelector('#no_kk');
                    const namaAsli         = document.querySelector('#nama_asli');
                    const nama_panggilan   = document.querySelector('#nama_panggilan');
                    const tanggalLahir     = document.querySelector('#tanggal_lahir');
                    const jenisKelamin     = document.querySelector('#jenis_kelamin');
                    const agama            = document.querySelector('#agama');
                    const kelurahan        = document.querySelector('#kelurahan');
                    const alamat           = document.querySelector('#alamat');
                    const sekolahAsal      = document.querySelector('#sekolah_asal');
                    const statusSekolah    = document.querySelector('#status_sekolah');
                    const nomor_btq        = document.querySelector('#nomor_btq');

                    titleModal.innerHTML = data.nama_asli;
                    nomorPendaftaran.innerHTML = data.nomor_pendaftaran;
                    nisn.innerHTML           = data.nisn;
                    nik.innerHTML            = data.nik;
                    noKk.innerHTML           = data.no_kk;
                    namaAsli.innerHTML       = data.nama_asli;
                    nama_panggilan.innerHTML = data.nama_panggilan;
                    tanggalLahir.innerHTML   = `${data.tanggal_lahir.tanggal}-${data.tanggal_lahir.bulan}-${data.tanggal_lahir.tahun}`;
                    jenisKelamin.innerHTML   = data.jenis_kelamin;
                    agama.innerHTML          = data.agama;
                    kelurahan.innerHTML      = data.kelurahan;
                    alamat.innerHTML         = data.alamat;
                    sekolahAsal.innerHTML    = data.sekolah_asal;
                    statusSekolah.innerHTML  = data.status_sekolah
                    nomor_btq.innerHTML = data.nomor_btq;



                });



            })




    </script>
@endpush
