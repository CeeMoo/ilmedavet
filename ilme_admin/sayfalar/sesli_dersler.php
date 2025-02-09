<?php
$cikti_array=part_function($array=array('post_islem','basicdb','basic','formla'));

foreach($cikti_array as $cikti){
	require $cikti;
}

$cek_css=array(
	'../dokumantasyon/DataTables/datatables.css',
);

array_push($g_js, '../dokumantasyon/DataTables/datatables.min.js', '../dokumantasyon/editor/ckeditor.js','js/editor.js');

echo system_dosya_cagir($cek_css, 'css');


echo '
<div class="container-fluid">
	<div class="row p-3">';

	g('alt') ? $gel=g('alt') : $gel='anasayfa';
	
	sesli_dersler::$gel();

echo '</div>
</div>';

class sesli_dersler{

	public static function anasayfa(){
		sesli_dersler::listele();
	}

	public static function listele(){
		global $db,$aktifmi;

		$totalRecord = $db->from('sesli_dersler')->select('count(id) as total')->total();

		
		echo '<div class="col-12">
			<div class="p-2 text-center">
				<a href="'.url_admin.'?sayfa=sesli_dersler&alt=ekle" class="btn btn-info">Ses Ders Ekle</a>
			</div>';

		if($totalRecord > 0){
			$sesli_dersler=$db->from('sesli_dersler')->all();
			
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
					foreach($sesli_dersler as $dernek){
						echo '<tr id="'.$dernek['id'].'">
							<th scope="row">'.$dernek['id'].'</th>
							<td>'.$dernek['baslik'].'</td>
							<td>'.$aktifmi[$dernek['aktif']].'</td>
							<td>
								<a href="'.url_admin.'?sayfa=sesli_dersler&alt=duzenle&id='.$dernek['id'].'" class="btn btn-info">Düzenle</a>
								<a href="javascript:void(0);" onclick="sil(\''.$dernek['id'].'\', \'sesli_dersler\')" class="btn btn-danger">Sil</a>
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

		$sesli_dersler_kat_id=array();
		$sesli_dersler_kat_id=[0 => 'Bulunmuyor'];
		$totalRecordkat = $db->from('sesli_dersler_kat')->select('count(id) as total')->where('aktif', 1)->total();

		if($totalRecordkat > 0){
			$sesli_dersler_kat=$db->from('sesli_dersler_kat')->where('aktif', 1)->all();
			foreach($sesli_dersler_kat as $yaz_kat){
				$sesli_dersler_kat_id[$yaz_kat['id']]=$yaz_kat['baslik'];
			}
		}

		$goruntulu_extra=$db->from('sabit_extra')->where('gorunum', 2)->where('aktif', 1)->all();

		foreach($goruntulu_extra as $g_ext){
			$goruntulu_extralist[$g_ext['id']]=$g_ext['baslik'];
		}

		global $g_js;
		array_push($g_js, 'js/sesli_extralist.js');

		$veriler=array(
			[0 => 'extra', 1 => 'extra', 2 => 'Ders Adı', 50 => $goruntulu_extralist],
			[0 => 'input', 1 => 'baslik', 2 => 'Ders Adı', 3 => 'Ders Adı'],
			[0 => 'select', 1 => 'kat_id', 2 => 'Ders Kategori', 50 => $sesli_dersler_kat_id],
			[0 => 'text', 1 => 'kisa_aciklama', 2 => 'Kısa Açıklama', 'Kısa Açıklama(seo)'],
			[0 => 'text2', 1 => 'aciklama', 2 => 'Açıklama', 'Ders ile ilgili açıklamanızı giriniz'],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'sesli_dersler'],
			[0 => 'hidden', 1 => 'yap', 20 => 'ekle'],
			[0 => 'submit', 20 => 'Gönder'],
		);

		echo sistem_formla($veriler);
	}

	public static function duzenle(){
		global $db,$aktifmi;

		$sesli_dersler_kat_id=array();
		$sesli_dersler_kat_id=[0 => 'Bulunmuyor'];
		$totalRecordkat = $db->from('sesli_dersler_kat')->select('count(id) as total')->where('aktif', 1)->total();

		if($totalRecordkat > 0){
			$sesli_dersler_kat=$db->from('sesli_dersler_kat')->where('aktif', 1)->all();
			foreach($sesli_dersler_kat as $yaz_kat){
				$sesli_dersler_kat_id[$yaz_kat['id']]=$yaz_kat['baslik'];
			}
		}

		$sesli_dersler=$db->from('sesli_dersler')->where('id', g('id'))->first();

		global $g_js;
		array_push($g_js, 'js/sesli_extralist.js');

		$veriler=array(
			[0 => 'extra2', 1 => 'extra', 2 => 'Görüntü Video İframe Kodlar'],
			[0 => 'input', 1 => 'baslik', 2 => 'Ders Adı', 3 => 'Ders Adı'],
			[0 => 'select', 1 => 'kat_id', 2 => 'Ders Kategori', 50 => $sesli_dersler_kat_id],
			[0 => 'text', 1 => 'kisa_aciklama', 2 => 'Kısa Açıklama', 'Kısa Açıklama(seo)'],
			[0 => 'text2', 1 => 'aciklama', 2 => 'Açıklama', 'Ders ile ilgili açıklamanızı giriniz'],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'sesli_dersler'],
			[0 => 'hidden', 1 => 'id', 20 => g('id')],
			[0 => 'hidden', 1 => 'yap', 20 => 'duzenle'],
			[0 => 'submit', 20 => 'Gönder'],
		);

		echo sistem_formla($veriler, 'sesli_dersler', $sesli_dersler);
	}


	public static function sesli_dersler_kat(){
		global $db,$aktifmi;

		$totalRecord = $db->from('sesli_dersler_kat')->select('count(id) as total')->total();

		
		echo '<div class="col-12">
			<div class="p-2 text-center">
				<a href="'.url_admin.'?sayfa=sesli_dersler&alt=sesli_dersler_kat_ekle" class="btn btn-danger">Sesli Ders Kategori Ekle</a>
			</div>';

		if($totalRecord > 0){
			$sesli_dersler=$db->from('sesli_dersler_kat')->all();
			
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
					foreach($sesli_dersler as $dernek){
						echo '<tr id="'.$dernek['id'].'">
							<th scope="row">'.$dernek['id'].'</th>
							<td>'.$dernek['baslik'].'</td>
							<td>'.$aktifmi[$dernek['aktif']].'</td>
							<td>
								<a href="'.url_admin.'?sayfa=sesli_dersler&alt=sesli_dersler_kat_duzenle&id='.$dernek['id'].'" class="btn btn-info">Düzenle</a>
								<a href="javascript:void(0);" onclick="sil(\''.$dernek['id'].'\', \'sesli_dersler_kat\')" class="btn btn-danger">Sil</a>
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
	public static function sesli_dersler_kat_ekle(){
		global $aktifmi,$db;

		$sesli_dersler_kat_id=array();
		$sesli_dersler_kat_id=[0 => 'Bulunmuyor'];
		$totalRecordkat = $db->from('sesli_dersler_kat')->select('count(id) as total')->where('aktif', 1)->total();

		if($totalRecordkat > 0){
			$sesli_dersler_kat=$db->from('sesli_dersler_kat')->where('ust_kat', 0)->all();
			foreach($sesli_dersler_kat as $yaz_kat){
				$sesli_dersler_kat_id[$yaz_kat['id']]=$yaz_kat['baslik'];
			}
		}

		$veriler=array(
			[0 => 'input', 1 => 'baslik', 2 => 'Başlık', 3 => 'Ders Kategori Başlığı'],
			[0 => 'select', 1 => 'ust_kat', 2 => 'Üst Kategori', 50 => $sesli_dersler_kat_id],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'sesli_dersler'],
			[0 => 'hidden', 1 => 'yap', 20 => 'sesli_dersler_kat_ekle'],
			[0 => 'submit', 20 => 'Gönder'],
		);

		echo sistem_formla($veriler);
	}
	public static function sesli_dersler_kat_duzenle(){
		global $db,$aktifmi;

		$sesli_dersler_kat_id=array();
		$sesli_dersler_kat_id=[0 => 'Bulunmuyor'];
		$totalRecordkat = $db->from('sesli_dersler_kat')->select('count(id) as total')->total();

		if($totalRecordkat > 0){
			$sesli_dersler_kat=$db->from('sesli_dersler_kat')->where('ust_kat', 0)->where('id', g('id'), '!=')->all();
			foreach($sesli_dersler_kat as $yaz_kat){
				$sesli_dersler_kat_id[$yaz_kat['id']]=$yaz_kat['baslik'];
			}
		}

		$sesli_dersler_kat=$db->from('sesli_dersler_kat')->where('id', g('id'))->first();

		$veriler=array(
			[0 => 'input', 1 => 'baslik', 2 => 'Başlık', 3 => 'Ders Kategori Başlığı'],
			[0 => 'select', 1 => 'ust_kat', 2 => 'Üst Kategori', 50 => $sesli_dersler_kat_id],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'sesli_dersler'],
			[0 => 'hidden', 1 => 'yap', 20 => 'sesli_dersler_kat_duzenle'],
			[0 => 'hidden', 1 => 'id', 20 => g('id')],
			[0 => 'submit', 20 => 'Gönder'],
		);

		echo sistem_formla($veriler, 'sesli_dersler_kat', $sesli_dersler_kat);
	}


}


?>