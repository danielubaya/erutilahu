<script>
    function cek_hasil_adm()
    {
       // alert($('#e_st_adm_legal').val() + ' ' + $('#e_st_adm_an').val())
        if((($('#e_st_adm_legal').val()!='Lainnya') && ($('#e_st_adm_an').val()!='Lainnya'))
            && ($('#e_st_adm_legal').val()!='' && $('#e_st_adm_an').val()!='' ))
        {
            
            $('#e_st_adm_hasil').hide();
            $('#e_st_adm_hasil_oke').show();
        }
        else
        {

            $('#e_st_adm_hasil').show();
            $('#e_st_adm_hasil_oke').hide();
        }
    }
</script>

<h5>Status Administrasi</h5>
<div class="mb-3 row">
    <label for="example-text-input" class="col-md-3 col-form-label">Legalitas</label>
    <div class="col-md-8">

        <select class="form-control" id="e_st_adm_legal"
        onchange="if($(this).val()=='Lainnya') $('#div_lainnya_adm').show();else $('#div_lainnya_adm').hide();
                cek_hasil_adm(); "
        >
            <option >-pilih-</option>
            <option value="Petok D"
            <?php if($r->st_adm_legal=='Petok D') echo ' selected'?> 
            >Petok D</option>
            <option value="Eugendom"
            <?php if($r->st_adm_legal=='Eugendom') echo ' selected'?> 
            >Eugendom</option>
            <option value="Letter C"
            <?php if($r->st_adm_legal=='Letter C') echo ' selected'?> 
            >Letter C</option>
            <option value="IPT"
            <?php if($r->st_adm_legal=='IPT') echo ' selected'?> 
            >IPT</option>
            <option value="Lainnya"
            <?php if(($r->st_adm_legal!='Petok D') && ($r->st_adm_legal!='Eugendom') && ($r->st_adm_legal!='Letter C') && ($r->st_adm_legal!='IPT') && ($r->st_adm_legal) ) echo ' selected'?> 
            >Lainnya</option>
        </select>
        <input class="form-control" type="hidden" value="<?php echo $r->id ?>"  id="e_id">
        <div id='div_lainnya_adm' 
        <?php if(($r->st_adm_legal=='Petok D') || ($r->st_adm_legal=='Eugendom') || ($r->st_adm_legal=='Letter C') || ($r->st_adm_legal=='IPT') || ($r->st_adm_legal=='')  )  { ?>
        style="display:none"
        <?php } ?>
        >
            <input class="form-control" placeholder='jelaskan disini'  type="text" value="<?php echo $r->st_adm_legal ?>"  id="e_st_adm_legal_lain">
           
        </div>
       
    </div>
</div>
<div class="mb-3 row">
    <label for="example-text-input" class="col-md-3 col-form-label">Atas Nama</label>
    <div class="col-md-8">
    <select class="form-control" id="e_st_adm_an"
        onchange="if($(this).val()=='Lainnya') $('#div_lainnya_an').show();else $('#div_lainnya_an').hide();
                  cek_hasil_adm();  "
        >
            <option value=''>-pilih-</option>
            <option value="Milik Sendiri"
            <?php if($r->st_adm_an=='Milik Sendiri') echo ' selected'?> 
            >Milik Sendiri</option>
            <option value="Lainnya"
            <?php if(($r->st_adm_an!='Milik Sendiri') && ($r->st_adm_an) ) echo ' selected'?> 
            >Lainnya</option>
        </select>
        <div id='div_lainnya_an' 
        <?php if(($r->st_adm_an=='Milik Sendiri') || ($r->st_adm_an=='')  )  { ?>
        style="display:none"
        <?php } ?>>
        <input class="form-control" placeholder='jelaskan disini'  type="text" value="<?php echo $r->st_adm_an ?>"  id="e_st_adm_an_lain">
        
        </div>
    </div>
</div>

<div class="mb-3 row">
    <label for="example-text-input" class="col-md-3 col-form-label">Hasil</label>
    <div class="col-md-8">
        <select class="form-control" id="e_st_adm_hasil" >
            <option value=''>-pilih-</option>
            <option value="Oke"
            <?php if($r->st_adm_hasil=='Oke') echo ' selected'?> 
            >Oke</option>
            <option value="Tidak Oke"
            <?php if($r->st_adm_hasil=='Tidak Oke') echo ' selected'?> 
            >Tidak Oke</option>
        </select>
        <span id='e_st_adm_hasil_oke' style="display:none">
        <input type='Text' class='form-control' value='Oke' readonly/>
        </span>
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