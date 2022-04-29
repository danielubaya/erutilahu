
//===================USULAN BARU=======================
//|||||                                           |||||



function new_usulan(){
	$("#utama").html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+'new_usulan';
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
	
  	
	var act =pubdir+'tambah_usulan';
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
	var act =pubdir+'usulan_baru';
    $.ajax({
        url: act,
        success: function(data){
			$("#utama").html(data);	
		}
    });
}


function show_xy(target,id){
	$("#"+target).html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+'show_xy/'+id;
    $.ajax({
        url: act,
        success: function(data){
			$("#"+target).html(data);	
		}
    });
}

function isi_modal_upload_dokumen(target,id){
	$("#"+target).html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+'isi_modal_upload_dokumen/'+id;
    $.ajax({
        url: act,
        success: function(data){
			$("#"+target).html(data);	
		}
    });
}

function isi_modal_setxy(target,id){
	$("#"+target).html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+'isi_modal_setxy/'+id;
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
	var act =pubdir+'update_xy';
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
	var act =pubdir+'show_profil/'+id;
    $.ajax({
        url: act,
        success: function(data){
			$("#"+target).html(data);	
		}
    });
}


function isi_modal_set_profil(target,id){
	$("#"+target).html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+'isi_modal_set_profil/'+id;
    $.ajax({
        url: act,
        success: function(data){
			$("#"+target).html(data);	
		}
    });
}


function update_profil_rumah(token,target,id){
	var st_adm_legal=$('#e_st_adm_legal').val();
	var st_adm_an=$('#e_st_adm_an').val();
	var st_adm_hasil=$('#e_st_adm_hasil').val();
	var st_tek_rusak=$('#e_st_tek_rusak').val();
	var st_tek_hasil=$('#e_st_tek_hasil').val();
	
    var act =pubdir+'update_profil_rumah';
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
	var act =pubdir+'kirim_ke_dinas';
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



//|||||                                           |||||
//===================USULAN BARU=======================

//===================USULAN MASUK======================
//|||||                                           |||||

function usulan_masuk(){
	$("#utama").html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+'usulan_masuk';
    $.ajax({
        url: act,
        success: function(data){
			$("#utama").html(data);	
		}
    });
}

//|||||
//===================USULAN MASUK======================


//===================USULAN DICEK======================
//|||||                                           |||||

function usulan_dicek(){
	$("#utama").html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+'usulan_dicek';
    $.ajax({
        url: act,
        success: function(data){
			$("#utama").html(data);	
		}
    });
}

//|||||
//===================USULAN DICEK======================


//===================USULAN RANKING======================
//|||||                                           |||||

function usulan_ranking(){
	$("#utama").html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+'usulan_ranking';
    $.ajax({
        url: act,
        success: function(data){
			$("#utama").html(data);	
		}
    });
}

//|||||
//===================USULAN RANKINGG======================


//===================USULAN ALL======================
//|||||                                           |||||

function usulan_kelurahan(kelurahan){
	$("#kedua").html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+'usulan_kelurahan/'+kelurahan;
    $.ajax({
        url: act,
        success: function(data){
			$("#kedua").html(data);	
		}
    });
}

function filter_usulan(){
	$("#utama").html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+'filter_usulan';
    $.ajax({
        url: act,
        success: function(data){
			$("#utama").html(data);	
		}
    });
}

//|||||
//===================USULAN ALL======================


//=================DOKUMEN UPLOAD======================
//|||||                                           |||||

function upload_file(token,folder,filenya,pesan,tersimpan)
{
	
	$('#'+pesan).html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+'upload_file';
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
		var act =pubdir+'daftar_file/'+folder+"/"+target;
   
		$.ajax({
			url: act,
			success: function(data){
				$('#'+target).html(data);
			}
		});
	}
	
	function hapus_file(token,folder,file,target)
	{
		var act =pubdir+'hapus_file';
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
	var act =pubdir+'list_dokumen/'+id+"/"+target;

	$.ajax({
		url: act,
		success: function(data){
			$('#'+target).html(data);
		}
	});

}

//|||||                                           |||||
//=================DOKUMEN UPLOAD======================


//=====================  P E T A ======================
//|||||                                           |||||

function peta_usulan(){
	$("#utama").html('<img src="'+pubdir+'minible/images/loading.gif">');	
	var act =pubdir+'peta_usulan';
    $.ajax({
        url: act,
        success: function(data){
			$("#utama").html(data);	
		}
    });
}


//|||||                                           |||||
//=====================  P E T A ======================
