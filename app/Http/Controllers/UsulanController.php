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

//================== USULAN BARU ======================
//|||||                                           |||||


    public function new_usulan()
    {
        return view('usulan.new_usulan');
    }

    public function usulan_baru()
    {
        $rs= DB::table('usulan')
        ->where('status','=','Baru')
        ->where('kelurahan','=',Auth::user()->username)
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
                'tgl_masuk'=>$created_at,
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
        try{
            DB::table('usulan')->where('id',$request->id)->update(
                [
                'status' => 'Cek Dinas'
                ]
             );
            echo "1|"  ;
         }catch(\Exception $e){
            echo "0|".$e ;
        }
    }


//|||||                                           |||||
//===================USULAN BARU=======================


//===================USULAN MASUK=======================
//||||                                             |||||

public function usulan_masuk()
    {
        $rs= DB::table('usulan')
        ->where('status','=','Cek Dinas')
        ->get();
      //dd($rs);
        return view('usulan.usulan_masuk', compact('rs'));
    }
//|||||                                            |||||
//===================USULAN MASUK=======================


//===================USULAN DICEK=======================
//||||                                             |||||

public function usulan_dicek()
    {
        $rs= DB::table('usulan')
        ->where('status','=','Cek Dinas')
        ->where('kelurahan','=',Auth::user()->username)
        ->get();
      //dd($rs);
        return view('usulan.usulan_dicek', compact('rs'));
    }
//|||||                                            |||||
//===================USULAN DICEK=======================



//===================USULAN RANKING=======================
//||||                                             |||||

public function usulan_ranking()
    {
        $rs= DB::table('usulan')
        ->where('status','=','Baru')
        ->where('kelurahan','=',Auth::user()->username)
        ->get();
      //dd($rs);
        return view('usulan.usulan_ranking', compact('rs'));
    }
//|||||                                            |||||
//===================USULAN RANKING=======================

//=================== USULAN ALL =======================
//||||                                             |||||

public function usulan_kelurahan($kelurahan)
    {
        $rs= DB::table('usulan')
        ->where('status','!=','Cek Dinas')
        ->where('kelurahan','=',$kelurahan)
        ->get();
      //dd($rs);
        return view('usulan.usulan_kelurahan', compact('rs'));
    }

    public function filter_usulan()
    {
        $rs= DB::table('master_kelurahan')
        ->get();
      //dd($rs);
        return view('usulan.filter_usulan', compact('rs'));
    }

//|||||                                            |||||
//=================== USULAN ALL =======================


//=================DOKUMEN UPLOAD=======================
//|||||                                            |||||

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


//|||||                                           |||||
//=================DOKUMEN UPLOAD======================



//===================== P E T A =======================
//|||||                                           |||||

public function peta_usulan()
    {
        $rs_baru= DB::table('usulan')
        ->where('x','!=','0')
        ->where('status','=','Baru')
        ->get();

        $rs_cek= DB::table('usulan')
        ->where('x','!=','0')
        ->where('status','=','Cek Dinas')
        ->orWhere('status','=','Perangkingan')
        ->get();
        $rs_kerja= DB::table('usulan')
        ->where('x','!=','0')
        ->where('status','=','Pelaksanaan')
        ->get();
        $rs_selesai= DB::table('usulan')
        ->where('x','!=','0')
        ->where('status','=','Selesai   ')
        ->get();
        //dd($rs);
        return view('usulan.peta_usulan', compact('rs_baru','rs_cek','rs_kerja','rs_selesai'));
    }
//|||||                                         |||||
//=================== P E T A =======================


}
