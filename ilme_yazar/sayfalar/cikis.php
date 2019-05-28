<?php

if(session_destroy()){
	echo alert('Çıkış yapıldı');
	go(url_yazar, 'js', 1);
}
