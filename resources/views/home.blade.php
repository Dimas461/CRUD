<h1>Data Siswa Berprestasi</h1>
<a href="{{ url('home/insert') }}">+ Tambah Siswa</a>
<a href="{{ url('logout') }}">Logout</a>
<hr>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    @php
        $i = 1;
    @endphp
    @foreach ($siswas as $siswa)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $siswa->nama }}</td>
            <td>{{ $siswa->alamat }}</td>
            <td>
                <a href="{{ url('home/update/' . $siswa->id) }}">Ubah</a> |
                <a href="{{ url('home/delete/' . $siswa->id) }}"
                    onclick="return confirm('Apakah anda yakin menghapus data ini?');">Hapus</a>
            </td>
        </tr>
    @endforeach
</table>
