
function goruntulu_dersler(id, slug){
	var verim={'id':id, 'slug':slug, 'islem':'goruntulu_derslerler'};

	$.ajax({
		type: 'post',
		url: 'ajax.php',
		data: $.param(verim),
		success: function(ok){
			$("span#goruntulu_dersler_icerik").hide().html(ok).fadeIn('slow');
		}
	});
}

function goruntulu_dersler_video(id){
	var verim={'id':id, 'islem':'goruntulu_dersler_video'};

	$.ajax({
		type: 'post',
		url: 'ajax.php',
		data: $.param(verim),
		success: function(ok){
			$("#goruntulu_dersler_video").hide().html(ok).fadeIn('slow');
		}
	});
}