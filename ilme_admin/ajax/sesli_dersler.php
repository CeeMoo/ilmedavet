<?php

$cikti_array=part_function($array=array('post_islem','basicdb','basic'));

foreach($cikti_array as $cikti){
	require $cikti;
}

$hata='';

$yap = p('yap');


switch ($yap) {
	case 'ekle':
		$baslik=p('baslik');
		$aciklama=$_POST['aciklama'];
		//$aciklama=p('aciklama', false);
		$kisa_aciklama=p('kisa_aciklama');
		$kat_id=p('kat_id');
		$aktif=p('aktif');

		if(empty($baslik) || empty($aciklama)){
			$hata.='Gerekli alanları doldurmanız gerekmektedir<br />';
		}

		if(!empty($hata)){
			echo alert($hata);
		}else{
			$slug=sef_link($baslik);
			$ekle=$db->insert('sesli_dersler')->set(array(
				'baslik' => $baslik,
				'slug' => $slug,
				'uye_id' => session('id'),
				'aciklama' => $aciklama,
				'kat_id' => $kat_id,
				'kisa_aciklama' => $kisa_aciklama,
				'aktif' => $aktif,
			));

			if($ekle){
				echo alert('Ekleme işlemi başarılıdır.', 3);
				go(url_admin.'?sayfa=sesli_dersler', 'js', 2);
			}else{
				echo alert('Başarısız işlem lütfen sistem yetkilisi ile görüşün', 2);
			}

		}
	break;
	case 'duzenle':
		$id=p('id');
		$baslik=p('baslik');
		$aciklama=$_POST['aciklama'];
		//$aciklama=p('aciklama', false);
		$kisa_aciklama=p('kisa_aciklama');
		$kat_id=p('kat_id');
		$aktif=p('aktif');

		if(empty($baslik) || empty($aciklama)){
			$hata.='Gerekli alanları doldurmanız gerekmektedir<br />';
		}

		$bak=$db->from('sesli_dersler_kat')->where('id', $kat_id)->first();

		if(empty($bak)){
			$hata.='Böyle bir Ders Kategorisi bulunamadı<br />';
		}

		if(!empty($hata)){
			echo alert($hata);
		}else{
			$slug=sef_link($baslik);
			$upla=$db->update('sesli_dersler')->where('id', $id)->set(array(
				'baslik' => $baslik,
				'slug' => $slug,
				'aciklama' => $aciklama,
				'duz_id' => session('id'),
				'kat_id' => $kat_id,
				'kisa_aciklama' => $kisa_aciklama,
				'aktif' => $aktif,
			));

			if($upla){
				echo alert('Düzenleme işlemi başarılıdır.', 3);
				go(url_admin.'?sayfa=sesli_dersler', 'js', 2);
				//go(url_admin.'?sayfa=dost_dernek&alt=duzenle&id='.$id, 'js', 1);
			}else{
				echo alert('Başarısız işlem lütfen sistem yetkilisi ile görüşün', 2);
			}

		}

	break;
	case 'sesli_dersler_kat_ekle':

		$baslik=p('baslik');
		$ust_kat=p('ust_kat');
		$aktif=p('aktif');

		if(!empty($baslik) && is_numeric($aktif)){
			$slug=sef_link($baslik);		
			$ekle=$db->insert('sesli_dersler_kat')->set(array(
				'baslik' => $baslik,
				'slug' => $slug,
				'ust_kat' => $ust_kat,
				'aktif' => $aktif
			));

			if($ekle){
				echo alert('Ekleme işlemi başarılıdır.', 3);
				go(url_admin.'?sayfa=sesli_dersler&alt=sesli_dersler_kat', 'js', 2);
			}else{
				echo alert('Başarısız işlem lütfen sistem yetkilisi ile görüşün', 2);
			}
		}else{
			echo alert('Lütfen gerekli alanları doldurunuz');
		}

	break;

	case 'sesli_dersler_kat_duzenle':
		$id=p('id');
		$baslik=p('baslik');
		$ust_kat=p('ust_kat');
		$aktif=p('aktif');

		if(!empty($baslik) && is_numeric($aktif)){
			$slug=sef_link($baslik);
			$upla=$db->update('sesli_dersler_kat')->where('id', $id)->set(array(
				'baslik' => $baslik,
				'slug' => $slug,
				'ust_kat' => $ust_kat,
				'aktif' => $aktif
			));

			if($upla){
				echo alert('Düzenleme işlemi başarılıdır.', 3);
				go(url_admin.'?sayfa=sesli_dersler&alt=sesli_dersler_kat', 'js', 2);
			}else{
				echo alert('Başarısız işlem lütfen sistem yetkilisi ile görüşün', 2);
			}
		}else{
			echo alert('Lütfen gerekli alanları doldurunuz');
		}

	break;

	
	default:
		# code...
	break;
}