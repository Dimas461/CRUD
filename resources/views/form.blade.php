{{ $sukses }}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post">
    @csrf
    Kelas:<br>
    <select name="id_kelas">
        @foreach ($kelass as $kelas)
            <option value="{{ $kelas->id }}" @if(isset($siswa)) @if($kelas->id == $siswa->id_kelas) selected @endif @endif>{{ $kelas->nama_kelas }}</option>
        @endforeach
    </select><br>
    Nama Lengkap:<br>
    <input type="text" name="nama" value="@if(isset($siswa)){{ $siswa->nama }}@endif"><br>
    Alamat:<br>
    <textarea name="alamat" rows="3">@if(isset($siswa)){{ $siswa->alamat }}@endif</textarea><br>
    <button name="submit" value="submit" type="submit">Simpan</button>
    <a href="{{ url('/') }}">Kembali</a>
</form>
