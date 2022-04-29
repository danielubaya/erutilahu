

 <div class="row" >
 <div class="col-md-12" style="text-align:left">

<div class="note note-info" style="margin:4px"><B>Pilih file </B>

<?php	 
  $fo=public_path('DOKUMEN/').$id;
 if(is_dir($fo)){ 
 		$katabaru='baru';
 		?><br>
		File tersimpan :	<br>		
		<div id="tersimpan_<?php echo $id ?>">
			
		</div>
		<script>
			daftar_file('<?php echo $id ?>','tersimpan_<?php echo $id ?>');
		</script>
			
<?php } else { 
		$katabaru='';
		?>
		<div id="tersimpan_<?php echo $id ?>"></div>
		<?php } ?>

	<div class="row">
		<div class="col-md-6">
		Upload file <?php echo $katabaru ?>  :				
					<input class=' uneditable-input' id="file_<?php echo $id ?>"  name="file_<?php echo $id ?>" type="file" style='padding-top:0px;padding-left:2px;'></input>
		<br>
<button  style='width:120px; margin-top: 6px' class="btn btn-sm btn-info btn-block" 
 onclick="upload_file('<?php echo csrf_token() ?>','<?php echo $id ?>','file_<?php echo $id ?>','pesan_upload_<?php echo $id ?>','tersimpan_<?php echo $id ?>');">Upload</button>						
		</div>

 <div class="col-md-6" style="color: green; width:300px" id="pesan_upload_<?php echo $id ?>"></div>
 
 </div>
 
</div>	
</div>
</div>	
	
