
                    <table id="datatable" class="table table-bordered dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>No</th>
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
                            <td width="10px">{{$no}}</td>

                            <td >
                                <b>Tgl Input:</b><br>{{$r->tgl_input}}<br>
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
                            ?>
                             <br>
                             <br>
                        <b>Dokumen</b>:
                        <a style="cursor:pointer " onclick="$('#div_dokumen_<?php echo $r->id ?>').toggle()">
                        <strong><i class="fa fa-angle-double-down"></i></strong> </a>	
                        <div id="div_dokumen_<?php echo $r->id ?>" style="display: none">


                        <ol style='list-style-position: inside; padding-left: 0' 
                        id="ol_<?php echo $r->id ?>">
                        </ol>
                       
                        </div>
                        <br>
                        

                       
                            </td>

                           
                            
                        </tr>
                        <script>
						   
                        </script>
                        @endforeach
                        </tbody>
                    </table>
                    
                    


<script>

function show_all_ajax()
    {
        @foreach($rs as $r)
                        
            list_dokumen(<?php echo $r->id ?>,"ol_<?php echo $r->id ?>");
                              
        @endforeach
    } 

    $( document ).ready(function() {
       //show_all_ajax();
    $('#datatable2').DataTable({
        lengthChange: true,
        "fnDrawCallback": function( oSettings ) {
            show_all_ajax();
        }
     });	
    });
</script>
                  