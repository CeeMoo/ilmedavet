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
		$aktif=p('aktif');

		if(empty($baslik) || empty($aciklama)){
			$hata.='Gerekli alanları doldurmanız gerekmektedir<br />';
		}

		if(!empty($hata)){
			echo alert($hata);
		}else{
			$slug=sef_link($baslik);

			$ekle=$db->insert('sayfalar')->set(array(
				'baslik' => $baslik,
				'slug' => $slug,
				'aciklama' => $aciklama,
				'kisa_aciklama' => $kisa_aciklama,
				'aktif' => $aktif,
			));

			if($ekle){
				echo alert('Ekleme işlemi başarılıdır.', 3);
				go(url_admin.'?sayfa=sayfalar', 'js', 2);
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
		$aktif=p('aktif');

		if(empty($baslik) || empty($aciklama)){
			$hata.='Gerekli alanları doldurmanız gerekmektedir<br />';
		}

		if(!empty($hata)){
			echo alert($hata);
		}else{
			$slug=sef_link($baslik);

			$upla=$db->update('sayfalar')->where('id', $id)->set(array(
				'baslik' => $baslik,
				'slug' => $slug,
				'aciklama' => $aciklama,
				'kisa_aciklama' => $kisa_aciklama,
				'aktif' => $aktif,
			));

			if($upla){
				echo alert('Düzenleme işlemi başarılıdır.', 3);
				go(url_admin.'?sayfa=sayfalar', 'js', 2);
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