<?php

	$cikti_array=part_function($array=array('basicdb','basic'));

	foreach($cikti_array as $cikti){
		require $cikti;
	}

$slider=array('517.jpg', '621.jpg', '539.jpg', '640.jpg', '644.jpg', '675.jpg', '677.jpg');

$slider=$db->from('slider')->where('aktif', 1)->all();
	
$son_yazarlar=$db->from('yazar_makale')
				->select('baslik,slug,kisa_aciklama,uye_id')
				->where('aktif', 1)
				->limit(0,3)
				->orderby('id', 'desc')
				->all();

$yazili_dersler=$db->from('yazili_dersler')->where('aktif', 1)->limit(0,5)->all();
$goruntulu_dersler=$db->from('goruntulu_dersler')->where('aktif', 1)->limit(0,5)->all();
$sesli_dersler=$db->from('sesli_dersler')->where('aktif', 1)->limit(0,5)->all();