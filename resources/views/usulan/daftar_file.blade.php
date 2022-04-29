<ul>
<?php
//$fo='../dokumen/'.$r[id_pra].'/'.$arrFolderDokumen[$i];
$fo= public_path('DOKUMEN/').$folder;
	if ($dh = opendir($fo)){
    while (($f = readdir($dh)) !== false){
    	if(($f!='.') and ($f!='..') ){
			
      ?>
        
      	<li><a href="{{asset('/DOKUMEN')}}/<?php echo $folder ?>/<?php echo $f ?>" class="" target="_blank"><?php echo $f ?>  </a> &nbsp;&nbsp;<i onclick="if(confirm('apakah anda yakin untuk menghapus file <?php echo $f ?> ini?')) hapus_file('<?php echo csrf_token() ?>','<?php echo $folder ?>','<?php echo $f ?>','<?php echo $target ?>')" style='color:red' class='fa fa-times'></i> </li>
      	  
      <?php
    }}
  	  closedir($dh);
  	}
	?>
	</ul>