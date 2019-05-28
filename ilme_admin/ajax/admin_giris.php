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

	$adminmi=$db->from('uyeler')->where('adi', $kullanici)->where('sifre', $sifre)->first();

	if(!empty($adminmi['id']) && !empty($adminmi['adi']) && $adminmi['rutbe'] == 1 && $adminmi['onay'] == 1){
		$admin_giris=array(
			'login' => true,
			'id' => $adminmi['id'],
			'adi' => $adminmi['adi'],
			'rutbe' => $adminmi['rutbe']
		);
		session_olustur($admin_giris);
			go(url_admin, 'js');
	}else{
		echo alert('<strong>Malesef</strong>, Admin girişine uygun değilsiniz.', 2);
	}
}else{
	echo alert('<strong>Boş Alan</strong>', 2);
}