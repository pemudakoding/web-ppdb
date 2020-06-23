@extends('layouts.default')


@section('content')

@if (Session::has('status'))
    @if (Session::get('status') == 'success')
        <div class="alert px-5 py-5 fixed w-full md:w-8/12 lg:w-5/12">
            <div class="bg-green-500 p-4 shadow-md rounded-md text-white relative">
                <p class="close absolute right-0 top-0 mt-3 mr-4 font-bold cursor-pointer text-xl">X</p>
                <h3 class="font-bold">Sukses mengambil Informasi <br> {{Session::get('data_pendaftar')->nama_asli}}</h3>
                <p class="mt-4">
                    Silahkan liat informasi yang diambil di bagian atas statistik
                </p>
            </div>
        </div>
    @else
    <div class="alert px-5 py-5 fixed w-full md:w-8/12 lg:w-5/12">
        <div class="bg-red-500 p-4 shadow-md rounded-md text-white relative">
            <p class="close absolute right-0 top-0 mt-3 mr-4 font-bold cursor-pointer text-xl">X</p>
            <h3 class="font-bold">Gagal mengambil Informasi</h3>
            <p class="mt-4">
                Tidak ada data yang cocok dengan nomor pendaftaran <b>{{Session::get('nomor_pendaftaran')}}</b>
            </p>
        </div>
    </div>

    @endif

@endif

<section id="hero">
    <div class="container mx-auto py-16 flex flex-wrap flex-col items-center justify-center ">
        <section class="box-border mb-4">
            <h1 class="text-3xl font-fredoka text-white">Cek Informasi Pendaftar</h1>
        </section>
        <main id="form" class="w-1/2">
            <form action="{{route('register.getData')}}" method="POST" >
                @csrf
                <input
                    type="text"
                    name="nomor_pendaftaran"
                    placeholder="Nomor Pendaftaran"
                    class=" px-4 py-2 rounded-lg shadow-md w-full md:w-9/12 text-gray-600">
                <button type="submit" class="w-full mt-4 mb:mt-0 md:w-2/12 shadow-md text-sm transition-all duration-75 py-2 font-fredoka text-white bg-blue-400 hover:bg-blue-500 rounded-lg">Cari</button>
            </form>
        </main>
    </div>
</section>
<section id="info-pendaftar" class="pb-16">
    @if (Session::get('data_pendaftar') != NULL)
            <main class="container mx-auto py-12">
                <div class="w-full lg:w-1/2 px-4">
                    <section class="bg-white shadow-lg  rounded-md py-5 px-8 ">
                        <header>
                            <h3 class="text-gray-600 font-bold text-xl text-center">No Pendaftaran: <span class="text-blue-600">{{Session::get('data_pendaftar')->nomor_pendaftaran}}</span></h3>
                        </header>
                        <hr class="w-full border border-gray-300 my-3">
                        <main class="flex justify-start text-gray-600 mt-5">
                            <table>
                                <tr>
                                    <td class="font-bold">Nama</td>
                                    <td>:</td>
                                    <td>{{Session::get('data_pendaftar')->nama_asli}}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold py-2">Status</td>
                                    <td>:</td>
                                    @if (Session::get('data_pendaftar')->status == 'Pending')
                                        <td class="text-yellow-600">Masih di Proses</td>
                                    @elseif (Session::get('data_pendaftar')->status == 'Diterima')
                                        <td class="text-green-600">{{Session::get('data_pendaftar')->status}}</td>
                                    @else
                                        <td class="text-red-600">{{Session::get('data_pendaftar')->status}}</td>
                                    @endif

                                </tr>
                            </table>
                        </main>
                    </section>
                </div>
            </main>
    @endif
    <main class="container mx-auto @if(!Session::has('data_pendaftar')) py-12 @endif  flex flex-wrap lg:flex-row">
        <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-4 md:mb-lg">
            <section class="bg-white shadow-lg rounded-md py-5 px-8 flex justify-between items-center">
                <header>
                    <h3 class="text-gray-600">Pendaftar</h3>
                    <h3 class="text-gray-700 font-bold text-2xl">{{$totalRegister}}</h3>
                </header>
                <main>

                    <i class="fas fa-users fa-3x text-gray-700"></i>
                </main>
            </section>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-4 md:mb-lg">
            <section class="bg-white shadow-lg rounded-md py-5 px-8 flex justify-between items-center">
                <header>
                    <h3 class="text-gray-600">Diterima</h3>
                    <h3 class="text-gray-700 font-bold text-2xl">{{$totalDiterima}}</h3>
                </header>
                <main>
                    <i class="fas fa-user-graduate fa-3x text-green-500"></i>
                </main>
            </section>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-4 md:mb-lg">
            <section class="bg-white shadow-lg rounded-md py-5 px-8 flex justify-between items-center">
                <header>
                    <h3 class="text-gray-600">Laki-Laki</h3>
                    <h3 class="text-gray-700 font-bold text-2xl">{{$totalMale}}</h3>
                </header>
                <main>
                    <i class="fas fa-mars fa-3x text-blue-500"></i>
                </main>
            </section>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-4 md:mb-lg">
            <section class="bg-white shadow-lg rounded-md py-5 px-8  flex justify-between items-center">
                <header>
                    <h3 class="text-gray-600">Perempuan</h3>
                    <h3 class="text-gray-700 font-bold text-2xl">{{$totalFemale}}</h3>
                </header>
                <main>
                    <i class="fas fa-venus fa-3x text-pink-500"></i>
                </main>
            </section>
        </div>
    </main>
    <main class="container mx-auto flex flex-wrap lg:flex-row">
        <div class="w-full lg:w-1/2  px-4">
            <div id="register_statistik" style="height: 300px; width:100%" class="bg-white rounded-md py-5 shadow-md"></div>
        </div>
        <div class="w-full lg:w-1/2  mt-16 lg:mt-0   px-4">
            <div id="register_statistik_agama" style="height: 300px; width:100%" class="bg-white rounded-md py-5 shadow-md"></div>
        </div>

    </main>
</section>
@endsection

@push('scripts')

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
        const   closeAlert = document.querySelector('.close');
                closeAlert.onclick = function(){
                    this.parentNode.parentNode.classList.add('close-alert');
                    console.log(this.parentNode.parentNode.opacity);
                }
    </script>
    <script>
    var chart = new CanvasJS.Chart("register_statistik", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title: {
		text: "Pendaftar Berdasarkan Wilayah - 2020",
	},
	axisY: {
		suffix: "   Pendaftar",
		includeZero: true,
        interval: 1
	},
	data: [{
		type: "column",
		yValueFormatString: "#\" Pendaftar\"",
		dataPoints: [
            @foreach ($totalPendaftarWilayah as $zona)
			{!! '{ label: "'.$zona->kelurahan.'", y:'.$zona->total.' }' !!},
            @endforeach
		]
	}]
});

var chart_agama = new CanvasJS.Chart("register_statistik_agama", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title: {
		text: "Pendaftar Berdasarkan Agama - 2020",
	},
	axisY: {
		suffix: "   Pendaftar",
		includeZero: true,
        interval: 1
	},
	data: [{
		type: "column",
		yValueFormatString: "#\" Pendaftar\"",
		dataPoints: [
            @foreach ($totalPendaftarAgama as $agama)
			{!! '{ label: "'.$agama->agama.'", y:'.$agama->total.' }' !!},
            @endforeach
		]
	}]
});
chart.render();
chart_agama.render();
    </script>
@endpush
