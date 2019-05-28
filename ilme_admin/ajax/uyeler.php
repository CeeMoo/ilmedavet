<?php

$cikti_array=part_function($array=array('post_islem','basicdb','basic'));

foreach($cikti_array as $cikti){
	require $cikti;
}

$hata='';

$yap = p('yap');

switch ($yap) {
	case 'duzenle':
		$id=p('id');
		$rutbe=p('rutbe');
		$onay=p('onay');
		$adi=p('adi');
		$slug=sef_link($adi);
		$sifre=p('sifre');

		$sifre_ayni=$db->from('uyeler')->where('sifre', $sifre)->where('id', $id)->first();

		if(empty($sifre_ayni)){$sifre=md5($sifre);}

		if(empty($adi) || empty($sifre)){$hata='Lütfen gerekli alanları boş bırakmayın<br />';}

		$var_mi=$db->from('uyeler')->where('adi', $adi)->where('id', $id, '!=')->first();

		if(!empty($var_mi)){$hata.='Böyle bir üye bulunuyor.<br />';}

		if(!empty($hata)){
			echo alert($hata);
		}else{
			$upla=$db->update('uyeler')->where('id', $id)
			->set(array(
				'adi' => $adi,
				'slug' => $slug,
				'sifre' => $sifre,
				'onay' => $onay,
				'rutbe' => $rutbe,
			));

			if($upla){
				echo alert('Düzenleme işlemi başarılıdır.', 3);
				go(url_admin.'?sayfa=uyeler', 'js', 2);
			}else{
				echo alert('Başarısız işlem lütfen sistem yetkilisi ile görüşün', 2);
			}
		}
	break;

	case 'ekle':
		$id=p('id');
		$rutbe=p('rutbe');
		$onay=p('onay');
		$adi=p('adi');
		$slug=sef_link($adi);
		$sifre=p('sifre');

		if(empty($adi) || empty($sifre)){
			$hata.='Lütfen gerekli alanları boş bırakmayın<br />';
		}else{
			$sifre=md5($sifre);

			$var_mi=$db->from('uyeler')->where('adi', $adi)->first();

			if(!empty($var_mi)){$hata.='Böyle bir üye bulunuyor.<br />';}
		}


		if(!empty($hata)){
			echo alert($hata);
		}else{
			$ekle=$db->insert('uyeler')->set(array('adi'=>$adi,'slug'=>$slug,'sifre'=>$sifre,'onay' => $onay,'rutbe' => $rutbe));

			if($ekle){
				echo alert('Yeni Üye eklendi: '.$adi, 3);
				go(url_admin.'?sayfa=uyeler', 'js', 2);
			}else{
				echo alert('Başarısız işlem lütfen sistem yetkilisi ile görüşün', 2);
			}
		}
	break;
	
	default:
		die('Başarısız İşlem');
	break;
}