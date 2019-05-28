<?php

$cikti_array=part_function($array=array('basicdb','basic'));

foreach($cikti_array as $cikti){
	require $cikti;
}

$hata='';


$id=p('id');
$dbe=p('db');


$say=$db->from($dbe)->select('count(id) as total')->where('id', $id)->total();

if($say > 0){
	$upla=$db->update($dbe)->where('id', $id)->set(['aktif' => 2]);

	if($upla){
		echo alert('Silme işlemi tamamdır.Silineni geri getirmek için Admin ile iletişime geçebilirsiniz.');
		echo '<script>$("tr#'.$id.'").stop().fadeOut(500);</script>';
	}
}else{
	echo alert('silinecek veri bulunamadı');
}