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

	sayfalar::$gel();

echo '</div>
</div>';

class sayfalar{

	public static function anasayfa(){
		sayfalar::listele();
	}

	public static function listele(){
		global $db,$aktifmi;
		
		$sayfalar=$db->from('sayfalar')->all();

		echo '<div class="col-12">
			<span id="sonuc"></span>
			<div class="p-2 text-center">
				<a href="'.url_admin.'?sayfa=sayfalar&alt=ekle" class="btn btn-info">Sayfa Ekle</a>
			</div>
			<table id="listele" class="table">
			  <thead>
			    <tr>
			      <th scope="col">#ID</th>
			      <th scope="col">Başlık</th>
			      <th scope="col">Aktif</th>
			      <th scope="col">İşlem</th>
			    </tr>
			  </thead>
			  <tbody>';
					foreach($sayfalar as $sayfa){
						echo '<tr id="'.$sayfa['id'].'">
							<th scope="row">'.$sayfa['id'].'</th>
							<td>'.$sayfa['baslik'].'</td>
							<td>'.$aktifmi[$sayfa['aktif']].'</td>
							<td>
								<a href="'.url_admin.'?sayfa=sayfalar&alt=duzenle&id='.$sayfa['id'].'" class="btn btn-info">Düzenle</a>
								<a href="javascript:void(0);" onclick="sil(\''.$sayfa['id'].'\', \'sayfalar\')" class="btn btn-danger">Sil</a>
							</td>
						</tr>';
					}
				echo '
			  </tbody>
			</table>
		</div>';
	}

	public static function duzenle(){
		global $db,$aktifmi;

		$sayfalar=$db->from('sayfalar')->where('id', g('id'))->first();

		$veriler=array(
			[0 => 'input', 1 => 'baslik', 2 => 'Başlık'],
			[0 => 'text', 1 => 'kisa_aciklama', 2 => 'Kısa Açıklama(seo)', 'seo için kısa açıklamanız gerekmektedir.'],
			[0 => 'text2', 1 => 'aciklama', 2 => 'Açıklama', 'Açıklama kısmı'],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'sayfalar'],
			[0 => 'hidden', 1 => 'id', 20 => g('id')],
			[0 => 'hidden', 1 => 'yap', 20 => 'duzenle'],
			[0 => 'submit', 20 => 'Düzenlemeyi Bitir'],
		);

		echo sistem_formla($veriler, 'sayfalar', $sayfalar);
	}

	public static function ekle(){
		global $aktifmi,$db;

		$veriler=array(
			[0 => 'input', 1 => 'baslik', 2 => 'Başlık'],
			[0 => 'text', 1 => 'kisa_aciklama', 2 => 'Kısa Açıklama(seo)', 'seo için kısa açıklamanız gerekmektedir.'],
			[0 => 'text2', 1 => 'aciklama', 2 => 'Açıklama', 'Açıklama kısmı'],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'sayfalar'],
			[0 => 'hidden', 1 => 'yap', 20 => 'ekle'],
			[0 => 'submit', 20 => 'Sayfalara Ekle'],
		);

		echo sistem_formla($veriler);
	}


}


?>