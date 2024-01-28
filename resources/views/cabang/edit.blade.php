<form action="/cabang/update" method="POST" id="frmCabangedit">
    @csrf
    <div class="row">
        <div class="input-icon mb-3">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
            </span>
            <input type="text" value="{{$cabang->kode_cabang}}" class="form-control text-uppercase" name="kode_cabang" id="kode_cabang" placeholder="Kode Cabang" readonly>
          </div>
    </div>
    <div class="row">
        <div class="input-icon mb-3">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
            </span>
            <input type="text" value="{{$cabang->nama_cabang}}" class="form-control text-uppercase" name="nama_cabang" id="nama_cabang" placeholder="Nama Cabang">
          </div>
    </div>
    <div class="row">
        <div class="input-icon mb-3">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
            </span>
            <input type="text" value="{{$cabang->lokasi_cabang}}" class="form-control text-uppercase" name="lokasi_cabang" id="lokasi_cabang" placeholder="Lokasi Cabang">
          </div>
    </div>
    <div class="row">
        <div class="input-icon mb-3">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-badge-right-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" stroke-width="0" fill="currentColor" /></svg>
            </span>
            <input type="number" value="{{$cabang->radius_cabang}}" class="form-control text-uppercase" name="radius_cabang" id="radius_cabang" placeholder="Radius">
          </div>
    </div>


    <div class="modal-footer form-group">
        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
        <button type="" class="btn btn-primary" >Save changes</button>
    </div>
</form>

<script>
    $(function(){
        $("#frmCabangedit").submit(function(){
                var kode_cabang = $("#frmCabangedit").find("#kode_cabang").val();
                var nama_cabang = $("#frmCabangedit").find("#nama_cabang").val();
                var lokasi_cabang = $("#frmCabangedit").find("#lokasi_cabang").val();
                var radius_cabang = $("#frmCabangedit").find("#radius_cabang").val();

                if(kode_cabang ==""){
                    Swal.fire({
                    icon: "warning",
                    title: "Kode cabang harus diisi",
                    showConfirmButton: false,
                    timer: 2000
                    });
                    return false
                }

                if(nama_cabang ==""){
                    Swal.fire({
                    icon: "warning",
                    title: "Nama cabang harus diisi",
                    showConfirmButton: false,
                    timer: 2000
                    });
                    return false
                }

                if(lokasi_cabang ==""){
                    Swal.fire({
                    icon: "warning",
                    title: "Lokasi cabang harus diisi",
                    showConfirmButton: false,
                    timer: 2000
                    });
                    return false
                }

                if(radius_cabang ==""){
                    Swal.fire({
                    icon: "warning",
                    title: "Radius cabang harus diisi",
                    showConfirmButton: false,
                    timer: 2000
                    });
                    return false
                }

            });
    });
</script>
