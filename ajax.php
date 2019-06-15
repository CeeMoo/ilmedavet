<?php

require "system/baglan.php";

$islem=p('islem');

	if(file_exists('templates/'.site_template.'/ajax/'.$islem.'.php')){
		require 'templates/'.site_template.'/ajax/'.$islem.'.php';
	}else{
		die('Sistem işlenicek yolu bulamadı.');
	}
