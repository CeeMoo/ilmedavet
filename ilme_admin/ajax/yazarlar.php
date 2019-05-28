<?php

$cikti_array=part_function($array=array('post_islem','basicdb','basic'));

foreach($cikti_array as $cikti){
	require $cikti;
}

$hata='';

$yap = p('yap');

switch ($yap) {
	case 'ekle':
		$uye_id=p('uye_id');
		$kisa_aciklama=p('kisa_aciklama');
		//$aciklama=p('aciklama', false);
		$aciklama=$_POST['aciklama'];
		$aktif=p('aktif');

		$uye_mi = $db->from('uyeler')->select('count(id) as total')->where('id', $uye_id)->total();

		if($uye_mi > 0){
			$uye=$db->from('uyeler')->where('id', $uye_id)->first();
			
			resim_yukle_kontrol('resim');

			$uye_yazar=$db->from('yazarlar')->select('count(uye_id) as total')->where('uye_id', $uye_id)->total();

			if($uye_yazar > 0){
				$hata.='Aynı kişiyi yazar yapamazsınız.<br />';
			}
		}else{
			$hata.='Böyle bir üye bulunmuyor';
		}


		if(empty($kisa_aciklama) || empty($aciklama)){
			$hata.='Gerekli alanları doldurmanız gerekmektedir<br />';
		}

		if(!empty($hata)){
			echo alert($hata, 2);
		}else{
			$ekle=$db->insert('yazarlar')->set(array(
				'uye_id' => $uye_id,
				'aciklama' => $aciklama,
				'kisa_aciklama' => $kisa_aciklama,
				'aktif' => $aktif,
			));

			if($ekle){
				$lastId=$db->lastId();
				$resim=resim_yukle('resim', 'yazar_profil', $dosyaismi=$uye['adi'].'_yazar');
					if($resim!='images/yazar_profil/bos.gif'){
						$upla=$db->update('yazarlar')->where('id', $lastId)->set(['resim' => "$resim"]);
						if($upla){
							echo alert('Avatar ile Ekleme işlemi başarılıdır.', 3);
						}else{
							echo alert('Avatar Hata, Veri işlemi başarılıdır.', 3);
						}
					}else{
						echo alert('Avatarsız Ekleme işlemi başarılıdır.', 3);
					}
				go(url_admin.'?sayfa=yazarlar', 'js', 2);
			}else{
				echo alert('Başarısız işlem lütfen sistem yetkilisi ile görüşün', 2);
			}
		}

	break;

	case 'duzenle':
		$id=p('id');
		$uye_id=p('uye_id');
		$kisa_aciklama=p('kisa_aciklama');
		//$aciklama=p('aciklama', false);
		$aciklama=$_POST['aciklama'];
		$aktif=p('aktif');

		$uye_mi = $db->from('uyeler')->select('count(id) as total')->where('id', $uye_id)->total();

		if($uye_mi > 0){
			$uye=$db->from('uyeler')->where('id', $uye_id)->first();

			resim_yukle_kontrol('resim');
		
			$uye_yazar=$db->from('yazarlar')->select('count(id) as total')->where('id', $id)->total();

			if($uye_yazar == 0){
				$hata.='Böyle bir yazar bulunmadı.<br />';
			}else{
				$yazarim=$db->from('yazarlar')->where('id', $id)->first();
			}
		}else{
			$hata.='Böyle bir üye bulunmuyor';
		}


		if(empty($kisa_aciklama) || empty($aciklama)){
			$hata.='Gerekli alanları doldurmanız gerekmektedir<br />';
		}


		if(!empty($hata)){
			echo alert($hata, 2);
		}else{
			$upla=$db->update('yazarlar')->where('id', $id)->set(array(
				'uye_id' => $uye_id,
				'aciklama' => $aciklama,
				'kisa_aciklama' => $kisa_aciklama,
				'aktif' => $aktif,
			));

			if($upla){
				$resim=resim_yukle('resim', 'yazar_profil', $dosyaismi=$uye['adi'].'_yazar', $islem='duzenle', $yazarim);
					if($resim!='images/yazar_profil/bos.gif'){
						$uplan=$db->update('yazarlar')->where('id', $id)->set(array(
							'resim' => $resim
						));
						echo alert('Düzenleme işlemi başarılıdır.', 3);
					}else{
						echo alert('Avatarsız Ekleme işlemi başarılıdır.', 3);
					}
				go(url_admin.'?sayfa=yazarlar', 'js', 2);
			}else{
				echo alert('Başarısız işlem lütfen sistem yetkilisi ile görüşün', 2);
			}
		}
	break;

	case 'yazarlar_kat_ekle':
		$baslik=p('baslik');
		$ust_kat=p('ust_kat');
		$aktif=p('aktif');

		if(!empty($baslik) && is_numeric($aktif)){
			$slug=sef_link($baslik);		
			$ekle=$db->insert('yazar_makale_kat')->set(array(
				'baslik' => $baslik,
				'slug' => $slug,
				'ust_kat' => $ust_kat,
				'aktif' => $aktif
			));

			if($ekle){
				echo alert('Ekleme işlemi başarılıdır.', 3);
				go(url_admin.'?sayfa=yazarlar&alt=yazarlar_kat', 'js', 2);
			}else{
				echo alert('Başarısız işlem lütfen sistem yetkilisi ile görüşün', 2);
			}
		}else{
			echo alert('Lütfen gerekli alanları doldurunuz');
		}

	break;

	case 'yazarlar_kat_duzenle':
		$id=p('id');
		$baslik=p('baslik');
		$ust_kat=p('ust_kat');
		$aktif=p('aktif');

		if(!empty($baslik) && is_numeric($aktif)){
			$slug=sef_link($baslik);
			$upla=$db->update('yazar_makale_kat')->where('id', $id)->set(array(
				'baslik' => $baslik,
				'slug' => $slug,
				'ust_kat' => $ust_kat,
				'aktif' => $aktif
			));

			if($upla){
				echo alert('Düzenleme işlemi başarılıdır.', 3);
				go(url_admin.'?sayfa=yazarlar&alt=yazarlar_kat', 'js', 2);
			}else{
				echo alert('Başarısız işlem lütfen sistem yetkilisi ile görüşün', 2);
			}
		}else{
			echo alert('Lütfen gerekli alanları doldurunuz');
		}

	break;

	case 'makale_duzenle':
		$id=p('id');
		$baslik=p('baslik');
		$aciklama=$_POST['aciklama'];
		//$aciklama=p('aciklama', false);
		$kisa_aciklama=p('kisa_aciklama');
		$kat_id=p('kat_id');
		$aktif=p('aktif');
		$duz_id=session('id');

		if(empty($baslik) || empty($aciklama) || empty($kisa_aciklama)){
			$hata.='Gerekli alanları doldurmanız gerekmektedir<br />';
		}


		if(!empty($hata)){
			echo alert($hata);
		}else{
			$slug=sef_link($baslik);
			$upla=$db->update('yazar_makale')->where('id', $id)->set(array(
				'kat_id' => $kat_id,
				'duz_id' => $duz_id,
				'baslik' => $baslik,
				'slug' => $slug,
				'kisa_aciklama' => $kisa_aciklama,
				'aciklama' => $aciklama,
				'aktif' => $aktif,
			));

			if($upla){
				echo alert('Düzenleme işlemi başarılıdır.', 3);
				go(url_admin.'?sayfa=yazarlar&alt=makale_listele', 'js', 2);
				//go(url_admin.'?sayfa=dost_dernek&alt=duzenle&id='.$id, 'js', 1);
			}else{
				echo alert('Başarısız işlem lütfen sistem yetkilisi ile görüşün', 2);
			}

		}
	break;

	default:
		# code...
		break;
}