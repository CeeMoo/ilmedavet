<?php

$cikti_array=part_function($array=array('post_islem','basicdb','basic'));

foreach($cikti_array as $cikti){
	require $cikti;
}

$hata='';

$yap = p('yap');


switch ($yap) {
	case 'goruntulu_extra_ekle':
		$sayi_gel=rand(0, 400);
		echo '
		<div id="extra'.$sayi_gel.'" class="row pb-2 position-relative">
			<div class="col-3">
				<select class="form-control" name="extra['.$sayi_gel.'][select]">';
				$sabit_extra=$db->from('sabit_extra')->where('gorunum', 1)->where('aktif', 1)->all();
					foreach($sabit_extra as $s_ext){
						echo '<option value="'.$s_ext['id'].'">'.$s_ext['baslik'].'</option>';
					}
				echo '</select>
			</div>
			<div class="col-3">
				<input type="text" class="form-control" name="extra['.$sayi_gel.'][baslik]" placeholder="Başlık">
			</div>
			<div class="col">
				<input type="text" class="form-control" name="extra['.$sayi_gel.'][aciklama]" placeholder="İframe Kodu">
			</div>
			<div class="float-right"><button class="btn btn-info" onclick="goruntulu_extra_sil('.$sayi_gel.');"><i class="fas fa-backspace"></i></button></div>
		</div>';

	break;
	case 'goruntulu_extra_sil':
		$id=p('id');

		$var_mi=$db->from('goruntulu_extra')->select('count(id) as total')->where('id', $id)->total();

		if($var_mi != 0){
			$sil=$db->delete('goruntulu_extra')->where('id', $id)->done();

			if($sil){
				echo '<script>$("#extra'.$id.'").remove();</script>';
			}
		}else{
			echo '<script>$("#extra'.$id.'").remove();</script>';
		}
	break;

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

		//print_r($_POST);

		if(!empty($hata)){
			echo alert($hata);
		}else{
			$slug=sef_link($baslik);
			$ekle=$db->insert('goruntulu_dersler')->set(array(
				'baslik' => $baslik,
				'slug' => $slug,
				'uye_id' => session('id'),
				'aciklama' => $aciklama,
				'kat_id' => $kat_id,
				'kisa_aciklama' => $kisa_aciklama,
				'aktif' => $aktif,
			));

			if($ekle){
				$lastID=$db->lastId();

				if(!empty($_POST['extra'])){
					foreach($_POST['extra'] as  $ex => $ext){
						$baslik_ext=$ext['baslik'];
						$aciklama_ext=$ext['aciklama'];

						if(!empty($baslik_ext)){
							$baslik=$baslik_ext;
						}else{
							$select_baslik=$db->from('sabit_extra')->where('id', $ext['select'])->first();
							$baslik=$select_baslik['baslik'];
						}
						$goruntulu_extra_ekle=$db->insert('goruntulu_extra')->set([
							'goruntulu_id' => $lastID,
							'baslik' => $baslik,
							'aciklama' => $aciklama_ext
						]);
					}					
				}

				echo alert('Ekleme işlemi başarılıdır.', 3);
				go(url_admin.'?sayfa=goruntulu_dersler', 'js', 2);
			}else{
				echo alert('Başarısız işlem lütfen sistem yetkilisi ile görüşün', 2);
			}
			/*
			*/
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

		$bak=$db->from('goruntulu_dersler_kat')->where('id', $kat_id)->first();

		if(empty($bak)){
			$hata.='Böyle bir Ders Kategorisi bulunamadı<br />';
		}

		if(!empty($hata)){
			echo alert($hata);
		}else{
			$slug=sef_link($baslik);
			$upla=$db->update('goruntulu_dersler')->where('id', $id)->set(array(
				'baslik' => $baslik,
				'slug' => $slug,
				'aciklama' => $aciklama,
				'duz_id' => session('id'),
				'kat_id' => $kat_id,
				'kisa_aciklama' => $kisa_aciklama,
				'aktif' => $aktif,
			));

			if($upla){
				if(!empty($_POST['extra'])){
					foreach($_POST['extra'] as  $ex => $ext){
						$ext_kontrol=$db->from('goruntulu_extra')->select('count(id) as total')->where('id', $ex)->total();
							
							$baslik_ext=$ext['baslik'];
							$aciklama_ext=$ext['aciklama'];

							if(!empty($baslik_ext)){
								$baslik=$baslik_ext;
							}else{
								$select_baslik=$db->from('sabit_extra')->where('id', $ext['select'])->first();
								$baslik=$select_baslik['baslik'];
							}

								if($ext_kontrol != 0){
									$goruntulu_extra_upla=$db->update('goruntulu_extra')->where('id', $ex)->set([
										'goruntulu_id' => $id,
										'baslik' => $baslik,
										'aciklama' => $aciklama_ext
									]);
								}else{
									$goruntulu_extra_ekle=$db->insert('goruntulu_extra')->set([
										'goruntulu_id' => $id,
										'baslik' => $baslik,
										'aciklama' => $aciklama_ext
									]);
								}
					}					
				}
				echo alert('Düzenleme işlemi başarılıdır.', 3);
				go(url_admin.'?sayfa=goruntulu_dersler', 'js', 2);
				//go(url_admin.'?sayfa=dost_dernek&alt=duzenle&id='.$id, 'js', 1);
			}else{
				echo alert('Başarısız işlem lütfen sistem yetkilisi ile görüşün', 2);
			}

		}

	break;
	case 'goruntulu_dersler_kat_ekle':

		$baslik=p('baslik');
		$ust_kat=p('ust_kat');
		$aktif=p('aktif');

		if(!empty($baslik) && is_numeric($aktif)){
			$slug=sef_link($baslik);		
			$ekle=$db->insert('goruntulu_dersler_kat')->set(array(
				'baslik' => $baslik,
				'slug' => $slug,
				'ust_kat' => $ust_kat,
				'aktif' => $aktif
			));

			if($ekle){
				echo alert('Ekleme işlemi başarılıdır.', 3);
				go(url_admin.'?sayfa=goruntulu_dersler&alt=goruntulu_dersler_kat', 'js', 2);
			}else{
				echo alert('Başarısız işlem lütfen sistem yetkilisi ile görüşün', 2);
			}
		}else{
			echo alert('Lütfen gerekli alanları doldurunuz');
		}

	break;

	case 'goruntulu_dersler_kat_duzenle':
		$id=p('id');
		$baslik=p('baslik');
		$ust_kat=p('ust_kat');
		$aktif=p('aktif');

		if(!empty($baslik) && is_numeric($aktif)){
			$slug=sef_link($baslik);
			$upla=$db->update('goruntulu_dersler_kat')->where('id', $id)->set(array(
				'baslik' => $baslik,
				'slug' => $slug,
				'ust_kat' => $ust_kat,
				'aktif' => $aktif
			));

			if($upla){
				echo alert('Düzenleme işlemi başarılıdır.', 3);
				go(url_admin.'?sayfa=goruntulu_dersler&alt=goruntulu_dersler_kat', 'js', 2);
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