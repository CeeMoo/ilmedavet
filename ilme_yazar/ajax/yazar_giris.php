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

	$yazaradgiris=$db->from('uyeler')
	->where('adi', $kullanici)
	//->where('sifre', $sifre)
	->first();

	if(!empty($yazaradgiris['adi'])){
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

		}elseif($yazarmi['onay'] != 1 || $yazarmi['rutbe'] == 1){
			echo alert('<strong>Malesef</strong>, Yazar girişine uygun değilsiniz.', 2);
		}
	}else{
		echo alert('<strong>Üye Değilsiniz</strong>, lütfen site iletişim bölümünden admin ile iletişime geçiniz.', 2);
	}

}else{
	echo alert('<strong>Boş Alan</strong>', 2);
}