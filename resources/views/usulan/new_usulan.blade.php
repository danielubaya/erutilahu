
<div class="container-fluid">

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Tambah Usulan Baru </h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Kelurahan</a></li>
                    <li class="breadcrumb-item active">Tambah Usulan</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row" >
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
    
             <p class="card-title-desc">Masukkan Biodata dan Alamat Rumah.</p>

            <div class="mb-3 row">
                <label for="example-text-input" class="col-md-2 col-form-label">Nama</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" id="new_nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="example-text-input" class="col-md-2 col-form-label">NIK</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" id="new_nik">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="example-text-input" class="col-md-2 col-form-label">No KK</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" id="new_kk">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="example-text-input" class="col-md-2 col-form-label">Alamat</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" id="new_alamat">
                </div>
            </div>


            <div class="mb-3 row">
                <label for="example-text-input" class="col-md-2 col-form-label"></label>
                <label for="example-text-input" class="col-md-1 col-form-label">RT</label>
               <div class="col-md-2">
                    <input class="form-control" type="text" id="new_rt">
                </div>
                <label for="example-text-input" class="col-md-2 col-form-label"></label>
               
                <label for="example-text-input" class="col-md-1 col-form-label">RW</label>
               <div class="col-md-2">
                    <input class="form-control" type="text" id="new_rw">
                </div>
            </div>

                 <hr>
            <div class="mb-3 row">
                <label for="example-text-input" class="col-md-2 col-form-label"></label>
                
                <div class="col-md-9" style="text-align:right">
                    <button type="button"  class="btn btn-primary waves-effect waves-light w-md"
                    onclick="tambah_usulan('<?php echo csrf_token() ?>')"
                    >Submit</button>
                    <button type="reset" class="btn btn-outline-danger waves-effect waves-light w-md">Reset</button>
                </div>
            </div>
          
        </div>
    </div>
    
    
</div>
<!-- end row -->
</div>
