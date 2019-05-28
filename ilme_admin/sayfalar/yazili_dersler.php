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
	
	yazili_dersler::$gel();

echo '</div>
</div>';

class yazili_dersler{

	public static function anasayfa(){
		yazili_dersler::listele();
	}

	public static function listele(){
		global $db,$aktifmi;

		$totalRecord = $db->from('yazili_dersler')->select('count(id) as total')->total();

		
		echo '<div class="col-12">
			<div class="p-2 text-center">
				<a href="'.url_admin.'?sayfa=yazili_dersler&alt=ekle" class="btn btn-info">Yazılı Ders Ekle</a>
			</div>';

		if($totalRecord > 0){
			$yazili_dersler=$db->from('yazili_dersler')->all();
			
			echo '<span id="sonuc"></span>
			<table id="listele" class="table">
			  <thead>
			    <tr>
			      <th scope="col">#ID</th>
			      <th scope="col">Başlık</th>
			      <th scope="col">Durum</th>
			      <th scope="col">İşlem</th>
			    </tr>
			  </thead>
			  <tbody>';
					foreach($yazili_dersler as $dernek){
						echo '<tr id="'.$dernek['id'].'">
							<th scope="row">'.$dernek['id'].'</th>
							<td>'.$dernek['baslik'].'</td>
							<td>'.$aktifmi[$dernek['aktif']].'</td>
							<td>
								<a href="'.url_admin.'?sayfa=yazili_dersler&alt=duzenle&id='.$dernek['id'].'" class="btn btn-info">Düzenle</a>
								<a href="javascript:void(0);" onclick="sil(\''.$dernek['id'].'\', \'yazili_dersler\')" class="btn btn-danger">Sil</a>
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

	public static function ekle(){
		global $aktifmi,$db;

		$yazili_dersler_kat_id=array();
		$yazili_dersler_kat_id=[0 => 'Bulunmuyor'];
		$totalRecordkat = $db->from('yazili_dersler_kat')->select('count(id) as total')->where('aktif', 1)->total();

		if($totalRecordkat > 0){
			$yazili_dersler_kat=$db->from('yazili_dersler_kat')->where('aktif', 1)->all();
			foreach($yazili_dersler_kat as $yaz_kat){
				$yazili_dersler_kat_id[$yaz_kat['id']]=$yaz_kat['baslik'];
			}
		}

		$veriler=array(
			[0 => 'input', 1 => 'baslik', 2 => 'Ders Adı', 3 => 'Ders Adı'],
			[0 => 'select', 1 => 'kat_id', 2 => 'Ders Kategori', 50 => $yazili_dersler_kat_id],
			[0 => 'text', 1 => 'kisa_aciklama', 2 => 'Kısa Açıklama', 'Kısa Açıklama(seo)'],
			[0 => 'text2', 1 => 'aciklama', 2 => 'Açıklama', 'Ders ile ilgili açıklamanızı giriniz'],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'yazili_dersler'],
			[0 => 'hidden', 1 => 'yap', 20 => 'ekle'],
			[0 => 'submit', 20 => 'Gönder'],
		);

		echo sistem_formla($veriler);
	}

	public static function duzenle(){
		global $db,$aktifmi;

		$yazili_dersler_kat_id=array();
		$yazili_dersler_kat_id=[0 => 'Bulunmuyor'];
		$totalRecordkat = $db->from('yazili_dersler_kat')->select('count(id) as total')->where('aktif', 1)->total();

		if($totalRecordkat > 0){
			$yazili_dersler_kat=$db->from('yazili_dersler_kat')->where('aktif', 1)->all();
			foreach($yazili_dersler_kat as $yaz_kat){
				$yazili_dersler_kat_id[$yaz_kat['id']]=$yaz_kat['baslik'];
			}
		}

		$yazili_dersler=$db->from('yazili_dersler')->where('id', g('id'))->first();

		$veriler=array(
			[0 => 'input', 1 => 'baslik', 2 => 'Ders Adı', 3 => 'Ders Adı'],
			[0 => 'select', 1 => 'kat_id', 2 => 'Ders Kategori', 50 => $yazili_dersler_kat_id],
			[0 => 'text', 1 => 'kisa_aciklama', 2 => 'Kısa Açıklama', 'Kısa Açıklama(seo)'],
			[0 => 'text2', 1 => 'aciklama', 2 => 'Açıklama', 'Ders ile ilgili açıklamanızı giriniz'],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'yazili_dersler'],
			[0 => 'hidden', 1 => 'id', 20 => g('id')],
			[0 => 'hidden', 1 => 'yap', 20 => 'duzenle'],
			[0 => 'submit', 20 => 'Gönder'],
		);

		echo sistem_formla($veriler, 'yazili_dersler', $yazili_dersler);
	}


	public static function yazili_dersler_kat(){
		global $db,$aktifmi;

		$totalRecord = $db->from('yazili_dersler_kat')->select('count(id) as total')->total();

		
		echo '<div class="col-12">
			<div class="p-2 text-center">
				<a href="'.url_admin.'?sayfa=yazili_dersler&alt=yazili_dersler_kat_ekle" class="btn btn-danger">Ders Kategori Ekle</a>
			</div>';

		if($totalRecord > 0){
			$yazili_dersler=$db->from('yazili_dersler_kat')->all();
			
			echo '<span id="sonuc"></span>
			<table id="listele" class="table">
			  <thead>
			    <tr>
			      <th scope="col">#ID</th>
			      <th scope="col">Adı</th>
			      <th scope="col">Durum</th>
			      <th scope="col">İşlem</th>
			    </tr>
			  </thead>
			  <tbody>';
					foreach($yazili_dersler as $dernek){
						echo '<tr>
							<th scope="row">'.$dernek['id'].'</th>
							<td>'.$dernek['baslik'].'</td>
							<td>'.$aktifmi[$dernek['aktif']].'</td>
							<td>
								<a href="'.url_admin.'?sayfa=yazili_dersler&alt=yazili_dersler_kat_duzenle&id='.$dernek['id'].'" class="btn btn-info">Düzenle</a>
								<a href="" onclick="sil(\''.$dernek['id'].'\', \'yazili_dersler\')" class="btn btn-danger">Sil</a>
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
	public static function yazili_dersler_kat_ekle(){
		global $aktifmi,$db;

		$yazili_dersler_kat_id=array();
		$yazili_dersler_kat_id=[0 => 'Bulunmuyor'];
		$totalRecordkat = $db->from('yazili_dersler_kat')->select('count(id) as total')->where('aktif', 1)->total();

		if($totalRecordkat > 0){
			$yazili_dersler_kat=$db->from('yazili_dersler_kat')->where('ust_kat', 0)->all();
			foreach($yazili_dersler_kat as $yaz_kat){
				$yazili_dersler_kat_id[$yaz_kat['id']]=$yaz_kat['baslik'];
			}
		}

		$veriler=array(
			[0 => 'input', 1 => 'baslik', 2 => 'Başlık', 3 => 'Ders Kategori Başlığı'],
			[0 => 'select', 1 => 'ust_kat', 2 => 'Üst Kategori', 50 => $yazili_dersler_kat_id],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'yazili_dersler'],
			[0 => 'hidden', 1 => 'yap', 20 => 'yazili_dersler_kat_ekle'],
			[0 => 'submit', 20 => 'Gönder'],
		);

		echo sistem_formla($veriler);
	}
	public static function yazili_dersler_kat_duzenle(){
		global $db,$aktifmi;

		$yazili_dersler_kat_id=array();
		$yazili_dersler_kat_id=[0 => 'Bulunmuyor'];
		$totalRecordkat = $db->from('yazili_dersler_kat')->select('count(id) as total')->total();

		if($totalRecordkat > 0){
			$yazili_dersler_kat=$db->from('yazili_dersler_kat')->where('ust_kat', 0)->where('id', g('id'), '!=')->all();
			foreach($yazili_dersler_kat as $yaz_kat){
				$yazili_dersler_kat_id[$yaz_kat['id']]=$yaz_kat['baslik'];
			}
		}

		$yazili_dersler_kat=$db->from('yazili_dersler_kat')->where('id', g('id'))->first();

		$veriler=array(
			[0 => 'input', 1 => 'baslik', 2 => 'Başlık', 3 => 'Ders Kategori Başlığı'],
			[0 => 'select', 1 => 'ust_kat', 2 => 'Üst Kategori', 50 => $yazili_dersler_kat_id],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'yazili_dersler'],
			[0 => 'hidden', 1 => 'yap', 20 => 'yazili_dersler_kat_duzenle'],
			[0 => 'hidden', 1 => 'id', 20 => g('id')],
			[0 => 'submit', 20 => 'Gönder'],
		);

		echo sistem_formla($veriler, 'yazili_dersler_kat', $yazili_dersler_kat);
	}


}


?>