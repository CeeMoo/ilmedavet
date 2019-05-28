<?php
	require "../system/baglan.php";

$rutbem=array(1=>'Yönetici', 2=>'Yazar');
$onayli=array(1=>'Onaylı', 2=>'Onaysız');
$aktifmi=array(1=>'Aktif', 0=>'Pasif');

$array_tema_part=array(
		'static/control.php',
		'../templates/static/head.php');

	if(session('login') && session('login') == true && session('rutbe') == 1){
		if(!empty(g('sayfa'))){
			$sayfalarimiz=array('uyeler', 'ayarlar', 'dost_dernek', 'sayfalar', 'yazarlar', 'slider', 'yazili_dersler', 'goruntulu_dersler', 'sesli_dersler', 'cikis');

			if(in_array(g('sayfa'), $sayfalarimiz)){
				$sayfam_theme_system=g('sayfa');				
			}else{
				$sayfam_theme_system='anasayfa';
			}
		}else{
			$sayfam_theme_system="anasayfa";
		}
		$array_tema_part[].='static/header.php';
	}else{
		$sayfam_theme_system="login";
	}
		
	$array_tema_part[].='sayfalar/'.$sayfam_theme_system.'.php';
	$array_tema_part[].='../templates/static/footer.php';
	
	foreach($array_tema_part as $theme_cik){
		if(file_exists($theme_cik)){
			require $theme_cik;
		}
	}

?>