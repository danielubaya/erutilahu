<?php
//$fo='../dokumen/'.$r[id_pra].'/'.$arrFolderDokumen[$i];
try{

$fo= public_path('DOKUMEN/').$id;
$fo2=asset('DOKUMEN')."/".$id;
	if ($dh = opendir($fo)){
    while (($f = readdir($dh)) !== false){
    	if(($f!='.') and ($f!='..') ){
			
      ?>
        
      	<li><a href="<?php echo $fo2 ?>/<?php echo $f ?>" class="" target="_blank"><?php echo $f ?>  </a> </li>
      	  
      <?php
    }}
  	  closedir($dh);
  	}
}
catch(Exception $e)
{

}
	?>