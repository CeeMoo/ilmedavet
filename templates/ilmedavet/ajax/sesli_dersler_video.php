<?php

	$id=p('id');

	$cikti_array=part_function($array=array('basicdb','basic'));

	foreach($cikti_array as $cikti){
		require $cikti;
	}
	
	$ses_ext=$db->from('sesli_extra')->where('id', $id)->first();

	if(empty($ses_ext))
		die('Sonuca ulaşılamadı');

	echo $ses_ext['aciklama'];
?>