@if (Session::has('psb'))
    @if (Session::get('psb') == 'success')
        <div class="mb-5  px-3">
            <div class="alert bg-green-500 px-4 py-4 rounded text-white shadow">
                <b class="font-fredoka">Sukses !!!</b>
                <p class="mt-2">Selamat pendaftar dengan nama <b class="capitalize">{{Session::get('nama_pendaftar')}} </b>berhasil didaftar.</p>
                <p class="mb-4">Silahkan screenshot atau cetak dokumen yang diberikan.</p>
                <a href="{{route('register.cetak',Session::get('nomor_pendaftaran'))}}" target="__blank" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600">Lihat Dokumen</a>
            </div>
        </div>
    @else
        <div class="mb-5  px-3">
            <div class="alert bg-red-500 px-4 py-4 rounded text-white shadow">
                <b class="font-fredoka">Gagal !!!</b>
                <p class="mt-2">Maaf pendaftar dengan nama <b class="capitalize">{{Session::get('nama_pendaftar')}}</b>gagal didaftar.</p>
            </div>
        </div>
    @endif
@endif
