<?php
$cikti_array=part_function($array=array('post_islem','basicdb','basic','formla'));

foreach($cikti_array as $cikti){
	require $cikti;
}


array_push($g_js, '../dokumantasyon/editor/ckeditor.js','js/editor.js');


echo '
<div class="container-fluid">
	<div class="row p-3">';

	g('alt') ? $gel=g('alt') : $gel='anasayfa';

	uyeler::$gel();

echo '</div>
</div>';

class uyeler{

	public static function anasayfa(){
		uyeler::duzenle();
	}

	public static function duzenle(){
		global $db,$aktifmi,$rutbem;

		$id=session('id');

		$uye_yazar_kontrol=$db->from('yazarlar')->select('count(id) as total')->where('uye_id', $id)->total();
		
		if($uye_yazar_kontrol == 0){
			
			$yazar_uyelik_ekle=$db->insert('yazarlar')
			->set([
				'uye_id' => $id,
				'resim' => 'images/yazar_profil/bos.gif',
				'aktif' => 1]
			);

		}else{

			$yazar=$db->from('yazarlar')->where('uye_id', $id)->first();
			
			$veriler=array(
				[0 => 'file', 1 => 'resim', 2 => 'Yazar Profil Resmi', 'Profil Resim'],
				[0 => 'text', 1 => 'kisa_aciklama', 2 => 'Kısa Açıklama(seo)', 'yazarın google tarafında daha iyi bulunabilmesi için yazarın biyografisiniz kısa açıklaması'],
				[0 => 'text2', 1 => 'aciklama', 2 => 'Açıklama', 'Açıklama kısmı'],
				[0 => 'select', 1 => 'aktif', 2 => 'Aktif', 50 => $aktifmi],
				[0 => 'hidden', 1 => 'islem', 20 => 'yazar'],
				[0 => 'hidden', 1 => 'yap', 20 => 'duzenle'],
				[0 => 'hidden', 1 => 'id', 20 => $id],
				[0 => 'submit', 20 => 'Yazar Bilgileri Düzenle'],
			);

			echo sistem_formla($veriler, 'yazar', $yazar);

		}

	}


}


?>