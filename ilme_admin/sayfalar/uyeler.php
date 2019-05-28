<?php
$cikti_array=part_function($array=array('post_islem','basicdb','basic','formla'));

foreach($cikti_array as $cikti){
	require $cikti;
}

$cek_css=array(
	'../templates/DataTables/datatables.css',
);

array_push($g_js, '../templates/DataTables/datatables.min.js', 'js/editor.js');

echo system_dosya_cagir($cek_css, 'css');


echo '
<div class="container-fluid">
	<div class="row p-3">';

	g('alt') ? $gel=g('alt') : $gel='anasayfa';

	uyeler::$gel();

echo '</div>
</div>';

class uyeler{

	public static function anasayfa(){
		uyeler::listele();
	}

	public static function listele(){
		global $db,$onayli,$rutbem;
		
		$uyeler=$db->from('uyeler')->where('id', 0, '!=')->all();

		echo '<div class="col-12">
			<span id="sonuc"></span>
			<div class="p-2 text-center">
				<a href="'.url_admin.'?sayfa=uyeler&alt=ekle" class="btn btn-info">Üye Ekle</a>
			</div>
			<table id="listele" class="table">
			  <thead>
			    <tr>
			      <th scope="col">#ID</th>
			      <th scope="col">Adı</th>
			      <th scope="col">Rütbe</th>
			      <th scope="col">Durum</th>
			      <th scope="col">İşlem</th>
			    </tr>
			  </thead>
			  <tbody>';
					foreach($uyeler as $uye){
						echo '<tr id="'.$uye['id'].'">
							<th scope="row">'.$uye['id'].'</th>
							<td>'.$uye['adi'].'</td>
							<td>'.$rutbem[$uye['rutbe']].'</td>
							<td>'.$onayli[$uye['onay']].'</td>
							<td>
								<a href="'.url_admin.'?sayfa=uyeler&alt=duzenle&id='.$uye['id'].'" class="btn btn-info">Düzenle</a>
								<a href="javascript:void(0);" onclick="sil(\''.$uye['id'].'\', \'uyeler\')" class="btn btn-danger">Sil</a>
							</td>
						</tr>';
					}
				echo '
			  </tbody>
			</table>
		</div>';
	}

	public static function duzenle(){
		global $db,$onayli,$rutbem;

		$uye=$db->from('uyeler')->where('id', g('id'))->first();

		$veriler=array(
			[0 => 'input', 1 => 'adi', 2 => 'Kullanıcı adi'],
			[0 => 'input', 1 => 'sifre', 2 => 'Şifresi'],
			[0 => 'select', 1 => 'rutbe', 2 => 'Rütbe', 50 => $rutbem],
			[0 => 'select', 1 => 'onay', 2 => 'Onay', 50 => $onayli],
			[0 => 'hidden', 1 => 'islem', 20 => 'uyeler'],
			[0 => 'hidden', 1 => 'yap', 20 => 'duzenle'],
			[0 => 'hidden', 1 => 'id', 20 => g('id')],
			[0 => 'submit', 20 => 'Gönder'],
		);

		echo sistem_formla($veriler, 'uyeler', $uye);
	}

	public static function ekle(){
		global $onayli,$rutbem;

		$veriler=array(
			[0 => 'input', 1 => 'adi', 2 => 'Kullanıcı adi', 3 => 'Giriş yapılacak kullanıcı adi'],
			[0 => 'input', 1 => 'sifre', 2 => 'Şifresi', 'Kullanıcının şifresi'],
			[0 => 'select', 1 => 'rutbe', 2 => 'Rütbe', 50 => $rutbem],
			[0 => 'select', 1 => 'onay', 2 => 'Onay', 50 => $onayli],
			[0 => 'hidden', 1 => 'islem', 20 => 'uyeler'],
			[0 => 'hidden', 1 => 'yap', 20 => 'ekle'],
			[0 => 'hidden', 1 => 'id', 20 => g('id')],
			[0 => 'submit', 20 => 'Gönder'],
		);

		echo sistem_formla($veriler, 'uyeler');
	}


}


?>