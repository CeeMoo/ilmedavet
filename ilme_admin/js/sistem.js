function sil(id, db){
	var verim={'id':id, 'db':db, 'islem':'sil_db'};

	$.ajax({
		type: 'post',
		url: '/ilmedavet/ajax.php',
		data: $.param(verim),
		success: function(ok){
			$("span#sonuc").hide().html(ok).fadeIn('slow');
		}
	});
}