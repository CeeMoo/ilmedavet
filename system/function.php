<?php

	function uye_kontrol(){
		if(session('rutbe') == 1){

		}else{
			go(url_admin, 'js');
		}

	}

	function system_dosya_cagir($array, $islem='js'){
		$cikti='';

		if($islem == 'js'){
			$ekle='<script src="';
			$ekle2='"></script>';
		}elseif($islem== 'css'){
			$ekle='<link rel="stylesheet" href="';
			$ekle2='">';
		}elseif($islem=='javascript'){
			$ekle='<script>';
			$ekle2='</script>';
		}elseif($islem=='ozelalan'){
			$ekle='';
			$ekle2='';
		}

		foreach($array as $arr){
			$cikti.=$ekle.$arr.$ekle2."\n\t";
		}

		return $cikti;
	}

	function part_function($array){
		if(empty($array))
			return false;

		$array_cikti=array();
		foreach($array as $arr){
			$array_cikti[].=ROOT."/system/function/".$arr.".php";
		}

		return $array_cikti;
	}

	function debugger($item, $islem='print'){
	    echo "<pre>";
	    if($islem='var'){
	    	var_dump($item);
	    }else{
	    	print_r($item);
	    }
	    echo "</pre>";
	}

	//Html vb.. kodları parçala
	function ss($par, $kir=false){
		if($kir){
			$par = html_entity_decode(htmlspecialchars(addslashes(trim(strip_tags($par)))));
			$par = preg_replace("/&#?[a-z0-9]{2,8};/i","",$par);
			$par = preg_replace("/\n+/","",$par);
			$par = str_replace("	", "", $par);
			return $par;
		}else{
			return stripslashes($par);
		}
	}
	//Sisteme götür
	function go($par, $islem='php', $time = 0){
		if($islem == 'php'){
			header("Refresh: {$time}; url={$par}");
		}elseif($islem == 'html'){
			echo '<meta http-equiv="refresh" content="'.$time.'; url='.$par.'" />';
		}elseif($islem == 'js'){
			echo '<script>setTimeout(function(){window.location.href="'.$par.'"}, '.$time.'000);</script>';
		}
	}

	function alert($dgr, $alt=1){
		$alert_array=array(1 => 'warning', 'danger', 'success', 'primary', 'secondary', 'info', 'light', 'dark');

		$cikti='<div class="alert alert-'.$alert_array[$alt].' alert-dismissible fade show" role="alert">'.$dgr.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

		return $cikti;
	}


	//Post verilerini parçala
	function p($par, $st=false){
		if($st){
			return htmlspecialchars(addslashes(trim($_POST[$par])));
		}else{
			return addslashes(trim($_POST[$par]));
		}
	}
	//Get verilerini alma
	function g($par){
		if(isset($_GET[$par])){
			return strip_tags(trim(addslashes($_GET[$par])));
		}else{
			return false;
		}
	}
	//Sistemde yazı kısalt
	function kisalt($par, $uzunluk = 50){
		if(strlen($par) > $uzunluk){
			$par = mb_substr($par, 0, $uzunluk, "UTF-8")."...";
		}
		return $par;
	}
	//Sessinı getir
	function session($par){
		if(isset($_SESSION[$par])){
			return $_SESSION[$par];
		}else{
			return false;
		}
	}
	//Cookie sistemini getir
	function cookie($par){
		if(isset($_COOKIE[$par])){
			return $_COOKIE[$par];
		}else{
			return false;
		}
	}
	//Session olustur
	function session_olustur($par){
		foreach($par as $anahtar => $deger){
			$_SESSION[$anahtar] = $deger;
		}
	}

	//Mail kasmadan göndermek için yollama zamanı
	function mail_yolla($froma, $fromname, $addaddress, $subject, $body){
	    $tarih_strtotime=strtotime("now");
	    $yap=isle("INSERT INTO mail_sistem (froma, fromname, addaddress, subject, body, tarih_strtotime) VALUES ('$froma','$fromname','$addaddress','$subject','$body', '$tarih_strtotime')", 6);

	    if($yap){
	      echo "
	      <script>
	      $.ajax({
	        type: 'post',
	        url: 'ajax.php',
	        data: 'islem=mailyolla&emailid=".$yap."',
	      });
	      </script>";
	    }
	}

	