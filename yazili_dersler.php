<?php
	require "system/baglan.php";


	$cikti_array=part_function($array=array('basicdb','basic'));

	foreach($cikti_array as $cikti){
		require $cikti;
	}

	$title='';
	$desc='';
	$keyword='';
	$g_logo='';
	$url=url;
	$g_author='huutheme';

	require 'templates/'.site_template.'/controller/yazili_dersler.php';

		
?>