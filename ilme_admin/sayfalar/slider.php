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

	slider::$gel();

echo '</div>
</div>';

class slider{

	public static function anasayfa(){
		slider::listele();
	}

	public static function listele(){
		global $db,$aktifmi;

		$totalRecord = $db->from('slider')->select('count(id) as total')->total();

		
		echo '<div class="col-12">
			<div class="p-2 text-center">
				<a href="'.url_admin.'?sayfa=slider&alt=ekle" class="btn btn-info">Slider Ekle</a>
			</div>';

		if($totalRecord > 0){
			$slidere=$db->from('slider')->all();
			
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
					foreach($slidere as $slider){
						echo '<tr id="'.$slider['id'].'">
							<th scope="row">'.$slider['id'].'</th>
							<td>'.$slider['baslik'].'</td>
							<td>'.$aktifmi[$slider['aktif']].'</td>
							<td>
								<a href="'.url_admin.'?sayfa=slider&alt=duzenle&id='.$slider['id'].'" class="btn btn-info">Düzenle</a>
								<a href="javascript:void(0);" onclick="sil(\''.$slider['id'].'\', \'slider\')" class="btn btn-danger">Sil</a>
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

		$slider=$db->from('slider')->where('id', g('id'))->first();

		$veriler=array(
			[0 => 'input', 1 => 'baslik', 2 => 'Başlık', 'Slider Tanımı'],
			[0 => 'file', 1 => 'resim', 2 => 'Slider Resmi', 'Slider Resim'],
			[0 => 'input', 1 => 'link', 2 => 'Link', 'Link URL'],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'slider'],
			[0 => 'hidden', 1 => 'yap', 20 => 'duzenle'],
			[0 => 'hidden', 1 => 'id', 20 => g('id')],
			[0 => 'submit', 20 => 'Slider Bilgileri Düzenle'],
		);

		echo sistem_formla($veriler, 'slider', $slider);
	}

	public static function ekle(){
		global $aktifmi,$db;

		$veriler=array(
			[0 => 'input', 1 => 'baslik', 2 => 'Başlık', 'Slider Tanımı'],
			[0 => 'file', 1 => 'resim', 2 => 'Slider Resmi', 'Slider Resim'],
			[0 => 'input', 1 => 'link', 2 => 'Link', 'Link URL'],
			[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
			[0 => 'hidden', 1 => 'islem', 20 => 'slider'],
			[0 => 'hidden', 1 => 'yap', 20 => 'ekle'],
			[0 => 'submit', 20 => 'Slider Ekle'],
		);

		echo sistem_formla($veriler);
	}


}


?>