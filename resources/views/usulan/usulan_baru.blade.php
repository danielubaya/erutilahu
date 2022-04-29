<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Daftar Usulan Baru</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Kelurahan</a></li>
                        <li class="breadcrumb-item active"> Usulan Baru</li>
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
                    
                    <table id="datatable" class="table table-bordered dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Register</th>
                            <th>Biodata</th>
                            <th>Profil Rumah</th>
                            <th>
                               Action
                            </th>
                        </tr>
                        </thead>


                        <tbody>
                        <?php 
                            $no=0;
                        ?>
                        @foreach($rs as $r)
                        <?php
                            $no++;
                        ?>
                        <tr id="tr_usulan_{{$r->id}}">
                            <td width="10px">{{$no}}</td>

                            <td >
                                <b>Tanggal Masuk:</b><br>{{$r->tgl_masuk}}<br>
                                <b>Jenis:</b><br>{{$r->jenis}}<br>
                                <b>No Surat:</b><br>{{$r->no_surat}}<br>
                                <b>Tgl Surat:</b><br>{{$r->tgl_surat}}
                               
                            </td>

                            <td>
                                <b>Nama:</b> {{$r->nama}}<br>
                                <b>NIK:</b> {{$r->nik}}<br>
                                <b>KK:</b> {{$r->kk}}<br>
                                <b>Alamat:</b><br>
                                {{$r->alamat}}, 
                                RT {{$r->rt}}, RW {{$r->rw}}<br>
                                Kelurahan {{$r->kelurahan}},
                                Kecamatan {{$r->kecamatan}},
                                Rayon {{$r->rayon}}
                                
                                <br><br>
                                <B>Titik Lokasi:</B>
                                
                                <a 
                        data-bs-target="#modal_setxy" data-bs-toggle="modal" 
                        onclick="isi_modal_setxy('div_isi_setxy',{{ $r->id }})">
                        <i style='margin-top:-10px' class="uil-location-point btn btn-sm btn-info"></i></a>

                                <br>
                                <div id="div_xy_{{$r->id}}"></div>
                                <script>
                                    show_xy("div_xy_{{$r->id}}",{{ $r->id}});
                                </script>

                            </td>
                        
                            <td>
                        
                        <div id="div_profil_{{$r->id}}"></div>
                            <!--------Dokumen kelengkapan--->
                        
                            <a class="btn btn-sm btn-warning" 
                        style="margin-top: 4px;margin-bottom: 4px;"  
                        data-bs-target="#modal_set_profil" data-bs-toggle="modal" 
                        onclick="isi_modal_set_profil('div_isi_set_profil',<?php echo $r->id ?>)">
                        &nbsp;<i class="fa fa-edit" ></i>&nbsp; Edit profil&nbsp;</a><br>
                        <br>
                        <b>Dokumen</b>:
                        <a style="cursor:pointer " onclick="$('#div_dokumen_<?php echo $r->id ?>').toggle()">
                        <strong><i class="fa fa-angle-double-down"></i></strong> </a>	
                        <div id="div_dokumen_<?php echo $r->id ?>" style="display: none">


                        <ol style='list-style-position: inside; padding-left: 0' 
                        id="ol_<?php echo $r->id ?>">
                        </ol>
                        <script>
                        list_dokumen(<?php echo $r->id ?>,"ol_<?php echo $r->id ?>");
                        show_profil("div_profil_{{$r->id}}",<?php echo $r->id ?>);
                        
                        </script>
                        </div>
                        <br>
                        <a class="btn btn-sm btn-warning" 
                        style="margin-top: 4px;margin-bottom: 4px;"  
                        data-bs-target="#modal_upload_dokumen" data-bs-toggle="modal" 
                        onclick="isi_modal_upload_dokumen('div_isi_upload_dokumen',<?php echo $r->id ?>)">
                        <i class="fa fa-upload" ></i>&nbsp; Upload File</a>


                       
                            </td>

                           
                            <td style="width:30px">
                            <button style="width:80px"
                        class="btn btn-success btn-sm"
                        onclick="kirim_ke_dinas('<?php echo csrf_token() ?>',<?php echo $r->id ?>)">Kirim ke Dinas</button>
                        <br><br>
                        <button style="width:80px"
                        class="btn btn-danger btn-sm"
                        onclick="if(confirm('Apakah anda yakin menghapus data {{$r->nama}} di {{$r->alamat}} ? ')) if(confirm('Apakah anda benar-benar yakin menghapus data {{$r->nama}} di {{$r->alamat}}? ')) hapus_usulan('tr_usulan_<?php echo $r->id ?>',<?php echo $r->id ?>)" >Hapus</button>
              
                            </td>
                        </tr>
                        <script>
						   
                        </script>
                        @endforeach
                        </tbody>
                    </table>
                    
                    
                    

                </div>
            </div>
        </div>
        
        
    </div>
    <!-- end row -->
</div>


<div id="modal_upload_dokumen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Upload Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body" id="div_isi_upload_dokumen">
                
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<div id="modal_setxy" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Set Posisi X,Y Rumah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body" id="div_isi_setxy">
                
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>



<div id="modal_set_profil" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Profil Rumah </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body" id="div_isi_set_profil">
                
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<script>
    $('#datatable').DataTable({
        lengthChange: true,});

</script>