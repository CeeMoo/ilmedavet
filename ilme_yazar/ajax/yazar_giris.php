<?php

$cikti_array=part_function($array=array('post_islem','basicdb','basic'));

foreach($cikti_array as $cikti){
	require $cikti;
}

if(!empty(p('kullanici')) && !empty(p('sifre'))){
	$kullanici=p('kullanici');
	$sifre=p('sifre');
	$sifre=md5($sifre);

	//debugger($db->from('uyeler')->run());

	$yazarmi=$db->from('uyeler')
	->where('adi', $kullanici)
	->where('sifre', $sifre)
	->first();


	if(!empty($yazarmi['id']) && !empty($yazarmi['adi']) && $yazarmi['rutbe'] == 2 && $yazarmi['onay'] == 1){
		$yazar_giris=array(
			'login' => true,
			'id' => $yazarmi['id'],
			'adi' => $yazarmi['adi'],
			'rutbe' => $yazarmi['rutbe']
		);
		session_olustur($yazar_giris);
			go(url_yazar, 'js');
	}else{
		echo alert('<strong>Malesef</strong>, Yazar girişine uygun değilsiniz.', 2);
	}
}else{
	echo alert('<strong>Boş Alan</strong>', 2);
}