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
		$link=p('link');
		$aktif=p('aktif');

		if($_FILES['resim']['size'] == 0){$hata.='Resim eklemeniz gerekmektedir<br />';}

		if(empty($baslik)){$hata.='Gerekli alanları doldurmanız gerekmektedir<br />';}

		resim_yukle_kontrol('resim');

		if(!empty($hata)){
			echo alert($hata, 2);
		}else{
			$ekle=$db->insert('slider')->set(array(
				'baslik' => $baslik,
				'link' => $link,
				'aktif' => $aktif,
			));

			if($ekle){
				$lastId=$db->lastId();

				$resim=resim_yukle('resim', 'slider', $dosyaismi=$baslik.'_slider');
					if($resim!='images/slider/bos.gif'){
						$upla=$db->update('slider')->where('id', $lastId)->set(array(
							'resim' => $resim
						));
						echo alert('Ekleme işlemi başarılıdır.', 3);
					}else{
						echo alert('Resimsiz Ekleme işlemi başarılıdır.', 3);
					}
				go(url_admin.'?sayfa=slider', 'js', 2);
			}else{
				echo alert('Başarısız işlem lütfen sistem yetkilisi ile görüşün', 2);
			}

		}

	break;

	case 'duzenle':
		$id=p('id');
		$baslik=p('baslik');
		$link=p('link');
		$aktif=p('aktif');

		if(empty($baslik)){$hata.='Gerekli alanları doldurmanız gerekmektedir<br />';}

		resim_yukle_kontrol('resim');

		if(!empty($hata)){
			echo alert($hata, 2);
		}else{
			$sliderim=$db->from('slider')->where('id', $id)->first();

			$upla=$db->update('slider')->where('id', $id)->set(array(
				'baslik' => $baslik,
				'link' => $link,
				'aktif' => $aktif,
			));

			if($upla){
				$resim=resim_yukle('resim', 'slider', $dosyaismi=$baslik.'_slider', $islem='duzenle', $sliderim);
					if($resim!='images/slider/bos.gif'){
						$uplan=$db->update('slider')->where('id', $id)->set(array(
							'resim' => $resim
						));
						echo alert('Düzenleme işlemi başarılıdır.', 3);
					}else{
						echo alert('Resim Değiştirilmeden işlem tamamlandı.', 3);
					}
				go(url_admin.'?sayfa=slider', 'js', 2);
			}else{
				echo alert('Başarısız işlem lütfen sistem yetkilisi ile görüşün', 2);
			}
		}
	break;

	
	default:
		# code...
		break;
}