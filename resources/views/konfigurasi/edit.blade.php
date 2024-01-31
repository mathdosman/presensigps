<form action="/konfigurasi/update" method="POST" id="frmeditJK">
    @csrf
    <div class="row">
        <label>KODE JAM SEKOLAH</label>
        <div class="input-icon mb-3">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
            </span>
            <input type="text" value="{{$jam_kerja->kode_jam_kerja}}" class="form-control text-uppercase" name="kode_jam_kerja" id="kode_jam_kerja" placeholder="KODE JAM" readonly>
          </div>
    </div>
    <div class="row">
        <label>NAMA JAM SEKOLAH</label>
        <div class="input-icon mb-3">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
            </span>
            <input type="text" value="{{$jam_kerja->nama_jam_kerja}}" class="form-control text-uppercase" name="nama_jam_kerja" id="nama_jam_kerja" placeholder="NAMA JAM">
          </div>
    </div>
    <div class="row">
        <label>AWAL JAM MASUK</label>
        <div class="input-icon mb-3">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
            </span>
            <input type="time" value="{{$jam_kerja->awal_jam_masuk}}" class="form-control text-uppercase" name="awal_jam_masuk" id="awal_jam_masuk" placeholder="AWAL MASUK">
          </div>
    </div>
    <div class="row">
        <label>JAM MASUK SEKOLAH</label>
        <div class="input-icon mb-3">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
            </span>
            <input type="time" value="{{$jam_kerja->jam_masuk}}" class="form-control text-uppercase" name="jam_masuk" id="jam_masuk" placeholder="JAM MASUK">
          </div>
    </div>
    <div class="row">
        <label>AKHIR JAM MASUK SEKOLAH</label>
        <div class="input-icon mb-3">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
            </span>
            <input type="time" value="{{$jam_kerja->akhir_jam_masuk}}" class="form-control text-uppercase" name="akhir_jam_masuk" id="akhir_jam_masuk" placeholder="AKHIR JAM MASUK">
          </div>
    </div>
    <div class="row">
        <label>JAM PULANG SEKOLAH</label>
        <div class="input-icon mb-3">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
            </span>
            <input type="time" value="{{$jam_kerja->jam_pulang}}" class="form-control text-uppercase" name="jam_pulang" id="jam_pulang" placeholder="JAM PULANG">
          </div>
    </div>


    <div class="modal-footer form-group">
        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
        <button type="" class="btn btn-primary" >Save changes</button>
    </div>
</form>
