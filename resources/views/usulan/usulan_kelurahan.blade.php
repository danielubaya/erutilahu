
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
                        

                       
                            </td>

                           
                            
                        </tr>
                        <script>
						   
                        </script>
                        @endforeach
                        </tbody>
                    </table>
                    
                    


<script>
    $('#datatable').DataTable({
        lengthChange: true,});

</script>
                  