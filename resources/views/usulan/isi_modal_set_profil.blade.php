<h5>Status Administrasi</h5>
<div class="mb-3 row">
    <label for="example-text-input" class="col-md-3 col-form-label">Legalitas</label>
    <div class="col-md-8">
<!--



st_tek_hasil
-->

        <select class="form-control" id="e_st_adm_legal" >
            <option >-pilih-</option>
            <option value="Petok D"
            <?php if($r->st_adm_legal=='Petok D') echo ' selected'?> 
            >Petok D</option>
            <option value="Eugendom"
            <?php if($r->st_adm_legal=='Eugendom') echo ' selected'?> 
            >Eugendom</option>
            <option value="Leter C"
            <?php if($r->st_adm_legal=='Leter C') echo ' selected'?> 
            >Leter C</option>
            <option value="IPT"
            <?php if($r->st_adm_legal=='IPT') echo ' selected'?> 
            >IPT</option>
            <option value="Lainnya"
            <?php if($r->st_adm_legal=='Lainnya') echo ' selected'?> 
            >Lainnya</option>
        </select>
        <input class="form-control" type="hidden" value="<?php echo $r->id ?>"  id="e_id">
 
    </div>
</div>
<div class="mb-3 row">
    <label for="example-text-input" class="col-md-3 col-form-label">Atas Nama</label>
    <div class="col-md-8">
        <input type='text' class='form-control' id='e_st_adm_an' value="<?php echo $r->st_adm_an ?>"/>
    </div>
</div>

<div class="mb-3 row">
    <label for="example-text-input" class="col-md-3 col-form-label">Hasil</label>
    <div class="col-md-8">
        <select class="form-control" id="e_st_adm_hasil" >
            <option >-pilih-</option>
            <option value="Oke"
            <?php if($r->st_adm_hasil=='Oke') echo ' selected'?> 
            >Oke</option>
            <option value="Tidak Oke"
            <?php if($r->st_adm_hasil=='Tidak Oke') echo ' selected'?> 
            >Tidak Oke</option>
        </select>
    </div>
</div>


<h5>Status Teknis</h5>
<div class="mb-3 row">
    <label for="example-text-input" class="col-md-3 col-form-label">Legalitas</label>
    <div class="col-md-8">

        <select class="form-control" id="e_st_tek_rusak" >
            <option >-pilih-</option>
            <option value="Ringan < 15 Jt"
            <?php if($r->st_tek_rusak=='Ringan < 15 Jt') echo ' selected'?> 
            >Ringan < 15 Jt</option>
            <option value="Berat > 15 Jt"
            <?php if($r->st_tek_rusak=='Berat > 15 Jt') echo ' selected'?> 
            >Berat > 15 Jt</option>
            
        </select>
       
    </div>
</div>

<div class="mb-3 row">
    <label for="example-text-input" class="col-md-3 col-form-label">Hasil</label>
    <div class="col-md-8">
        <select class="form-control" id="e_st_tek_hasil" >
            <option >-pilih-</option>
            <option value="Oke"
            <?php if($r->st_tek_hasil=='Oke') echo ' selected'?> 
            >Oke</option>
            <option value="Tidak Oke"
            <?php if($r->st_tek_hasil=='Tidak Oke') echo ' selected'?> 
            >Tidak Oke</option>
        </select>
    </div>
</div>


<div class="mb-3 row">
    <label for="example-text-input" class="col-md-3 col-form-label"></label>
    <div class="col-md-8">
       <button class="btn btn-info btn-block"  data-bs-dismiss="modal"
       onclick="update_profil_rumah('{{csrf_token()}}','div_profil_{{$r->id}}',{{$r->id}})">
        Simpan</button>
    </div>
</div>