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
		//$aciklama=$_POST['aciklama'];
		$aciklama=p('aciklama', false);
		$kisa_aciklama=p('kisa_aciklama');
		$kat_id=p('kat_id');
		$aktif=p('aktif');
		$uye_id=session('id');

		if(empty($baslik)){
			$hata.='Başlığı boş bırakmayınız.<br />';
		}else{
			$slug=sef_link($baslik);
			$baslik_slug_say=$db->from('yazar_makale')->select('count(id) as total')->where('slug', $slug)->total();

			if($baslik_slug_say != 0){
				$hata.='Böyle bir makale başlığı bulunuyor.<br />';
			}
		}

		if(empty($aciklama) || empty($kisa_aciklama)){
			$hata.='Gerekli alanları doldurmanız gerekmektedir<br />';
		}

		$yazar_uyelik=$db->from('uyeler')->where('id', $uye_id)->first();

		if($yazar_uyelik['rutbe'] != 2){$hata.='Yazar <strong>üyeliğine</strong> sahip değilsiniz.<br />';}

		if(!empty($hata)){
			echo alert($hata);
		}else{
			$ekle=$db->insert('yazar_makale')->set(array(
				'kat_id' => $kat_id,
				'uye_id' => $uye_id,
				'baslik' => $baslik,
				'slug' => $slug,
				'kisa_aciklama' => $kisa_aciklama,
				'aciklama' => $aciklama,
				'aktif' => $aktif,
			));

			if($ekle){
				echo alert('Ekleme işlemi başarılıdır.', 3);
				go(url_yazar.'?sayfa=makaleler', 'js', 2);
			}else{
				echo alert('Başarısız işlem lütfen sistem yetkilisi ile görüşün', 2);
			}

		}
	break;

	case 'duzenle':
		$id=p('id');
		$baslik=p('baslik');
		//$aciklama=$_POST['aciklama'];
		$aciklama=p('aciklama', false);
		$kisa_aciklama=p('kisa_aciklama');
		$kat_id=p('kat_id');
		$aktif=p('aktif');
		$uye_id=session('id');

		if(empty($baslik)){
			$hata.='Başlığı boş bırakmayınız.<br />';
		}else{
			$slug=sef_link($baslik);
			$baslik_slug_say=$db->from('yazar_makale')->select('count(id) as total')->where('slug', $slug)->where('id', $id, '!=')->total();

			if($baslik_slug_say != 0){
				$hata.='Böyle bir makale başlığı bulunuyor.<br />';
			}
		}


		if(empty($aciklama) || empty($kisa_aciklama)){
			$hata.='Gerekli alanları doldurmanız gerekmektedir<br />';
		}

		$yazar_uyelik=$db->from('uyeler')->where('id', $uye_id)->first();

		if($yazar_uyelik['rutbe'] != 2){$hata.='Yazar <strong>üyeliğine</strong> sahip değilsiniz.<br />';}

		if(!empty($hata)){
			echo alert($hata);
		}else{
			$upla=$db->update('yazar_makale')->where('id', $id)->set(array(
				'kat_id' => $kat_id,
				'uye_id' => $uye_id,
				'baslik' => $baslik,
				'slug' => $slug,
				'kisa_aciklama' => $kisa_aciklama,
				'aciklama' => $aciklama,
				'aktif' => $aktif,
			));

			if($upla){
				echo alert('Düzenleme işlemi başarılıdır.', 3);
				go(url_yazar.'?sayfa=makaleler', 'js', 2);
				//go(url_yazar.'?sayfa=dost_dernek&alt=duzenle&id='.$id, 'js', 1);
			}else{
				echo alert('Başarısız işlem lütfen sistem yetkilisi ile görüşün', 2);
			}

		}
	break;

	
	default:
		echo alert('yapılacak işlem bulunmadı.');
	break;
}