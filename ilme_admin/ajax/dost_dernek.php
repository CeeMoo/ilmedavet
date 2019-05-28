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
		$aciklama=p('aciklama');
		$dost_dernek_kat_id=p('dost_dernek_kat_id');
		$maps=p('maps');
		$aktif=p('aktif');

		if(empty($baslik) || empty($aciklama)){
			$hata.='Gerekli alanları doldurmanız gerekmektedir<br />';
		}

		/*
		$bak=$db->from('dost_dernek_kat')->where('id', $dost_dernek_kat_id)->first();

		if(empty($bak)){
			$hata.='Böyle bir Dernek Kategorisi bulunamadı<br />';
		}
		*/


		if(!empty($hata)){
			echo alert($hata);
		}else{
			$slug=sef_link($baslik);
			$ekle=$db->insert('dost_dernek')->set(array(
				'baslik' => $baslik,
				'slug' => $slug,
				'aciklama' => $aciklama,
				'dost_dernek_kat_id' => $dost_dernek_kat_id,
				'maps' => $maps,
				'aktif' => $aktif,
			));

			if($ekle){
				echo alert('Ekleme işlemi başarılıdır.', 3);
				go(url_admin.'?sayfa=dost_dernek', 'js', 2);
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
		$dost_dernek_kat_id=p('dost_dernek_kat_id');
		$maps=p('maps');
		$aktif=p('aktif');

		if(empty($baslik) || empty($aciklama)){
			$hata.='Gerekli alanları doldurmanız gerekmektedir<br />';
		}

		$bak=$db->from('dost_dernek_kat')->where('id', $dost_dernek_kat_id)->first();

		if(empty($bak)){
			$hata.='Böyle bir Dernek Kategorisi bulunamadı<br />';
		}

		if(!empty($hata)){
			echo alert($hata);
		}else{
			$slug=sef_link($baslik);
			$upla=$db->update('dost_dernek')->where('id', $id)->set(array(
				'baslik' => $baslik,
				'slug' => $slug,
				'aciklama' => $aciklama,
				'dost_dernek_kat_id' => $dost_dernek_kat_id,
				'maps' => $maps,
				'aktif' => $aktif,
			));

			if($upla){
				echo alert('Düzenleme işlemi başarılıdır.', 3);
				go(url_admin.'?sayfa=dost_dernek', 'js', 2);
				//go(url_admin.'?sayfa=dost_dernek&alt=duzenle&id='.$id, 'js', 1);
			}else{
				echo alert('Başarısız işlem lütfen sistem yetkilisi ile görüşün', 2);
			}

		}

	break;
	case 'dernek_kat_ekle':
		$baslik=p('baslik');
		$aktif=p('aktif');

		if(!empty($baslik) && is_numeric($aktif)){
			$ekle=$db->insert('dost_dernek_kat')->set(array(
				'baslik' => $baslik,
				'aktif' => $aktif
			));

			if($ekle){
				echo alert('Ekleme işlemi başarılıdır.', 3);
				go(url_admin.'?sayfa=dost_dernek&alt=dernek_kat', 'js', 2);
			}else{
				echo alert('Başarısız işlem lütfen sistem yetkilisi ile görüşün', 2);
			}
		}else{
			echo alert('Lütfen gerekli alanları doldurunuz');
		}

	break;

	case 'dernek_kat_duzenle':
		$id=p('id');
		$baslik=p('baslik');
		$aktif=p('aktif');

		if(!empty($baslik) && is_numeric($aktif)){
			$upla=$db->update('dost_dernek_kat')->where('id', $id)->set(array(
				'baslik' => $baslik,
				'aktif' => $aktif
			));

			if($upla){
				echo alert('Düzenleme işlemi başarılıdır.', 3);
				go(url_admin.'?sayfa=dost_dernek&alt=dernek_kat', 'js', 2);
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