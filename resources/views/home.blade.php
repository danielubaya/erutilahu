@extends('layouts.minible')

@section('utama')
<div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">
                                                
                                                @if(Auth::user()->user_level==1)
                                                Kelurahan
                                                @else
                                                Dinas
                                                @endif
                                            </a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row" >
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Welcome</h4>
                                        <p class="card-title-desc">Selamat datang di Aplikasi eRutilahu.
                                        </p>    
                                        
                                       
        
                                    </div>
                                </div>
                            </div>
                            
                           
                        </div>
                        <!-- end row -->
                    </div> <!-- container-fluid -->@endsection
