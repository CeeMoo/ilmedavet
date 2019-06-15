
function sesli_ders(id, slug){
	var verim={'id':id, 'slug':slug, 'islem':'sesli_dersler'};

	$.ajax({
		type: 'post',
		url: 'ajax.php',
		data: $.param(verim),
		success: function(ok){
			$("span#sesli_ders_icerik").hide().html(ok).fadeIn('slow');
		}
	});
}

function sesli_dersler_video(id){
	var verim={'id':id, 'islem':'sesli_dersler_video'};

	$.ajax({
		type: 'post',
		url: 'ajax.php',
		data: $.param(verim),
		success: function(ok){
			$("#sesli_dersler_video").hide().html(ok).fadeIn('slow');
		}
	});
}