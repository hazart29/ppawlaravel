<div>
    <p style="text-align: center;">KAMPUS HARAPAN BANGSA</p>
    <p style="text-align: center;">Kartu Rencana Studi Mahasiswa</p>
    <p>&nbsp;</p>
</div>
<div>
    <table border="0">
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td>{{Auth::user()->username}}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{Auth::user()->name}}</td>
        </tr>
    </table>
    <p>&nbsp;</p>
</div>
<div>
    <table border="1px" style="border-collapse: separate; border-spacing: 0px; width: 100%;">
        <thead>
            <tr>
                <th>Kode MK</th>
                <th>Nama MK</th>
                <th>Kelas</th>
                <th>Hari</th>
                <th>Pukul</th>
                <th>Ruang</th>
                <th>SKS</th>
            </tr>
        </thead>
        <tbody align="center">
            @forelse($data as $row)
            <tr>
                <td>{{ $row->kode_mk }}</td>
                <td>{{ $row->nama_mk }}</td>
                <td>{{ $row->kelas }}</td>
                <td>{{ $row->hari }}</td>
                <td>{{ $row->pukul }}</td>
                <td>{{ $row->ruang }}</td>
                <td>{{ $row->sks }}</td>
            </tr>
            @empty
            <tr>
                <td>Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <p>&nbsp;</p>
</div>
<div>
<table border="0">
        <tr>
            <td>IPS</td>
            <td>:</td>
            <td>0</td>
        </tr>
        <tr>
            <td>IPK</td>
            <td>:</td>
            <td>0</td>
        </tr>
    </table>
    <p>&nbsp;</p>
</div>
