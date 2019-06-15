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

	dost_dernek::$gel();

echo '</div>
</div>';

class dost_dernek{

	public static function anasayfa(){
		dost_dernek::listele();
	}

	public static function listele(){
		global $db,$aktifmi;

		$totalRecord = $db->from('dost_dernek')->select('count(id) as total')->total();

		
		echo '<div class="col-12">
			<div class="p-2 text-center">
				<a href="'.url_admin.'?sayfa=dost_dernek&alt=ekle" class="btn btn-info">Dernek Ekle</a>
			</div>';

		if($totalRecord > 0){
			$dost_dernek=$db->from('dost_dernek')->all();
			
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
					foreach($dost_dernek as $dernek){
						echo '<tr>
							<th scope="row">'.$dernek['id'].'</th>
							<td>'.$dernek['baslik'].'</td>
							<td>'.$aktifmi[$dernek['aktif']].'</td>
							<td>
								<a href="'.url_admin.'?sayfa=dost_dernek&alt=duzenle&id='.$dernek['id'].'" class="btn btn-info">Düzenle</a>
								<a href="javascript:void(0);" onclick="sil(\''.$dernek['id'].'\', \'dost_dernek\')" class="btn btn-danger">Sil</a>
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

		$dost_dernek_kat_id=array();
		$dost_dernek_kat_id=[0 => 'Bulunmuyor'];

		$dernek_katlar=$db->from('dost_dernek_kat')->select('id,baslik')->where('aktif', 1)->all();

		foreach($dernek_katlar as $derkat){
			$dost_dernek_kat_id[$derkat['id']]="{$derkat['baslik']}";
		}

		$dost_dernek=$db->from('dost_dernek')->where('id', g('id'))->first();

		$veriler=array(
			[0 => 'input', 1 => 'baslik', 2 => 'Dernek Adı', 3 => 'Dernek Adı'],
			[0 => 'select', 1 => 'dost_dernek_kat_id', 2 => 'Dernek Kategori İL-İLÇE', 50 => $dost_dernek_kat_id],
			[0 => 'text', 1 => 'kisa_aciklama', 2 => 'Kısa Açıklama(seo)', 'Dernek ile ilgili açıklamanızı giriniz'],
			[0 => 'text', 1 => 'maps', 2 => 'Maps', 'Google Maps'],
			[0 => 'text2', 1 => 'aciklama', 2 => 'Açıklama', 'Dernek ile ilgili açıklamanızı giriniz'],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'dost_dernek'],
			[0 => 'hidden', 1 => 'id', 20 => g('id')],
			[0 => 'hidden', 1 => 'yap', 20 => 'duzenle'],
			[0 => 'submit', 20 => 'Gönder'],
		);

		echo sistem_formla($veriler, 'dost_dernek', $dost_dernek);
	}

	public static function ekle(){
		global $aktifmi,$db;

		$dost_dernek_kat_id=array();
		$dost_dernek_kat_id=[0 => 'Bulunmuyor'];

		$dernek_katlar=$db->from('dost_dernek_kat')->select('id,baslik')->where('aktif', 1)->all();

		foreach($dernek_katlar as $derkat){
			$dost_dernek_kat_id[$derkat['id']]="{$derkat['baslik']}";
		}

		$veriler=array(
			[0 => 'input', 1 => 'baslik', 2 => 'Dernek Adı', 3 => 'Dernek Adı'],
			[0 => 'select', 1 => 'dost_dernek_kat_id', 2 => 'Dernek Kategori İL-İLÇE', 50 => $dost_dernek_kat_id],
			[0 => 'text', 1 => 'kisa_aciklama', 2 => 'Kısa Açıklama(seo)', 'Dernek ile ilgili açıklamanızı giriniz'],
			[0 => 'text', 1 => 'maps', 2 => 'Maps', 'Google Maps'],
			[0 => 'text2', 1 => 'aciklama', 2 => 'Açıklama', 'Dernek ile ilgili açıklamanızı giriniz'],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'dost_dernek'],
			[0 => 'hidden', 1 => 'yap', 20 => 'ekle'],
			[0 => 'submit', 20 => 'Gönder'],
		);

		echo sistem_formla($veriler);
	}


	public static function dernek_kat(){
		global $db,$aktifmi;

		$totalRecord = $db->from('dost_dernek_kat')->select('count(id) as total')->total();

		
		echo '<div class="col-12">
			<div class="p-2 text-center">
				<a href="'.url_admin.'?sayfa=dost_dernek&alt=dernek_kat_ekle" class="btn btn-danger">Dernek Kategori Ekle</a>
			</div>';

		if($totalRecord > 0){
			$dost_dernek=$db->from('dost_dernek_kat')->all();
			
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
					foreach($dost_dernek as $dernek){
						echo '<tr>
							<th scope="row">'.$dernek['id'].'</th>
							<td>'.$dernek['baslik'].'</td>
							<td>'.$aktifmi[$dernek['aktif']].'</td>
							<td>
								<a href="'.url_admin.'?sayfa=dost_dernek&alt=dernek_kat_duzenle&id='.$dernek['id'].'" class="btn btn-info">Düzenle</a>
								<a href="javascript:void(0);" onclick="sil(\''.$dernek['id'].'\', \'dost_dernek\')" class="btn btn-danger">Sil</a>
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
	public static function dernek_kat_ekle(){
		global $aktifmi;

		$dost_dernek_kat_id=array();
		$dost_dernek_kat_id=[0 => 'Bulunmuyor'];

		$veriler=array(
			[0 => 'input', 1 => 'baslik', 2 => 'İl İlçe Adı', 3 => 'Dernek ayrıntılı konum için başlık'],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'dost_dernek'],
			[0 => 'hidden', 1 => 'yap', 20 => 'dernek_kat_ekle'],
			[0 => 'submit', 20 => 'Gönder'],
		);

		echo sistem_formla($veriler);
	}
	public static function dernek_kat_duzenle(){
		global $db,$aktifmi;

		$dost_dernek_kat=$db->from('dost_dernek_kat')->where('id', g('id'))->first();

		$veriler=array(
			[0 => 'input', 1 => 'baslik', 2 => 'İl İlçe Adı'],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'dost_dernek'],
			[0 => 'hidden', 1 => 'yap', 20 => 'dernek_kat_duzenle'],
			[0 => 'hidden', 1 => 'id', 20 => g('id')],
			[0 => 'submit', 20 => 'Gönder'],
		);

		echo sistem_formla($veriler, 'dost_dernek_kat', $dost_dernek_kat);
	}


}


?>