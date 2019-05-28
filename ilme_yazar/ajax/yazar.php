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
		$uye_id=session('id');
		$kisa_aciklama=p('kisa_aciklama');
		$aciklama=p('aciklama', false);
		//$aciklama=$_POST['aciklama'];
		$aktif=p('aktif');

		if($id != $uye_id){$hata.='Bu üye siz değilsiniz<br />';}

		$uye_mi = $db->from('uyeler')->select('count(id) as total')->where('id', $uye_id)->total();
		if($uye_mi > 0){
			$uye=$db->from('uyeler')->where('id', $uye_id)->first();
		
			$uye_yazar=$db->from('yazarlar')->select('count(id) as total')->where('id', $id)->total();

			if($uye_yazar == 0){
				$hata.='Böyle bir yazar bulunmadı.<br />';
			}else{
				$yazarim=$db->from('yazarlar')->where('id', $id)->first();

				resim_yukle_kontrol('resim');
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
				go(url_yazar.'?sayfa=uye', 'js', 2);
			}else{
				echo alert('Başarısız işlem lütfen sistem yetkilisi ile görüşün', 2);
			}
		}
	break;

	
	default:
		# code...
		break;
}