<?php
$cikti_array=part_function($array=array('post_islem','basicdb','basic','formla'));

foreach($cikti_array as $cikti){
	require $cikti;
}

$cek_css=array(
	'../templates/DataTables/datatables.css',
);


array_push($g_js, '../templates/DataTables/datatables.min.js', '../templates/ckeditor/ckeditor.js','js/editor.js');

echo system_dosya_cagir($cek_css, 'css');


echo '
<div class="container-fluid">
	<div class="row p-3">';

	g('alt') ? $gel=g('alt') : $gel='anasayfa';

	yazarlar::$gel();

echo '</div>
</div>';

class yazarlar{

	public static function anasayfa(){
		yazarlar::listele();
	}

	public static function listele(){
		global $db,$aktifmi;

		$totalRecord = $db->from('yazarlar')->select('count(id) as total')->total();

		
		echo '<div class="col-12">
			<div class="p-2 text-center">
				<a href="'.url_admin.'?sayfa=yazarlar&alt=ekle" class="btn btn-info">Yazar Ekle</a>
			</div>';

		if($totalRecord > 0){
			$yazarlar=$db->from('yazarlar')
			->select('yazarlar.*, uyeler.adi')
			->leftJoin('uyeler', '%s.id = %s.uye_id')
			->all();
			
			echo '<span id="sonuc"></span>
			<table id="listele" class="table">
			  <thead>
			    <tr>
			      <th scope="col">#ID</th>
			      <th scope="col">Üye Adı</th>
			      <th scope="col">Durum</th>
			      <th scope="col">İşlem</th>
			    </tr>
			  </thead>
			  <tbody>';
					foreach($yazarlar as $yazar){
						echo '<tr id="'.$yazar['id'].'">
							<th scope="row">'.$yazar['id'].'</th>
							<td>('.$yazar['uye_id'].')-'.$yazar['adi'].'</td>
							<td>'.$aktifmi[$yazar['aktif']].'</td>
							<td>
								<a href="'.url_admin.'?sayfa=yazarlar&alt=duzenle&id='.$yazar['id'].'" class="btn btn-info">Düzenle</a>
								<a href="javascript:void(0);" onclick="sil(\''.$yazar['id'].'\', \'yazarlar\')" class="btn btn-danger">Sil</a>
							</td>
						</tr>';
					}
				echo '
			  </tbody>
			</table>';
		}else{
			echo alert('Listelinecek içerik bulunmadı');
		}

		echo '</div>';
	}

	public static function duzenle(){
		global $db,$aktifmi;

		$yazarlar=$db->from('yazarlar')->where('id', g('id'))->first();

		$uyeler=$db->from('uyeler')->where('id', $yazarlar['uye_id'])->where('id', 0, '!=')->all();

		$yazar_uyeler=array();
		foreach($uyeler as $uye){
			$yazar_uyeler[$uye['id']]=$uye['adi'];
		}

		$veriler=array(
			[0 => 'select', 1 => 'uye_id', 2 => 'Yazar Olucak Kişi', 50 => $yazar_uyeler],
			[0 => 'file', 1 => 'resim', 2 => 'Yazar Profil Resmi', 'Profil Resim'],
			[0 => 'text', 1 => 'kisa_aciklama', 2 => 'Kısa Açıklama(seo)', 'yazarın google tarafında daha iyi bulunabilmesi için yazarın biyografisiniz kısa açıklaması'],
			[0 => 'text2', 1 => 'aciklama', 2 => 'Açıklama', 'Açıklama kısmı'],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'yazarlar'],
			[0 => 'hidden', 1 => 'yap', 20 => 'duzenle'],
			[0 => 'hidden', 1 => 'id', 20 => g('id')],
			[0 => 'submit', 20 => 'Yazar Bilgileri Düzenle'],
		);

		echo sistem_formla($veriler, 'yazarlar', $yazarlar);
	}

	public static function ekle(){
		global $aktifmi,$db;

		$uyeler=$db->from('uyeler')->where('rutbe', 1, '!=')->where('id', 0, '!=')->all();

		$yazar_uyeler=array();

		foreach($uyeler as $uye){
			$yazar_uyeler[$uye['id']]=$uye['adi'];
		}

		$veriler=array(
			[0 => 'select', 1 => 'uye_id', 2 => 'Yazar Olucak Kişi', 50 => $yazar_uyeler],
			[0 => 'file', 1 => 'resim', 2 => 'Yazar Profil Resmi', 'Profil Resim'],
			[0 => 'text', 1 => 'kisa_aciklama', 2 => 'Kısa Açıklama(seo)', 'yazarın google tarafında daha iyi bulunabilmesi için yazarın biyografisiniz kısa açıklaması'],
			[0 => 'text2', 1 => 'aciklama', 2 => 'Açıklama', 'Açıklama kısmı'],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'yazarlar'],
			[0 => 'hidden', 1 => 'yap', 20 => 'ekle'],
			[0 => 'submit', 20 => 'Yazar Ekle'],
		);

		echo sistem_formla($veriler);
	}

	public static function yazarlar_kat(){
		global $db,$aktifmi;

		$totalRecord = $db->from('yazar_makale_kat')->select('count(id) as total')->total();

		
		echo '<div class="col-12">
			<div class="p-2 text-center">
				<a href="'.url_admin.'?sayfa=yazarlar&alt=yazarlar_kat_ekle" class="btn btn-danger">Makale Kategori Ekle</a>
			</div>';

		if($totalRecord > 0){
			$yazarlar=$db->from('yazar_makale_kat')->all();
			
			echo '<span id="sonuc"></span>
			<table id="listele" class="table">
			  <thead>
			    <tr>
			      <th scope="col">#ID</th>
			      <th scope="col">#UST_KAT ID</th>
			      <th scope="col">Adı</th>
			      <th scope="col">Durum</th>
			      <th scope="col">İşlem</th>
			    </tr>
			  </thead>
			  <tbody>';
					foreach($yazarlar as $dernek){
						echo '<tr id="'.$dernek['id'].'">
							<th scope="row">'.$dernek['id'].'</th>
							<th scope="row">'.$dernek['ust_kat'].'</th>
							<td>'.$dernek['baslik'].'</td>
							<td>'.$aktifmi[$dernek['aktif']].'</td>
							<td>
								<a href="'.url_admin.'?sayfa=yazarlar&alt=yazarlar_kat_duzenle&id='.$dernek['id'].'" class="btn btn-info">Düzenle</a>
								<a href="javascript:void(0);" onclick="sil(\''.$dernek['id'].'\', \'yazar_makale_kat\')" class="btn btn-danger">Sil</a>
							</td>
						</tr>';
					}
				echo '
			  </tbody>
			</table>';
		}else{
			echo alert('Listelinecek içerik bulunmadı');
		}

		echo '</div>';
	}
	
	public static function yazarlar_kat_ekle(){
		global $aktifmi,$db;

		$yazar_makale_kat_id=array();
		$yazar_makale_kat_id=[0 => 'Bulunmuyor'];
		$totalRecordkat = $db->from('yazar_makale_kat')->select('count(id) as total')->where('aktif', 1)->total();

		if($totalRecordkat > 0){
			$yazar_makale_kat=$db->from('yazar_makale_kat')->where('ust_kat', 0)->all();
			foreach($yazar_makale_kat as $yaz_kat){
				$yazar_makale_kat_id[$yaz_kat['id']]=$yaz_kat['baslik'];
			}
		}

		$veriler=array(
			[0 => 'input', 1 => 'baslik', 2 => 'Kategori Başlık', 3 => 'Makale Kategori Başlığı'],
			[0 => 'select', 1 => 'ust_kat', 2 => 'Üst Kategori', 50 => $yazar_makale_kat_id],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'yazarlar'],
			[0 => 'hidden', 1 => 'yap', 20 => 'yazarlar_kat_ekle'],
			[0 => 'submit', 20 => 'Gönder'],
		);

		echo sistem_formla($veriler, 'yazarlar_kat_ekle');
	}

	public static function yazarlar_kat_duzenle(){
		global $db,$aktifmi;

		$yazar_makale_kat_id=array();
		$yazar_makale_kat_id=[0 => 'Bulunmuyor'];
		$totalRecordkat = $db->from('yazar_makale_kat')->select('count(id) as total')->total();

		if($totalRecordkat > 0){
			$yazar_makale_kat=$db->from('yazar_makale_kat')->where('ust_kat', 0)->where('id', g('id'), '!=')->all();
			foreach($yazar_makale_kat as $yaz_kat){
				$yazar_makale_kat_id[$yaz_kat['id']]=$yaz_kat['baslik'];
			}
		}

		$yazar_makale_kat=$db->from('yazar_makale_kat')->where('id', g('id'))->first();

		$veriler=array(
			[0 => 'input', 1 => 'baslik', 2 => 'Başlık', 3 => 'Ders Kategori Başlığı'],
			[0 => 'select', 1 => 'ust_kat', 2 => 'Üst Kategori', 50 => $yazar_makale_kat_id],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'yazarlar'],
			[0 => 'hidden', 1 => 'yap', 20 => 'yazarlar_kat_duzenle'],
			[0 => 'hidden', 1 => 'id', 20 => g('id')],
			[0 => 'submit', 20 => 'Gönder'],
		);

		echo sistem_formla($veriler, 'yazar_makale_kat', $yazar_makale_kat);
	}

	public static function makale_listele(){
		global $db,$aktifmi;

		$aktifmi[2]='Yazar Silinmesi istiyor';

		$totalRecord = $db->from('yazar_makale')->select('count(id) as total')->total();

		
		echo '<div class="col-12">';

		if($totalRecord > 0){
			$yazar_makale=$db->from('yazar_makale')
			->select('yazar_makale.*, uyeler.adi')
			->leftJoin('uyeler', '%s.id = %s.uye_id')
			->all();
			
			echo '<span id="sonuc"></span>
			<table id="listele" class="table">
			  <thead>
			    <tr>
			      <th scope="col">#ID</th>
			      <th scope="col">Ekleyen Üye Adı</th>
			      <th scope="col">Düzenleyen Rütbeli</th>
			      <th scope="col">Makale Başlık</th>
			      <th scope="col">Durum</th>
			      <th scope="col">İşlem</th>
			    </tr>
			  </thead>
			  <tbody>';
					foreach($yazar_makale as $yazar){
						$duz_uye=$db->from('uyeler')->select('adi')->where('id', $yazar['duz_id'])->first();
						echo '<tr id="'.$yazar['id'].'">
							<th scope="row">'.$yazar['id'].'</th>
							<td>('.$yazar['uye_id'].')-'.$yazar['adi'].'</td>
							<td>('.$yazar['duz_id'].')-'.$duz_uye['adi'].'</td>
							<td>'.$yazar['baslik'].'</td>
							<td>'.$aktifmi[$yazar['aktif']].' ('.$yazar['aktif'].')</td>
							<td>
								<a href="'.url_admin.'?sayfa=yazarlar&alt=makale_duzenle&id='.$yazar['id'].'" class="btn btn-info">Düzenle</a>
								<a href="javascript:void(0);" onclick="sil(\''.$yazar['id'].'\', \'yazar_makale\')" class="btn btn-danger">Sil</a>
							</td>
						</tr>';
					}
				echo '
			  </tbody>
			</table>';
		}else{
			echo alert('Listelinecek içerik bulunmadı');
		}

		echo '</div>';
	}

	public static function makale_duzenle(){
		global $db,$aktifmi;

		$yazar_makale=$db->from('yazar_makale')->where('id', g('id'))->first();

		$makale_kat=$db->from('yazar_makale_kat')->where('aktif', 1)->all();

		$makale_kate=array();
		foreach($makale_kat as $kat){
			$makale_kate[$kat['id']]=$kat['baslik'];
		}
		$aktifmi[2]='Yazar Silinmesi istiyor';

		$yazar_uyeler=$db->from('uyeler')->where('rutbe', 2)->all();
		foreach($yazar_uyeler as $yaz_uy){
			$yazar_uye[$yaz_uy['id']]=$yaz_uy['adi'];
		}

		$veriler=array(
			[0 => 'select', 1 => 'uye_id', 2 => 'Başlatan Üye', 50 => $yazar_uye],
			[0 => 'input', 1 => 'baslik', 2 => 'Başlık', 'Makale Başlığını giriniz'],
			[0 => 'select', 1 => 'kat_id', 2 => 'Makale Kategori', 50 => $makale_kate],
			[0 => 'text', 1 => 'kisa_aciklama', 2 => 'Kısa Açıklama(seo)', 'google tarafında daha iyi bulunabilmesi için makalenin kısa açıklaması'],
			[0 => 'text2', 1 => 'aciklama', 2 => 'Açıklama', 'Açıklama kısmı'],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'yazarlar'],
			[0 => 'hidden', 1 => 'yap', 20 => 'makale_duzenle'],
			[0 => 'hidden', 1 => 'id', 20 => g('id')],
			[0 => 'submit', 20 => 'Makale Düzenle'],
		);

		echo sistem_formla($veriler, 'yazar_makale', $yazar_makale);
	}

}


?>