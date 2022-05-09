<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class UsulanController extends Controller
{
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

 //================== USULAN BARU ===================\\
//                                                    \\


    public function new_usulan()
    {
        return view('usulan.new_usulan');
    }

    public function usulan_baru()
    {
        $rs= DB::table('usulan')
        ->where('status','=','Baru')
        ->where('kelurahan','=',Auth::user()->username)
        ->orderBy('tgl_surat')
        ->orderBy('no_surat')
        ->get();
      //dd($rs);
        return view('usulan.usulan_baru', compact('rs'));
    }

    public function tambah_usulan(Request $request)
    {
        //dd($request);
        $rs= DB::table('master_kelurahan')
        ->where('kelurahan','=',Auth::user()->username)
        ->first();
        $kecamatan=$rs->kecamatan;
        $kelurahan=$rs->kelurahan;
        $rayon=$rs->rayon;
	    $created_at=date('Y-m-d H:i:s');
        try{   
            DB::table('usulan')->insert(
                [
                'tgl_input'=>$created_at,
                'jenis'=>'Usulan Kelurahan',
                
                'nama'=>$request['nama'], 
                'nik' => $request['nik'],
                'kk' => $request['kk'], 
                'alamat' => $request['alamat'],
                'rt' => $request['rt'],
                'rw' => $request['rw'],
                'status' => 'Baru',
                'kelurahan'=>$kelurahan,
                'kecamatan'=>$kecamatan,
                'rayon'=>$rayon
                ]
             );
            echo "1"  ;
         }catch(\Exception $e){
            echo "0|".$e ;
        }
    }


    public function show_xy($id_berkas)
    {
        $rs= DB::table('usulan')
        ->find($id_berkas);
        //dd($r);
        echo "X=".$rs->x ." Y=".$rs->y;
    }


    public function isi_modal_setxy($id)
    {
        $r= DB::table('usulan')->find($id);
      //dd($rs);
        return view('usulan.isi_modal_setxy', compact('r'));
    }

    public function update_xy(Request $request)
    {
        //dd($request);
        try{
            DB::table('usulan')->where('id',$request->id)->update(
                ['x' => $request['x'],
                'y' => $request['y']
                ]
             );
            echo "1|"  ;
         }catch(\Exception $e){
            echo "0|".$e ;
        }
    }

    public function show_profil($id)
    {
        $r= DB::table('usulan')
        ->find($id);
        //dd($r);


        echo "<b>Status Adm. : ".$r->st_adm_hasil."</b><br>";
        echo "Legalitas : ".$r->st_adm_legal."<br/>";
        echo "Atas nama : ".$r->st_adm_an."<br/>";
        echo "<b>Status Teknis : ".$r->st_tek_hasil."</b><br>";
        echo "Kerusakan : ".$r->st_tek_rusak;
       
    }

    public function isi_modal_set_profil($id)
    {
        $r= DB::table('usulan')->find($id);
      //dd($rs);
        return view('usulan.isi_modal_set_profil', compact('r'));
    }

    public function update_profil_rumah(Request $request)
    {
        //dd($request);
        try{
            DB::table('usulan')->where('id',$request->id)->update(
                [
                    'st_adm_legal' => $request['st_adm_legal'],
                    'st_adm_an' => $request['st_adm_an'],
                    'st_adm_hasil' => $request['st_adm_hasil'],
                    'st_tek_rusak' => $request['st_tek_rusak'],
                    'st_tek_hasil' => $request['st_tek_hasil'],
                    
                ]
             );
            echo "1|"  ;
         }catch(\Exception $e){
            echo "0|".$e ;
        }
    }

    public function kirim_ke_dinas(Request $request)
    {

	    $tgl=date('Y-m-d H:i:s');
        try{
            DB::table('usulan')->where('id',$request->id)->update(
                [
                'status' => 'Cek Dinas',
                'tgl_masuk'=>$tgl
                ]
             );
            echo "1|"  ;
         }catch(\Exception $e){
            echo "0|".$e ;
        }
    }

    public function update_nosurat(Request $request)
    {
        //dd($request);
        $arr=explode("-",$request->tgl_surat);
        $tgl_surat=$arr[2]."-".$arr[1]."-".$arr[0];
        $arr=explode("|",$request->list);
        for($i=0;$i<count($arr)-1;$i++)
        {
            DB::table('usulan')->where('id',$arr[$i])->update(
                [
                'tgl_surat' => $tgl_surat,
                'no_surat'=>$request->no_surat
                ]
             );
        }

    }

 //===================USULAN MASUK==================\\
//                                                   \\

public function usulan_masuk($kelurahan)
    {
        if($kelurahan=='all')
        {
            $rs= DB::table('usulan')
            ->where('status','=','Cek Dinas')
            ->get();
        }
        else
        {
            $rs= DB::table('usulan')
            ->where('status','=','Cek Dinas')
            ->where('kelurahan','=',$kelurahan)
            ->get();
        }

      //dd($rs);
        return view('usulan.usulan_masuk', compact('rs'));
    }

    public function kirim_ke_kelurahan(Request $request)
    {

	    $tgl=date('Y-m-d H:i:s');
        try{
            DB::table('usulan')->where('id',$request->id)->update(
                [
                'status' => 'Baru',
                ]
             );
            echo "1|"  ;
         }catch(\Exception $e){
            echo "0|".$e ;
        }
    }

    public function kirim_ke_kotak(Request $request)
    {

	    $tgl=date('Y-m-d H:i:s');
        try{
            DB::table('usulan')->where('id',$request->id)->update(
                [
                'status' => 'Non Rutilahu',
                ]
             );
            echo "1|"  ;
         }catch(\Exception $e){
            echo "0|".$e ;
        }
    }


    public function kirim_ke_ranking(Request $request)
    {

	    $tgl=date('Y-m-d H:i:s');
        try{
            DB::table('usulan')->where('id',$request->id)->update(
                [
                'status' => 'Perankingan',
                ]
             );
            echo "1|"  ;
         }catch(\Exception $e){
            echo "0|".$e ;
        }
    }


 //===================USULAN DICEK===================\\
//                                                    \\

public function usulan_dicek()
    {
        $rs= DB::table('usulan')
        ->where('status','=','Cek Dinas')
        ->where('kelurahan','=',Auth::user()->username)
        ->get();
      //dd($rs);
        return view('usulan.usulan_dicek', compact('rs'));
    }


 //=================USULAN NON RUTIL=================\\
//                                                    \\

public function usulan_nonrutil($kelu)
    {
        if($kelu=='KELURAHAN')
        { 
            $kelu=Auth::user()->username;
            $pakaiheader=true;
        }
        else
        {
            $pakaiheader=false;
        }

        
        
        if($kelu!='all')
        {
            $rs= DB::table('usulan')
            ->where('status','=','Non Rutilahu')
            ->where('kelurahan','=',$kelu)
            ->get();
        }
        else
        {
            $rs= DB::table('usulan')
            ->where('status','=','Non Rutilahu')
            ->get();
        }
      //dd($rs);
        return view('usulan.usulan_nonrutil', compact('rs','pakaiheader'));
    }




 //===================USULAN RANKING===================\\
//                                                      \\

public function usulan_ranking()
    {

        $rs= DB::table('usulan')
        ->where('status','=','Perankingan')
        ->where('kelurahan','=',Auth::user()->username)
        ->orderBy('rank','asc')
        ->get();
        $arrNomorUdah=[
            false,false,false,false,false,
            false,false,false,false,false,
            false,false,false,false,false,false
        ];
        foreach($rs as $r)
        {
            if($r->rank!=0) $arrNomorUdah[$r->rank]=true;
        }
        $arrNomorBelum=[];
        for($i=1;$i<=15;$i++)
        {
            if($arrNomorUdah[$i]==false)
            {
                array_push($arrNomorBelum,$i);
            }
        }
      //dd($rs);
        return view('usulan.usulan_ranking', compact('rs','arrNomorBelum'));
    }


    public function usulan_ranking_ro($kelurahan)
    {
        if($kelurahan!='all')
        {
            $rs= DB::table('usulan')
            ->where('status','=','Perankingan')
            ->where('kelurahan','=',$kelurahan)
            ->orderBy('rank','asc')
            ->get();
        }
        else
        {
            $rs= DB::table('usulan')
            ->where('status','=','Perankingan')
            ->orderBy('rank','asc')
            ->get();
        }
        
        return view('usulan.usulan_ranking_ro', compact('rs','kelurahan'));
    }




    public function update_rank(Request $request)
    {
        //dd($request);
        try{
            DB::table('usulan')->where('id',$request->id)->update(
                ['rank' => $request['rank']
                ]
             );
            echo "1|"  ;
         }catch(\Exception $e){
            echo "0|".$e ;
        }
    }

    public function kirim_rank(Request $request)
    {
        //dd($request);
        try{
            DB::table('usulan')
            ->where('kelurahan','=',Auth::user()->username)
            ->where('rank','<',99)
            ->update(
                ['status' => 'Daftar Tunggu'
                ]
             );
            echo "1|"  ;
         }catch(\Exception $e){
            echo "0|".$e ;
        }
    }


 //=================USULAN DAFTAR TUNGGU=================\\
//                                                    \\

public function usulan_daftartunggu($kelu)
{
    if($kelu=='KELURAHAN')
    { 
        $kelu=Auth::user()->username;
        $pakaiheader=true;
    }
    else
    {
        $pakaiheader=false;
    }
    if($kelu!='all')
    {
        $rs= DB::table('usulan')
        ->where('status','=','Daftar Tunggu')
        ->where('kelurahan','=',$kelu)
        ->orderBy('rank')
        ->get();
    }
    else
    {
        $rs= DB::table('usulan')
        ->where('status','=','Daftar Tunggu')
        ->orderBy('rank')
        ->get();
    }
  //dd($rs);
    return view('usulan.usulan_daftartunggu', compact('rs','pakaiheader'));
}


public function mulai_pengerjaan(Request $request)
{

    $tgl=date('Y-m-d H:i:s');
    try{
        DB::table('usulan')->where('id',$request->id)->update(
            [
            'status' => 'Pengerjaan',
            ]
         );
        echo "1|"  ;
     }catch(\Exception $e){
        echo "0|".$e ;
    }
}



 //=================USULAN PENGERJAAN=================\\
//                                                    \\

public function usulan_pengerjaan($kelu)
    {
        if($kelu=='KELURAHAN')
        { 
            $kelu=Auth::user()->username;
            $pakaiheader=true;
        }
        else
        {
            $pakaiheader=false;
        }
        if($kelu!='all')
        {
            $rs= DB::table('usulan')
            ->where('status','=','Pengerjaan')
            ->where('kelurahan','=',$kelu)
            ->get();
        }
        else
        {
            $rs= DB::table('usulan')
            ->where('status','=','Pengerjaan')
            ->get();
        }
      //dd($rs);
        return view('usulan.usulan_pengerjaan', compact('rs','pakaiheader'));
    }



    public function selesai_pengerjaan(Request $request)
    {
    
        $tgl=date('Y-m-d H:i:s');
        try{
            DB::table('usulan')->where('id',$request->id)->update(
                [
                'status' => 'Selesai',
                ]
             );
            echo "1|"  ;
         }catch(\Exception $e){
            echo "0|".$e ;
        }
    }
    




 //=================USULAN SELESAI=================\\
//                                                    \\

public function usulan_selesai($kelu)
    {
        if($kelu=='KELURAHAN')
        { 
            $kelu=Auth::user()->username;
            $pakaiheader=true;
        }
        else
        {
            $pakaiheader=false;
        }
        if($kelu!='all')
        {
            $rs= DB::table('usulan')
            ->where('status','=','Selesai')
            ->where('kelurahan','=',$kelu)
            ->get();
        }
        else
        {
            $rs= DB::table('usulan')
            ->where('status','=','Selesai')
            ->get();
        }
      //dd($rs);
        return view('usulan.usulan_selesai', compact('rs','pakaiheader'));
    }





 //=================== USULAN ALL =======================\\
//                                                        \\

public function usulan_kelurahan($kelurahan)
    {
        if($kelurahan=='all')
        {
            $rs= DB::table('usulan')
            ->where('status','=','Baru')
            ->get();
        }
        else
        {
            $rs= DB::table('usulan')
            ->where('status','=','Baru')
            ->where('kelurahan','=',$kelurahan)
            ->get();
        }
      //dd($rs);
        return view('usulan.usulan_kelurahan', compact('rs'));
    }

    public function filter_usulan($tahap)
    {
        $rs= DB::table('master_kelurahan')
        ->orderBy('kelurahan')
        ->get();
      //dd($rs);
        return view('usulan.filter_usulan', compact('rs','tahap'));
    }



 //=================DOKUMEN UPLOAD=====================\\
//                                                      \\

    public function isi_modal_upload_dokumen($id)
    {
        
        return view('usulan.isi_modal_upload_dokumen',compact('id'));
    }

    public function upload_file( Request $request)
    {

        $error = "";
        $msg = "";
        $filenya = $request->filenya;
        $folder=$request->folder;
        
        
        
        //echo "<script>alert('".$_FILES[$_GET[id]]['tmp_name']."')</script>";
        if(!empty($_FILES[$filenya]['error']))
        {
            switch($_FILES[$filenya]['error'])
            {

                case '1':
                    $error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
                    break;
                case '2':
                    $error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
                    break;
                case '3':
                    $error = 'The uploaded file was only partially uploaded';
                    break;
                case '4':
                    $error = 'No file was uploaded.';
                    break;

                case '6':
                    $error = 'Missing a temporary folder';
                    break;
                case '7':
                    $error = 'Failed to write file to disk';
                    break;
                case '8':
                    $error = 'File upload stopped by extension';
                    break;
                case '999':
                default:
                    $error = 'No error code avaiable';
            }
        }elseif(empty($_FILES[$filenya]['tmp_name']) || $_FILES[$filenya]['tmp_name'] == 'none')
        {
            $error = 'No file was uploaded..';
        }else 
        {
                $msg .= " File " . $_FILES[$filenya]['name'] . ", ";
                $msg .= " dengan ukuran " . @filesize($_FILES[$filenya]['tmp_name']);
                $msg .= " bytes selesai diupload.";
                //for security reason, we force to remove all uploaded file
                //@unlink($_FILES['fileToUpload']);		
        }		
        $path = $_FILES[$filenya]['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        
        
        $folder=public_path('DOKUMEN/').$folder;
        @mkdir($folder);

        
        
        $target=$folder . "/".$path;
        //$msg .= $target;
        @unlink($target);
        
        $daftar="";
        /*
        if ($dh = opendir($folder	)){
        while (($f = readdir($dh)) !== false){
        if(($f!='.') and ($f!='..') ){	
        $daftar= $daftar."|". $f ;
        }}
        closedir($dh);
        }
        */
        $daftar= $daftar."|". $path ;
        $msg=$msg."***".$daftar;
        echo "{";
        echo				"error: '" . $error . "',\n";
        echo				"msg: '" . $msg . "',\n";
        echo				"target: '" . $target . "'\n";
        
        echo "}";
        $data = $request->file($filenya);
        $data->move($folder, $path)  ;  
        
    }


    public function daftar_file($folder,$target)
    {
        
        return view('usulan.daftar_file',compact('folder','target'));
    }

    public function hapus_file( Request $request)
    {

        $error = "";
        $msg = "";
        $file = $request->file;
        $folder=$request->folder;
        $path=public_path('DOKUMEN/').$folder."/".$file;
        unlink($path);
        
    }


    public function list_dokumen($id,$target)
    {
        
        return view('usulan.list_dokumen',compact('id','target'));
    }




    public function upload_file_ba( Request $request)
    {

        $error = "";
        $msg = "";
        $filenya = $request->filenya;
        $folder=$request->folder;
        //echo "<script>alert('".$_FILES[$_GET[id]]['tmp_name']."')</script>";
        if(!empty($_FILES[$filenya]['error']))
        {
            switch($_FILES[$filenya]['error'])
            {

                case '1':
                    $error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
                    break;
                case '2':
                    $error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
                    break;
                case '3':
                    $error = 'The uploaded file was only partially uploaded';
                    break;
                case '4':
                    $error = 'No file was uploaded.';
                    break;

                case '6':
                    $error = 'Missing a temporary folder';
                    break;
                case '7':
                    $error = 'Failed to write file to disk';
                    break;
                case '8':
                    $error = 'File upload stopped by extension';
                    break;
                case '999':
                default:
                    $error = 'No error code avaiable';
            }
        }elseif(empty($_FILES[$filenya]['tmp_name']) || $_FILES[$filenya]['tmp_name'] == 'none')
        {
            $error = 'No file was uploaded..';
        }else 
        {
                $msg .= " File " . $_FILES[$filenya]['name'] . ", ";
                $msg .= " dengan ukuran " . @filesize($_FILES[$filenya]['tmp_name']);
                $msg .= " bytes selesai diupload.";
                //for security reason, we force to remove all uploaded file
                //@unlink($_FILES['fileToUpload']);		
        }		
        $path = $_FILES[$filenya]['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        
        
        $folder=public_path('DOKUMEN_BA/').$folder;
        @mkdir($folder);

        
        
        $target=$folder . "/".$path;
        //$msg .= $target;
        @unlink($target);
        
        $daftar="";
        /*
        if ($dh = opendir($folder	)){
        while (($f = readdir($dh)) !== false){
        if(($f!='.') and ($f!='..') ){	
        $daftar= $daftar."|". $f ;
        }}
        closedir($dh);
        }
        */
        $daftar= $daftar."|". $path ;
        $msg=$msg."***".$daftar;
        echo "{";
        echo				"error: '" . $error . "',\n";
        echo				"msg: '" . $msg . "',\n";
        echo				"target: '" . $target . "'\n";
        
        echo "}";
        $data = $request->file($filenya);
        $data->move($folder, $path)  ;  
        
    }


    public function daftar_file_ba($folder,$target)
    {
        
        return view('usulan.daftar_file_ba',compact('folder','target'));
    }

    public function hapus_file_ba( Request $request)
    {

        $error = "";
        $msg = "";
        $file = $request->file;
        $folder=$request->folder;
        $path=public_path('DOKUMEN_BA/').$folder."/".$file;
        unlink($path);
        
    }



 //===================== P E T A ======================\\
//                                                      \\

public function peta_usulan()
    {
        $rs_baru= DB::table('usulan')
        ->where('x','!=','0')
        ->where('status','=','Perankingan')
        ->get();

        $rs_cek= DB::table('usulan')
        ->where('x','!=','0')
        ->where('status','=','Cek Dinas')
        ->orWhere('status','=','Daftar Tunggu')
        ->get();
        $rs_kerja= DB::table('usulan')
        ->where('x','!=','0')
        ->where('status','=','Pengerjaan')
        ->get();
        $rs_selesai= DB::table('usulan')
        ->where('x','!=','0')
        ->where('status','=','Selesai')
        ->get();
        //dd($rs);
        return view('usulan.peta_usulan', compact('rs_baru','rs_cek','rs_kerja','rs_selesai'));
    }

}
