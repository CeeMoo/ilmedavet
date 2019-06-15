<?php
	require "system/baglan.php";

	$sayfam_theme_system="anasayfa";

	$array_tema_part=array(
		'templates/'.site_template.'/control.php',
		"templates/".site_template."/controller/".$sayfam_theme_system.".php",
		'templates/static/head.php',
		'templates/'.site_template.'/site_ust.php',
		'templates/'.site_template.'/view/'.$sayfam_theme_system.'.php',
		'templates/'.site_template.'/site_alt.php',
		'templates/static/footer.php'
	);
	
	$title='';
	$desc='';
	$keyword='';
	$g_logo='';
	$url=url;
	$g_author='huutheme';
	
	foreach($array_tema_part as $theme_cik){
		if(file_exists($theme_cik)){
			require $theme_cik;
		}
	}
?>