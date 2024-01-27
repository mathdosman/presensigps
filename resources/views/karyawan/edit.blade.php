<form action="/karyawan/{{$karyawan->nik}}/update" method="POST" id="frmKaryawan" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="input-icon mb-3">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
            </span>
            <input type="text" value="{{$karyawan->nik}}" class="form-control" name="nik" id="nik" placeholder="NISN" readonly>
          </div>
    </div>
    <div class="row">
        <div class="input-icon mb-3">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
            </span>
            <input type="text" value="{{$karyawan->nama_lengkap}}" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Siswa">
          </div>
    </div>

    <div class="row">
        <div class="input-icon mb-3">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
            </span>
            <input type="text" value="{{$karyawan->no_hp}}" class="form-control" name="no_hp" id="no_hp" placeholder="No. Hp">
          </div>
    </div>

    <div class="row">
        <div class="input-icon mb-3">
            <select name="jabatan" id="jabatan" class="form-select">
                <option value="" hidden>Status</option>
                <option {{$karyawan->jabatan == 'Siswa' ? 'selected' : ''}} value="Siswa">Siswa</option>
                <option {{$karyawan->jabatan == 'Guru' ? 'selected' : ''}} value="Guru">Guru</option>
            </select>
          </div>
    </div>
    <div class="row">
        <div class="input-icon mb-3">
            <select name="kode_dept" id="kode_dept" class="form-select">
                <option value="" hidden>Kelas</option>
                @foreach ($departemen as $d)
                <option {{$karyawan->kode_dept == $d->kode_dept ? 'selected': ''}} value="{{ $d->kode_dept }}" >{{$d->nama_dept}}</option>
                @endforeach
            </select>
          </div>
    </div>

    <div class="mb-3">
    <div class="form-label">Tambahkan Foto Profil</div>
    <input type="file" class="form-control" name="foto" id="foto">
    <input type="hidden" value="{{$karyawan->foto}}" name="old_foto">
    <input type="hidden" value="{{$karyawan->password}}" name="old_password">
    </div>

    <div class="modal-footer form-group">
        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
        <button type="" class="btn btn-primary" >Save changes</button>
    </div>
</form>
