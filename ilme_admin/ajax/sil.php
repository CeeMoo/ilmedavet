<?php

$cikti_array=part_function($array=array('basicdb','basic'));

foreach($cikti_array as $cikti){
	require $cikti;
}

$hata='';


$id=p('id');
$dbe=p('db');


$say=$db->from($dbe)->select('count(id) as total')->where('id', $id)->total();
	
if($say < 1)
	return false;

$hata='Silme işlemi başarısız.';
$sil_tam='Silme işlemi tamamlandı.';

switch($dbe){
	case 'slider':
		$veri=$db->from($dbe)->where('id', $id)->first();

		if(!empty($veri['resim'])){
			$resim=$veri['resim'];

			if(file_exists(ANAYOL.$resim)){unlink(ANAYOL.$resim);}
		}

		$sil=$db->delete($dbe)->where('id', $id)->done();
	break;

	case 'uyeler':
		$sil=false;
		
		if($id == 1){
			$hata='Bu üyeyi silemezsiniz';
		}else{
			$sil=$db->delete($dbe)->where('id', $id)->done();
		}
	break;

	default:
		$sil=$db->delete($dbe)->where('id', $id)->done();
	break;
}


if($sil){
	echo alert($sil_tam, 3);
	echo '<script>$("tr#'.$id.'").stop().fadeOut(500);</script>';
}else{
	echo alert($hata, 2);
}