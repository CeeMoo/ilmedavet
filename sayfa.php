<?php
	require "system/baglan.php";


	$cikti_array=part_function($array=array('basicdb','basic', 'post_islem'));

	foreach($cikti_array as $cikti){
		require $cikti;
	}

	if(!empty(g('s'))){
		$sayfa_slug=sef_link(g('s'));
		$say=$db->from('sayfalar')->where('slug', $sayfa_slug)->where('aktif', 1)->first();
	}


		$array_tema_part=array(
			'templates/'.site_template.'/control.php',
			'templates/static/head.php',
			'templates/'.site_template.'/site_ust.php',
			'templates/'.site_template.'/view/sayfa.php',
			'templates/'.site_template.'/site_alt.php',
			'templates/static/footer.php'
		);

		if(empty($say))
			$array_tema_part[3]='templates/hata404.php';

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