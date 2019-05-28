<?php

if($_SERVER['HTTP_HOST'] == 'localhost'){
	$config=array(
		'server' => 'localhost',
		'user' => 'root',
		'pass' => '',
		'db' => 'ilmedavet',
	);
}else{
	$config=array(
		'server' => 'localhost',
		'user' => 'root',
		'pass' => '',
		'db' => 'ilmedavet',
	);
}
	## Hataları Göster ##
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	//ob_start("ob_gzhandler");
	ob_start();
	session_start();

	require "function.php";

		## DB bağlanma zamanı ##
		try{
			$bag=new PDO("mysql:host={$config['server']};dbname={$config['db']}", $config['user'], $config['pass']);
		}catch(PDOExcention $e){
			debugger($e, 'var');
		}

		$bag->query("SET CHARACTER SET 'utf8'");
		$bag->query("SET NAMES 'utf8'");

			$ayar=$bag->query("SELECT veri,deger FROM ayarlar WHERE gosterim=1")->fetchAll(PDO::FETCH_ASSOC);

				##Sabitler
				define("url", $ayar[0]['deger']);
				define("url_admin", $ayar[0]['deger'].$ayar[5]['deger']."/");
				define("url_yazar", $ayar[0]['deger'].$ayar[6]['deger']."/");
				define("url_resim", url."images/");
				//define("ANAYOL", realpath('.')."\\");
				define("ANAYOL", $_SERVER['DOCUMENT_ROOT']."/ilmedavet/");
				define('ROOT', dirname(__DIR__));

				define("site_template", $ayar[4]['deger']);
				define('url_yol', 'templates/'.site_template.'/assets/');

		        define("title",$ayar[1]["deger"]);

		        //define("keywords",$ayar["site_keywords"]);   
		        //define("descriptions",$ayar["site_descriptions"]);

				/*
				//Sabitler DB geliyor
		        //define("URL",$ayar["site_url"]); 
		        define("LOGO",$ayar["site_logo"]);   
		        define("FACEBOOK",$ayar["site_facebook"]);   
		        define("TWITTER",$ayar["site_twitter"]); 
		        define("INSTAGRAM",$ayar["site_instagram"]); 
		        define("PHONE",$ayar["site_phone"]);
		        define("EMAIL",$ayar["site_email"]);
		        define("STATUS",$ayar["site_status"]);
		        */

	ob_end_flush();