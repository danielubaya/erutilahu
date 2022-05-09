<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Daftar Usulan dalam proses Perankingan</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Kelurahan</a></li>
                        <li class="breadcrumb-item active"> Perankingan</li>
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

                <div class="row" >
 <div class="col-md-12" style="text-align:left">

<div class="note note-info" style="margin:4px"><B>DOKUMEN BERITA ACARA </B>

<?php	 
  $fo=public_path('DOKUMEN_BA/').Auth::user()->name;
 if(is_dir($fo)){ 
 		$katabaru='baru';
 		?><br>
		File tersimpan :	<br>		
		<div id="tersimpan_ba">
			
		</div>
		<script>
			daftar_file_ba("{{Auth::user()->name}}", 'tersimpan_ba');
		</script>
			
<?php } else { 
		$katabaru='';
		?>
		<div id="tersimpan_ba"></div>
		<?php } ?>

	<div class="row">
		<div class="col-md-6">
		Upload Berita Acara <?php echo $katabaru ?>  :				
					<input class=' uneditable-input' id="file"  name="file" type="file" style='padding-top:0px;padding-left:2px;'></input>
		<br>
<button  style='width:120px; margin-top: 6px' class="btn btn-sm btn-info btn-block" 
 onclick="upload_file_ba('<?php echo csrf_token() ?>','{{Auth::user()->name}}','file','pesan_upload_ba','tersimpan_ba');
          ">Upload</button>						
		
</div>

 <div class="col-md-6" style="color: green; width:300px" id="pesan_upload_ba"></div>
 
 </div>
 
</div>	
</div>
</div>	
<div style="float:right">
<Button class="btn btn-info" onclick="kirim_rank('<?php echo csrf_token() ?>')" >
                                    Kirim Hasil Perankingan Ke Dinas
                                </Button>
                                </div>
                    <table id="datatable" class="table table-bordered dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Register</th>
                            <th>Biodata</th>
                            <th>Profil Rumah</th>
                            <th>
                                
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
                            <td width="10px" style='font-size:28px;color:red'>
                            @if($r->rank!=99)
                                {{$r->rank}}
                            @endif
                            </td>

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
                                
                               
                                <br>
                                <div id="div_xy_{{$r->id}}">
                                X={{$r->x}}<br> Y={{$r->y}}
                                
                                
                                </div>
                               

                            </td>
                        
                            <td>
                        
                        <div id="div_profil_{{$r->id}}"></div>
                            <!--------Dokumen kelengkapan--->
                            <?php
                            echo "<b>Status Adm. : ".$r->st_adm_hasil."</b><br>";
        echo "Legalitas : ".$r->st_adm_legal."<br/>";
        echo "Atas nama : ".$r->st_adm_an."<br/>";
        echo "<b>Status Teknis : ".$r->st_tek_hasil."</b><br>";
        echo "Kerusakan : ".$r->st_tek_rusak;
        ?><br>
                        <b>Dokumen</b>:
                        <a style="cursor:pointer " onclick="$('#div_dokumen_<?php echo $r->id ?>').toggle()">
                        <strong><i class="fa fa-angle-double-down"></i></strong> </a>	
                        <div id="div_dokumen_<?php echo $r->id ?>" style="display: none">


                        <ol style='list-style-position: inside; padding-left: 0' 
                        id="ol_<?php echo $r->id ?>">
                        </ol>
                        <script>
                        list_dokumen(<?php echo $r->id ?>,"ol_<?php echo $r->id ?>");
                        
                        </script>
                        </div>
                        <br>
                        

                       
                            </td>

                           
                            <td style="width:30px">
                                
                                <select class='form-control' style='font-size:20px;width:80px'
                                    onchange="update_rank('{{csrf_token()}}',{{$r->id}},$(this).val())"
                                >
                                    <option value='0'>-pilih-</option>
                                    @foreach($arrNomorBelum as $n)
                                    <option value='{{$n}}'>{{$n}}</option>
                                    @endforeach
                                </select>
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


<script>
   // $('#datatable').DataTable({
     //   lengthChange: true,});

</script>