<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">
                @if($tahap=='kelurahan')
                    Usulan masih di Kelurahan
                @elseif($tahap=='nonrutil')
                    Usulan Non Rutilahu
                @elseif($tahap=='perankingan')
                    Usulan Dalam Proses Perankingan
                @elseif($tahap=='daftartunggu')
                    Usulan Dalam Daftar Tunggu 
                @elseif($tahap=='pengerjaan')
                    Usulan Dalam Pengerjaan
                @elseif($tahap=='selesai')
                    Usulan Selesai Dikerjakan
                @else
                    Usulan untuk di cek Dinas
                @endif
                </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dinas</a></li>
                        <li class="breadcrumb-item active"> 
                        @if($tahap=='kelurahan')
                            Usulan di Kelurahan
                        @elseif($tahap=='nonrutil')
                            Usulan Non Rutilahu
                        @elseif($tahap=='perankingan')
                            Perankingan
                        @elseif($tahap=='daftartunggu')
                            Daftar Tunggu
                        @elseif($tahap=='pengerjaan')
                            Pengerjaan
                        @elseif($tahap=='selesai')
                            Selesai
                        @else
                            Usulan di cek Dinas
                        @endif
                            
                        </li>
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
                    
                    

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-3 col-form-label">Pilih Kelurahan</label>
                        <div class="col-md-8">
                            <select class="form-control" id="pilihkel" 
                            onchange="
                                if('{{$tahap}}'=='kelurahan')
                                {
                                    usulan_kelurahan($(this).val());
                                }
                                else if('{{$tahap}}'=='nonrutil')
                                {
                                    usulan_nonrutil($(this).val());
                                }
                                else if('{{$tahap}}'=='perankingan')
                                {
                                    usulan_ranking_ro($(this).val());
                                }
                                else if('{{$tahap}}'=='daftartunggu')
                                {
                                    usulan_daftartunggu($(this).val());
                                }
                                else if('{{$tahap}}'=='pengerjaan')
                                {
                                    usulan_pengerjaan($(this).val());
                                }
                                else if('{{$tahap}}'=='selesai')
                                {
                                    usulan_selesai($(this).val());
                                }
                                else
                                {
                                    usulan_masuk($(this).val())
                                }
                            " >
                                <option >-pilih-</option>
                                <option value='all'>SEMUA KELURAHAN</option>
                                @foreach($rs as $r)
                                <option value="{{$r->kelurahan}}"
                                >{{$r->kelurahan}}</option>
                            @endforeach
                            </select>
                            <script>
                                $('#pilihkel').select2();
                            </script>
                        </div>
                    </div>
                        
                    <div class="row" >
                        <div class="col-md-12"  id="kedua">

                        </div>

                    </div>
                </div>  
            </div>
        </div>
        
        
    </div>
    <!-- end row -->
</div>

