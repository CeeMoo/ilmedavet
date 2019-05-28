<?php

$cikti_array=part_function($array=array('post_islem','basicdb','basic','formla'));

foreach($cikti_array as $cikti){
	require $cikti;
}


echo '
<div class="container-fluid">
	<div class="row p-3">';

	g('alt') ? $gel=g('alt') : $gel='ana_ayarlar';

	ayarlar::$gel();

echo '</div>
</div>';

class ayarlar{
	public static function ana_ayarlar(){
		global $db;

		$ayarlar=$db->from('ayarlar')->where('gosterim', 1)->all();

		$veriler=array();

		foreach($ayarlar as $ay){
		    $veriler[]=[0=>$ay['type'],1=>$ay['veri'],2=>$ay['baslik'],3=>$ay['deger']];
		}

		$veriler[]=[0=>'hidden', 1=>'islem', 20=>'ayarlar'];
		$veriler[]=[0=>'submit', 20=>'Gönder'];

		echo sistem_formla_ayarlar($veriler, 'ayarlar', $ayarlar);
	}
}

 ?>