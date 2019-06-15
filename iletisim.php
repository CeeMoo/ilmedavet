<?php
	require "system/baglan.php";


	$cikti_array=part_function($array=array('basicdb','basic'));

	foreach($cikti_array as $cikti){
		require $cikti;
	}

	$ilet=$db->from('sayfalar')->where('id', 3)->first();

		$array_tema_part=array(
			'templates/'.site_template.'/control.php',
			'templates/static/head.php',
			'templates/'.site_template.'/site_ust.php',
			'templates/'.site_template.'/view/iletisim.php',
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