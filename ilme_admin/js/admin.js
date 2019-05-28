/*
$(document).ready(function(){
	$("form").on('submit', function(){
		var veriler = $(this).serialize();

		alert(veriler[islem]);
		console.log(veriler);

	});
});
*/	

function admix_ajax(formveri){
	var ilme_admin = $('input[name="yol_admin_hidden"]').val();
	//verim = $('form.driver_register').serialize();

	var verim = new FormData($('form#'+formveri)[0]);
	$.ajax({
		type: 'POST',
		url: ilme_admin+'ajax.php',
		data: verim,
		contentType: false,
		processData: false,
		success: function(ok){
			$("span#"+formveri).hide().html(ok).fadeIn('slow');
			//$(cikti).html(ok);
		}
	});

	return false;
}
function admix_ajax_editor(formveri){
	var ilme_admin = $('input[name="yol_admin_hidden"]').val();
	//verim = $('form.driver_register').serialize();

	CKEDITOR.instances['ckeditorsistem'].updateElement();//CKEditor  bilgileri  aktarıyor.

	var verim = new FormData($('form#'+formveri)[0]);
	$.ajax({
		type: 'POST',
		url: ilme_admin+'ajax.php',
		data: verim,
		contentType: false,
		processData: false,
		success: function(ok){
			$("span#"+formveri).hide().html(ok).fadeIn('slow');
			//$(cikti).html(ok);
		}
	});

	return false;
}
function ajax_isle(deger){
	var ilme_admin = $('input[name="yol_admin_hidden"]').val();
	//CKEDITOR.instances['ckeditorsistem'].updateElement();//CKEditor  bilgileri  aktarıyor.

	var verim = $('form#'+deger).serialize();
	
	//var verim = new FormData($('form#'+deger)[0]);
	$.ajax({
		type: 'post',
		url: ilme_admin+'ajax.php',
		data: verim,
		success: function(ok){
			$("span#"+deger).hide().html(ok).fadeIn('slow');
		}
	});

	return false;
}
function sil(id, db){
	var ilme_admin = $('input[name="yol_admin_hidden"]').val();
	
	var verim={'id':id, 'db':db, 'islem':'sil'};

	$.ajax({
		type: 'post',
		url: ilme_admin+'ajax.php',
		data: $.param(verim),
		success: function(ok){
			$("span#sonuc").hide().html(ok).fadeIn('slow');
		}
	});
}