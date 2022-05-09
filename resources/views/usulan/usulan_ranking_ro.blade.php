
 <div class="col-md-12" style="text-align:left">

<div class="note note-info" style="margin:4px"><B>DOKUMEN BERITA ACARA </B>

<?php	 
  $fo=public_path('DOKUMEN_BA/Kelurahan ').$kelurahan;
 if(is_dir($fo)){ 
 		$katabaru='baru';
 		?><br>
		File tersimpan :	<br>		
		<div id="tersimpan_ba">
			
		</div>
		<script>
			daftar_file_ba("Kelurahan {{$kelurahan}}", 'tersimpan_ba');
		</script>
			
<?php } else { 
		$katabaru='';
		?>
		<div id="tersimpan_ba"></div>
		<?php } ?>

		
</div>
</div>	
                    <table id="datatable" class="table table-bordered dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Register</th>
                            <th>Biodata</th>
                            <th>Profil Rumah</th>
                            
                           
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

                           
                            
                        </tr>
                        <script>
						   
                        </script>
                        @endforeach
                        </tbody>
                    </table>
                    
           