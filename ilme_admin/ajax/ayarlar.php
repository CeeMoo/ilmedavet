<?php

$cikti_array=part_function($array=array('post_islem','basicdb','basic'));

foreach($cikti_array as $cikti){
	require $cikti;
}


    foreach($_POST as $po => $post){
        if($po != 'islem'){
            $upla=$db->update('ayarlar')->where('veri', $po)->set(array('deger' => $post));
        }
    }

    if($upla){
    	echo alert('Başarılı <br />');
    	go(url_admin.'?sayfa=ayarlar', 'js', 1);
    }else{
    	echo alert('Sistem yazarı ile iletişime geçiniz.<br />');
    }