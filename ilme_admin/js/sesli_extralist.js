

function goruntulu_extra_ekle(){
	var ilme_admin = $('input[name="yol_admin_hidden"]').val();
	var gonder={'islem' : 'sesli_dersler', 'yap' : 'sesli_extra_ekle'};

	$.ajax({
		type: 'post',
		url: ilme_admin+'ajax.php',
		data: $.param(gonder),
		success: function(ok){
			$("#extra_id").hide().prepend(ok).fadeIn('slow');
		}
	});
}

function goruntulu_extra_sil(id){
	var ilme_admin = $('input[name="yol_admin_hidden"]').val();
	var gonder={'islem' : 'sesli_dersler', 'yap' : 'sesli_extra_sil', 'id':id};

	$.ajax({
		type: 'post',
		url: ilme_admin+'ajax.php',
		data: $.param(gonder),
		success: function(ok){
			$("#extra_id").hide().prepend(ok).fadeIn('slow');
		}
	});
}