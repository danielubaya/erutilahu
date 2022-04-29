<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Usulan di Kelurahan</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dinas</a></li>
                        <li class="breadcrumb-item active"> Usulan di Kelurahan</li>
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
                            onchange="usulan_kelurahan($(this).val())" >
                                <option >-pilih-</option>
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

