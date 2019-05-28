<?php
$cikti_array=part_function($array=array('post_islem','basicdb','basic','formla'));

foreach($cikti_array as $cikti){
	require $cikti;
}

$cek_css=array(
	'../templates/DataTables/datatables.css',
);

array_push($g_js, '../templates/DataTables/datatables.min.js', '../templates/ckeditor/ckeditor.js', 'js/datatables.js');
echo system_dosya_cagir($cek_css, 'css');

echo '
<div class="container-fluid">
	<div class="row p-3">';

	g('alt') ? $gel=g('alt') : $gel='anasayfa';

	makaleler::$gel();

echo '</div>
</div>';

class makaleler{

	public static function anasayfa(){
		makaleler::listele();
	}

	public static function listele(){
		global $db,$aktifmi;

		$totalRecord = $db->from('yazar_makale')->select('count(id) as total')->where('aktif', 2, '!=')->total();

		
		echo '<div class="col-12">
			<div class="p-2 text-center">
				<a href="'.url_yazar.'?sayfa=makaleler&alt=ekle" class="btn btn-info">Makale Ekle</a>
			</div>';

		if($totalRecord > 0){
			$yazar_makale=$db->from('yazar_makale')
			->select('yazar_makale.*, yazar_makale_kat.baslik AS katbaslik')
			->leftJoin('yazar_makale_kat', '%s.id = %s.kat_id')
			->where('yazar_makale.aktif', 2, '!=')
			->all();
			
			echo '<span id="sonuc"></span>
			<table id="listele" class="table">
			  <thead>
			    <tr>
			      <th scope="col">#ID</th>
			      <th scope="col">Makale Kategori</th>
			      <th scope="col">Makale Başlık</th>
			      <th scope="col">Durum</th>
			      <th scope="col">İşlem</th>
			    </tr>
			  </thead>
			  <tbody>';
					foreach($yazar_makale as $yazar){
						echo '<tr id="'.$yazar['id'].'">
							<th scope="row">'.$yazar['id'].'</th>
							<td>'.$yazar['katbaslik'].'</td>
							<td>'.$yazar['baslik'].'</td>
							<td>'.$aktifmi[$yazar['aktif']].'</td>
							<td>
								<a href="'.url_yazar.'?sayfa=makaleler&alt=duzenle&id='.$yazar['id'].'" class="btn btn-info">Düzenle</a>
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

	public static function duzenle(){
		global $db,$aktifmi;

		$yazar_makale=$db->from('yazar_makale')->where('id', g('id'))->first();

		$makale_kat=$db->from('yazar_makale_kat')->where('aktif', 1)->all();

		$makale_kate=array();
		foreach($makale_kat as $kat){
			$makale_kate[$kat['id']]=$kat['baslik'];
		}

		$veriler=array(
			[0 => 'input', 1 => 'baslik', 2 => 'Başlık', 'Makale Başlığını giriniz'],
			[0 => 'select', 1 => 'kat_id', 2 => 'Makale Kategori', 50 => $makale_kate],
			[0 => 'text', 1 => 'kisa_aciklama', 2 => 'Kısa Açıklama(seo)', 'google tarafında daha iyi bulunabilmesi için makalenin kısa açıklaması'],
			[0 => 'text2', 1 => 'aciklama', 2 => 'Açıklama', 'Açıklama kısmı'],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'yazar_makale'],
			[0 => 'hidden', 1 => 'yap', 20 => 'duzenle'],
			[0 => 'hidden', 1 => 'id', 20 => g('id')],
			[0 => 'submit', 20 => 'Makale Düzenle'],
		);

		echo sistem_formla($veriler, 'yazar_makale', $yazar_makale);
	}

	public static function ekle(){
		global $aktifmi,$db;

		$makale_kat=$db->from('yazar_makale_kat')->where('aktif', 1)->all();

		$makale_kate=array();
		foreach($makale_kat as $kat){
			$makale_kate[$kat['id']]=$kat['baslik'];
		}

		$veriler=array(
			[0 => 'input', 1 => 'baslik', 2 => 'Başlık', 'Makale Başlığını giriniz'],
			[0 => 'select', 1 => 'kat_id', 2 => 'Makale Kategori', 50 => $makale_kate],
			[0 => 'text', 1 => 'kisa_aciklama', 2 => 'Kısa Açıklama(seo)', 'google tarafında daha iyi bulunabilmesi için makalenin kısa açıklaması'],
			[0 => 'text2', 1 => 'aciklama', 2 => 'Açıklama', 'Açıklama kısmı'],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'yazar_makale'],
			[0 => 'hidden', 1 => 'yap', 20 => 'ekle'],
			[0 => 'submit', 20 => 'Makale Ekle'],
		);

		echo sistem_formla($veriler);
	}


}


?>