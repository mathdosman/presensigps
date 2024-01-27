<form action="/departemen/{{$departemen->kode_dept}}/update" method="POST" id="frmDepartemen">
    @csrf
    <div class="row">
        <div class="input-icon mb-3">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
            </span>
            <input type="text" value="{{$departemen->kode_dept}}" class="form-control text-uppercase" name="kode_dept" id="kode_dept" placeholder="Kode Kelas" readonly>
          </div>
    </div>
    <div class="row">
        <div class="input-icon mb-3">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
            </span>
            <input type="text" value="{{$departemen->nama_dept}}" class="form-control text-uppercase" name="nama_dept" id="nama_dept" placeholder="Nama Kelas">
          </div>
    </div>


    <div class="modal-footer form-group">
        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
        <button type="" class="btn btn-primary" >Save changes</button>
    </div>
</form>
