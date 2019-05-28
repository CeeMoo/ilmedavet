<?php

if(session_destroy()){
	echo alert('Çıkış yapıldı', 2);
	go(url_admin, 'js', 1);
}
