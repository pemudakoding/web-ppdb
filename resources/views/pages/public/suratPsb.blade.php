<?php



 $day   = date('j');
    $month = date('m');

    switch ($month) {
        case '01': $month='Januari';
        break;
        case '02': $month='Februari';
        break;
        case '03': $month='Maret';
        break;
        case '04': $month='April';
        break;
        case '05': $month='Mei';
        break;
        case '06': $month='Juni';
        break;
        case '07': $month='Juli';
        break;
        case '08': $month='Agustus';
        break;
        case '09': $month='September';
        break;
        case '10': $month='Oktober';
        break;
        case '11': $month='November';
        break;
        case '12': $month='Desember';
        break;
    }



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CETAK SURAT PSB</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman';
        }

        .header-ket {
            display: flex;
            justify-content: space-between;
            /* border:1px solid black; */
        }

        body {
            width: 210mm;
            height: 297mm;
            /* border:2px solid black; */
        }

        .left-logo {
            padding-left: 80px;
            /* border:1px solid black; */
        }

        .left-logo img {

            width: 46px !important;

        }

        .right-logo {
            padding-right: 80px;
            /* border:1px solid black; */
        }

        .center-content {
            /* border:1px solid black; */
            width: 100%;
            text-align: center;
        }

        .address-school p {
            font-size: 0.7em;
            text-align: center;
        }

        .italic {
            font-style: italic;
        }

        hr {
            margin-top: 5px;
            border: 2px solid black;
            ;
        }

        .sub-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
        }

        .header-text .left-content p {
            background: yellowgreen;
            padding: 5px;
            font-weight: bolder;
            font-family: sans-serif;
            position: relative;
            left: 320px;
            bottom: 20px;
            color: white;
            text-align: center;
        }

        .header-text .right-content div {
            width: 132px;
            height: 132px;
            border: 2px solid yellowgreen;
            position: relative;
            left: 320px;
            bottom: 20px;
        }

        .header-text h2 {
            text-align: center;
        }

        .main-data table {
            position: relative;
            bottom: 100px;
        }

        .main-data table tr td:first-child {
            padding-right: 5px;
        }

        .main-data table tr td:nth-child(2) {
            padding-right: 10px;
        }

        .main-data table tr td:nth-child(3) {
            padding-right: 5px;
        }

        .main-data table tr td {
            text-transform: capitalize;
            font-size: 1.2em;
        }

        .ttd {
            display: flex;
            justify-content: flex-end;
            text-align: center;
            font-weight: bold;
            font-size: 1.2em;
            position: relative;
            bottom: 90px;
        }

        .cut {
            border-top: 2px dashed darkred;
            display: flex;
        }

        .main-cut {
            width: 50%;
            margin-top: 20px;
        }

        .main-cut .header-cut {
            border: 1px solid black;
            padding: 10px;
            font-weight: bold;
            text-align: center;
        }

        .main-cut .keterangan {
            border: 1px solid black;
            height: 100px;
        }

        .main-cut:nth-child(2) .keterangan {

            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-family: sans-serif;
        }

        .main-cut:nth-child(2) .keterangan p {
            font-family: sans-serif;
            font-size: 1.5em;
        }
    </style>

</head>
{{-- onload="window.print()" --}}
<body >

    <div class="header-ket">
        <div class="left-logo">
            <img src="{{asset('img/kop/kotapalu.png')}}" width="60px;">
        </div>
        <div class="center-content">
            <h4>PEMERINTAH KOTA PALU
                <br>
                DINAS PENDIDIKAN DAN KEBUDAYAAN
            </h4>

            <h2>{{$webInformation->name}}</h2>

            <h5>{{$webInformation->description}}</h5>
        </div>
        <div class="right-logo">
            <img src="{{asset('img/kop/tutwuri.png')}}" width="60px;">
        </div>
    </div>
    <div class="address-school">
        <p>{{ $webInformation->address }} Telp {{ $webInformation->telp }} E-mail {{ $webInformation->email }} Web https://smp15palu.sch.id</p>
    </div>

    <hr>
    <div class="sub-header">
        <div class="header-text">
            <h2>FORMULIR PENDAFTARAN</h2>
            <h2>SISWA BARU</h2>
        </div>
        <div class="header-text">
            <div class="left-content">
                <p>NO: {{$dataPendaftar->nomor_pendaftaran}}</p>
            </div>
            <div class="right-content">
                <div><img src=""></div>
            </div>
        </div>
    </div>
    <div class="main-data">
        <table>
            <tr>
                <td>1.</td>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>{{$dataPendaftar->nama_asli}}</td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td>{{$dataPendaftar->tanggal_lahir}}</td>
            </tr>
            <tr>
                <td>3.</td>
                <td>NIK</td>
                <td>:</td>
                <td>{{$dataPendaftar->nik}}</td>
            </tr>
            <tr>
                <td>4.</td>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{$dataPendaftar->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td>5.</td>
                <td>Agama</td>
                <td>:</td>
                <td>{{$dataPendaftar->agama}}</td>
            </tr>
            <tr>
                <td>6.</td>
                <td>Sekolah Asal</td>
                <td>:</td>
                <td>{{$dataPendaftar->sekolah_asal}}</td>
            </tr>
            <tr>
                <td>7.</td>
                <td>Alamat</td>
                <td>:</td>
                <td>{{$dataPendaftar->alamat}}</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Kelurahan</td>
                <td>:</td>
                <td>{{$dataPendaftar->kelurahan}}</td>
            </tr>
        </table>
    </div>
    <div class="ttd">
        <p>Palu, <?= $day ?> <?= $month ?> <?= date('Y') ?> <br> <br> <br> Wali Murid</p>
    </div>
    <div class="cut">
        <div class="main-cut">
            <div class="header-cut">
                <h4>KETERANGAN</h4>
            </div>
            <div class="keterangan">
            </div>
        </div>
        <div class="main-cut">
            <div class="header-cut">
                <h4>NO PENDAFTARAN</h4>
            </div>
            <div class="keterangan">
                <p>{{$dataPendaftar->nomor_pendaftaran}}</p>
            </div>
        </div>
    </div>

</body>

</html>
