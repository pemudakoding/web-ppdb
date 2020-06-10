
    <table>

    <thead>
    <tr>
        <th style="background-color:#30a2db;border:2px solid black;color: #FFFFFF;font-weight:bold">#</th>
        <th style="background-color:#30a2db;border:2px solid black;color: #FFFFFF;font-weight:bold">Nomor Pendaftaran</th>
        <th style="background-color:#30a2db;border:2px solid black;color: #FFFFFF;font-weight:bold">NISN</th>
        <th style="background-color:#30a2db;border:2px solid black;color: #FFFFFF;font-weight:bold">NIK</th>
        <th style="background-color:#30a2db;border:2px solid black;color: #FFFFFF;font-weight:bold">Nomor KK</th>
        <th style="background-color:#30a2db;border:2px solid black;color: #FFFFFF;font-weight:bold">Nama Asli</th>
        <th style="background-color:#30a2db;border:2px solid black;color: #FFFFFF;font-weight:bold">Nama Panggilan</th>
        <th style="background-color:#30a2db;border:2px solid black;color: #FFFFFF;font-weight:bold">Tanggal Lahir</th>
        <th style="background-color:#30a2db;border:2px solid black;color: #FFFFFF;font-weight:bold">Jenis Kelamin</th>
        <th style="background-color:#30a2db;border:2px solid black;color: #FFFFFF;font-weight:bold">Agama</th>
        <th style="background-color:#30a2db;border:2px solid black;color: #FFFFFF;font-weight:bold">Kelurahan</th>
        <th style="background-color:#30a2db;border:2px solid black;color: #FFFFFF;font-weight:bold">Alamat</th>
        <th style="background-color:#30a2db;border:2px solid black;color: #FFFFFF;font-weight:bold">Sekolah Asal</th>
        <th style="background-color:#30a2db;border:2px solid black;color: #FFFFFF;font-weight:bold">Nomor BTQ</th>
    </tr>
    </thead>
    <tbody>
    @foreach($CalonSiswa as $row)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $row->nomor_pendaftaran }}</td>
            <td>{{ $row->nisn }}</td>
            <td>{{ $row->nik }}</td>
            <td>{{ $row->no_kk }}</td>
            <td>{{ $row->nama_asli }}</td>
            <td>{{ $row->nama_panggilan }}</td>
            <td>{{ $row->tanggal_lahir['tanggal'] }}-{{ $row->tanggal_lahir['bulan'] }}-{{ $row->tanggal_lahir['tahun'] }}</td>
            <td>{{ $row->jenis_kelamin }}</td>
            <td>{{ $row->agama }}</td>
            <td>{{ $row->kelurahan }}</td>
            <td>{{ $row->alamat }}</td>
            <td>{{ $row->sekolah_asal }}</td>
            <td>{{ $row->nomor_btq }}</td>
        </tr>
    @endforeach

