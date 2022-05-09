
 //===================USULAN BARU===================\\
//                                                   \\

function new_usulan(){
	$("#utama").html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+arguments.callee.name;;
    $.ajax({
        url: act,
        success: function(data){
			$("#utama").html(data);	
		}
    });
}


function tambah_usulan(token){
	var nama=$("#new_nama").val();
	var nik=$("#new_nik").val();
	var kk=$("#new_kk").val();
	var alamat=$("#new_alamat").val();
	var rt=$("#new_rt").val();
	var rw=$("#new_rw").val();
	
  	
	var act =pubdir+arguments.callee.name;;
    $.ajax({
		type:'POST',
		url:act,
		data:{
			'_token': token,
			nama:nama,
			nik:nik,
			kk:kk,
			alamat:alamat,
			rt:rt,
			rw:rw
			  },
			success: function(data)
        {
        	//$("#utama").html(data);
        	var arr=data.split("|");
        	if(arr[0]==1)
        	{
				$('.modal-backdrop.fade.show').remove();
				alert("Data telah tersimpan.");		
				usulan_baru();
        	}
        	else
        	{
        		console.log(arr[1]);
        		alert("Data  gagal tersimpan.  "+ arr[1]);		
        	}
        	
        	//daftar_pemohon();
		}
    });
}



function usulan_baru(){
	$("#utama").html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+arguments.callee.name;
    $.ajax({
        url: act,
        success: function(data){
			$("#utama").html(data);	
		}
    });
}


function show_xy(target,id){
	$("#"+target).html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+arguments.callee.name+'/'+id;
    $.ajax({
        url: act,
        success: function(data){
			$("#"+target).html(data);	
		}
    });
}

function isi_modal_upload_dokumen(target,id){
	$("#"+target).html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+arguments.callee.name+'/'+id;
    $.ajax({
        url: act,
        success: function(data){
			$("#"+target).html(data);	
		}
    });
}

function isi_modal_setxy(target,id){
	$("#"+target).html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+arguments.callee.name+'/'+id;
    $.ajax({
        url: act,
        success: function(data){
			$("#"+target).html(data);	
		}
    });
}


function  update_xy(token,id){
    var x=$("#new_x").val();

	var y=$("#new_y").val();
	var act =pubdir+arguments.callee.name;
    $.ajax({
		type:'POST',
		url:act,
		data:{
			'_token': token,
            id:id,
			x:x,
			y:y
			  },
			success: function(data)
        {
        	//$("#utama").html(data);
        	var arr=data.split("|");
        	if(arr[0]==1)
        	{
				$('.modal-backdrop.fade.show').remove();
				$('body').removeClass('modal-open');
				$("body").css("overflow", "auto");
				alert("Berhasil mengupdate X,Y");		
				show_xy("div_xy_"+id,id);
        	}
        	else
        	{
        		console.log(arr[1]);
        		alert("Data gagal tersimpan.  "+ arr[1]);		
        	}
        	
        	//daftar_pemohon();
		}
    });
}

function show_profil(target,id){
	$("#"+target).html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+arguments.callee.name+'/'+id;
    $.ajax({
        url: act,
        success: function(data){
			$("#"+target).html(data);	
		}
    });
}


function isi_modal_set_profil(target,id){
	$("#"+target).html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+arguments.callee.name+'/'+id;
    $.ajax({
        url: act,
        success: function(data){
			$("#"+target).html(data);	
		}
    });
}


function update_profil_rumah(token,target,id){
	var st_adm_legal=$('#e_st_adm_legal').val();
	if(st_adm_legal=='Lainnya') st_adm_legal=$('#e_st_adm_legal_lain').val();
	var st_adm_an=$('#e_st_adm_an').val();
	if(st_adm_an=='Lainnya') st_adm_an=$('#e_st_adm_an_lain').val();
	var st_adm_hasil;
	if($('#selectDiv').is(':visible')){
	}
	st_adm_hasil=$('#e_st_adm_hasil').val();
	var st_tek_rusak=$('#e_st_tek_rusak').val();
	var st_tek_hasil=$('#e_st_tek_hasil').val();
	
    var act =pubdir+arguments.callee.name;
    $.ajax({
		type:'POST',
		url:act,
		data:{
			'_token': token,
			id:id,
			st_adm_legal:st_adm_legal,
			st_adm_an:st_adm_an,
			st_adm_hasil:st_adm_hasil,
			st_tek_rusak:st_tek_rusak,
			st_tek_hasil:st_tek_hasil
			  },
			success: function(data)
        {
			
			$('.modal-backdrop.fade.show').remove();
			$('body').removeClass('modal-open');
			$("body").css("overflow", "auto");
			show_profil(target,id);
		}
    });


}


function kirim_ke_dinas(token,id){
	var act =pubdir+arguments.callee.name;
    $.ajax({
		type:'POST',
		url:act,
		data:{
			'_token': token,
            id:id,
		},
        success: function(data){
			alert('berkas masuk ke dinas');
			$('#tr_usulan_'+id).hide();
		}
    });
}


function update_nosurat(token,list){
	var act =pubdir+arguments.callee.name;

	var no_surat=$('#set_no_surat').val();
	var tgl_surat=$('#set_tgl_surat').val();
    $.ajax({
		type:'POST',
		url:act,
		data:{
			'_token': token,
            list:list,
			no_surat:no_surat,
			tgl_surat:tgl_surat
		},
        success: function(data){
			usulan_baru();
			//alert('berkas masuk ke dinas');
			//$('#tr_usulan_'+id).hide();
		}
    });
}

 //===================USULAN MASUK====================\\
//                                                     \\

function usulan_masuk(kelurahan){
	$("#kedua").html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+arguments.callee.name+'/'+kelurahan;
    $.ajax({
        url: act,
        success: function(data){
			$("#kedua").html(data);	
		}
    });
}


function kirim_ke_kelurahan(token,id){
	var act =pubdir+arguments.callee.name;
    $.ajax({
		type:'POST',
		url:act,
		data:{
			'_token': token,
            id:id,
		},
        success: function(data){
			alert('berkas kembali ke kelurahan');
			$('#tr_usulan_'+id).hide();
		}
    });
}


function kirim_ke_kotak(token,id){
	var act =pubdir+arguments.callee.name;
    $.ajax({
		type:'POST',
		url:act,
		data:{
			'_token': token,
            id:id,
		},
        success: function(data){
			alert('berkas masuk sebagai Non Rutilahu');
			$('#tr_usulan_'+id).hide();
		}
    });
}


function kirim_ke_ranking(token,id){
	var act =pubdir+arguments.callee.name;
    $.ajax({
		type:'POST',
		url:act,
		data:{
			'_token': token,
            id:id,
		},
        success: function(data){
			alert('berkas masuk ke Perankingan');
			$('#tr_usulan_'+id).hide();
		}
    });
}


 //===================USULAN DICEK=====================\\
//                                                      \\

function usulan_dicek(){
	$("#utama").html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+arguments.callee.name;
    $.ajax({
        url: act,
        success: function(data){
			$("#utama").html(data);	
		}
    });
}


function kirim_ke_ranking(token,id){
	var act =pubdir+arguments.callee.name;
    $.ajax({
		type:'POST',
		url:act,
		data:{
			'_token': token,
            id:id
		},
        success: function(data){
			alert('berkas masuk ke Perankingan');
			$('#tr_usulan_'+id).hide();
		}
    });
}


 //================USULAN NON RUTILAHU=================\\
//                                                      \\

function usulan_nonrutil(kelurahan){
	var temp="#utama";
	if(kelurahan!='KELURAHAN') temp="#kedua";
	$(temp).html('<img src="'+pubdir+'minible/images/loading.gif">');	
	//alert(temp);
	var act =pubdir+arguments.callee.name+'/'+kelurahan;;
    $.ajax({
        url: act,
        success: function(data){
			$(temp).html(data);	
		}
    });
}


 //===================USULAN RANKING====================\\
//                                                       \\

function usulan_ranking(){
	$("#utama").html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+arguments.callee.name;
    $.ajax({
        url: act,
        success: function(data){
			$("#utama").html(data);	
		}
    });
}


function update_rank(token,id,rank){
	var act =pubdir+arguments.callee.name;
    $.ajax({
		type:'POST',
		url:act,
		data:{
			'_token': token,
            id:id,
			rank:rank
		},
        success: function(data){
			usulan_ranking()
		}
    });
}


function kirim_rank(token){
	var act =pubdir+arguments.callee.name;
    $.ajax({
		type:'POST',
		url:act,
		data:{
			'_token': token,
		},
        success: function(data){
			usulan_ranking()
		}
    });
}



function usulan_ranking_ro(kelurahan){
	$("#kedua").html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+arguments.callee.name+'/'+kelurahan;
    $.ajax({
        url: act,
        success: function(data){
			$("#kedua").html(data);	
		}
    });
}

 //================USULAN DAFTAR TUNGGU================\\
//                                                      \\

function usulan_daftartunggu(kelurahan){
	var temp="#utama";
	if(kelurahan!='KELURAHAN') temp="#kedua";
	$(temp).html('<img src="'+pubdir+'minible/images/loading.gif">');	
	//alert(temp);
	var act =pubdir+arguments.callee.name+'/'+kelurahan;;
    $.ajax({
        url: act,
        success: function(data){
			$(temp).html(data);	
		}
    });
}


function mulai_pengerjaan(token,id){
	var act =pubdir+arguments.callee.name;
    $.ajax({
		type:'POST',
		url:act,
		data:{
			'_token': token,
            id:id
		},
        success: function(data){
			alert('Usulan Rutilahu mulai dikerjakan');
			$('#tr_usulan_'+id).hide();
		}
    });
}




 //================ PENGERJAAN================\\
//                                                      \\

function usulan_pengerjaan(kelurahan){
	var temp="#utama";
	if(kelurahan!='KELURAHAN') temp="#kedua";
	$(temp).html('<img src="'+pubdir+'minible/images/loading.gif">');	
	//alert(temp);
	var act =pubdir+arguments.callee.name+'/'+kelurahan;;
    $.ajax({
        url: act,
        success: function(data){
			$(temp).html(data);	
		}
    });
}



function selesai_pengerjaan(token,id){
	var act =pubdir+arguments.callee.name;
    $.ajax({
		type:'POST',
		url:act,
		data:{
			'_token': token,
            id:id
		},
        success: function(data){
			alert('Usulan Rutilahu selesai dikerjakan');
			$('#tr_usulan_'+id).hide();
		}
    });
}


//================ SELESAI ================\\
//                                                      \\

function usulan_selesai(kelurahan){
	var temp="#utama";
	if(kelurahan!='KELURAHAN') temp="#kedua";
	$(temp).html('<img src="'+pubdir+'minible/images/loading.gif">');	
	//alert(temp);
	var act =pubdir+arguments.callee.name+'/'+kelurahan;;
    $.ajax({
        url: act,
        success: function(data){
			$(temp).html(data);	
		}
    });
}





 //===================USULAN ALL======================\\
//                                                     \\

function usulan_kelurahan(kelurahan){
	$("#kedua").html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+arguments.callee.name+'/'+kelurahan;
    $.ajax({
        url: act,
        success: function(data){
			$("#kedua").html(data);	
		}
    });
}

function filter_usulan(tahap){
	$("#utama").html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+arguments.callee.name+'/'+tahap;;
    $.ajax({
        url: act,
        success: function(data){
			$("#utama").html(data);	
		}
    });
}



 //=================DOKUMEN UPLOAD===================\\
//                                                    \\

function upload_file(token,folder,filenya,pesan,tersimpan)
{
	
	$('#'+pesan).html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+arguments.callee.name;
	$.ajaxFileUpload
		(
			{
				url:act ,
				secureuri:false,
				fileElementId :filenya,
				data:{"filenya":filenya,"folder":folder,'_token': token},
				dataType: 'json',
				success: function (data,status)
				{
					
					if(data.error != '')
					{
						alert(data.error);
					}else
					{
						var arrmsg=data.msg.split('***');
						$('#'+pesan).html(arrmsg[0]);
						daftar_file(folder,tersimpan);

						list_dokumen(folder,"ol_"+folder);
					}
					
				
					
				}
				
			}
		)
		
		
		return false;

	}


	function daftar_file(folder,target)
	{
		$("#"+target).html('<img src="'+pubdir+'minible/images/loading.gif">');	
		var act =pubdir+arguments.callee.name+'/'+folder+"/"+target;
   
		$.ajax({
			url: act,
			success: function(data){
				$('#'+target).html(data);
			}
		});
	}
	
	function hapus_file(token,folder,file,target)
	{
		var act =pubdir+arguments.callee.name;
    	$.ajax({
		type:'POST',
		url:act,
		data:{
			'_token': token,
			folder:folder,
			file:file
			  },
			success: function(data){
				daftar_file(folder,target);
				list_dokumen(folder,"ol_"+folder);
			}
		});
	}


	
function list_dokumen(id,target)
{
	$("#"+target).html('<img src="'+pubdir+'minible/images/loading.gif">');	
		
	var act =pubdir+arguments.callee.name+'/'+id+"/"+target;

	$.ajax({
		url: act,
		success: function(data){
			$('#'+target).html(data);
		}
	});

}





function upload_file_ba(token,folder,filenya,pesan,tersimpan)
{
	
	$('#'+pesan).html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+arguments.callee.name;
	$.ajaxFileUpload
		(
			{
				url:act ,
				secureuri:false,
				fileElementId :filenya,
				data:{"filenya":filenya,"folder":folder,'_token': token},
				dataType: 'json',
				success: function (data,status)
				{
					
					if(data.error != '')
					{
						alert(data.error);
					}else
					{
						var arrmsg=data.msg.split('***');
						$('#'+pesan).html(arrmsg[0]);
						daftar_file_ba(folder,tersimpan);

					}
					
				
					
				}
				
			}
		)
		
		
		return false;

	}


	function daftar_file_ba(folder,target)
	{
		$("#"+target).html('<img src="'+pubdir+'minible/images/loading.gif">');	
		var act =pubdir+arguments.callee.name+'/'+folder+"/"+target;
   
		$.ajax({
			url: act,
			success: function(data){
				$('#'+target).html(data);
			}
		});
	}
	
	function hapus_file_ba(token,folder,file,target)
	{
		var act =pubdir+arguments.callee.name;
    	$.ajax({
		type:'POST',
		url:act,
		data:{
			'_token': token,
			folder:folder,
			file:file
			  },
			success: function(data){
				daftar_file_ba(folder,target);
			}
		});
	}



 //=====================  P E T A ======================\\
//                                                       \\

function peta_usulan(){
	$("#utama").html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+arguments.callee.name;
    $.ajax({
        url: act,
        success: function(data){
			$("#utama").html(data);	
		}
    });
}
