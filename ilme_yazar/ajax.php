<?php

require "../system/baglan.php";

$islem=p('islem');

	if(file_exists('ajax/'.$islem.'.php')){
		require 'ajax/'.$islem.'.php';
	}else{
		die('Sistem işlenicek yolu bulamadı.');
	}