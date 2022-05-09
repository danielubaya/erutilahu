
                <div data-simplebar class="sidebar-menu-scroll">

<!--- Sidemenu -->
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
       
        <li>
            <a href="index.php">
                <i class="uil-home-alt" style="color:red"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="menu-title">Usulan Rutilahu</li>

        <li>
            <a href="#" class="waves-effect"
            onclick="new_usulan('utama')"
            >  
                <i class="uil-plus-square"  style="color:orange"></i>
                <span>Tambah Usulan </span>
            </a>
        </li>

        <li>
            <a href="#" class="waves-effect"
            onclick="usulan_baru('utama')"
            >  
                <i class="uil-folder-plus" style="color:orange"></i>
                <span>Daftar Usulan Baru</span>
            </a>
        </li>

        <li>
            <a href="#" class="waves-effect"
            onclick="usulan_dicek('utama')"
            >  
                <i class="uil-folder-check"  style="color:orange"></i>
                <span>Pengecekan Dinas</span>
            </a>
        </li>

        <li>
            <a href="#" class="waves-effect"
            onclick="usulan_ranking('utama')"
            >  
                <i class="uil-folder-heart"  style="color:orange"></i>
                <span>Perankingan </a>
        </li>
        <li class="menu-title">Pegerjaan Rutilahu</li>
        <li>
            <a href="#" class="waves-effect"
            onclick="usulan_daftartunggu('KELURAHAN')"
            >  
            <i class="uil-circle-layer" style="color:green"></i>
                <span>Daftar Tunggu</span>
            </a>
        </li>
        <li>
            <a href="#" class="waves-effect"
            onclick="usulan_pengerjaan('KELURAHAN')"
            >  
                <i class="uil-brush-alt"  style="color:green"></i>
                <span>Dalam Pengerjaan  </a>
        </li>
       
        <li>
            <a href="#" class="waves-effect"
            onclick="usulan_selesai('KELURAHAN')"
            >  
                <i class="uil-star" style="color:green"></i>
                <span>Selesai Pengerjaan </a>
        </li>
       
        
        
        <li class="menu-title">Summary</li>
        
        <li>
            <a href="#" class="waves-effect"
            onclick="peta_usulan('utama')"
            >
                <i class="uil-location-point" style="color:red"></i>
                <span>Peta Rutilahu</span>
            </a>
        </li>

        <li class="menu-title">Lain-lain</li>
        <li>
            <a href="#" class="waves-effect"
            onclick="usulan_nonrutil('KELURAHAN')"
            >  
            <i class="uil-box" style="color:red"></i>
                <span>Usulan NonRutilahu</span>
            </a>
        </li>




    </ul>
</div>
<!-- Sidebar -->
</div>