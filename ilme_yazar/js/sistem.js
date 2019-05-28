	function admix_ajax(formveri){
		var ilme_yazar = $('input[name="yol_yazar_hidden"]').val();
		//verim = $('form.driver_register').serialize();

		var verim = new FormData($('form#'+formveri)[0]);
		$.ajax({
			type: 'POST',
			url: ilme_yazar+'ajax.php',
			data: verim,
			contentType: false,
			processData: false,
			success: function(ok){
				$("span#"+formveri).hide().html(ok).fadeIn('slow');
			}
		});

		return false;
	}
	function admix_ajax_editor(formveri){
		var ilme_yazar = $('input[name="yol_yazar_hidden"]').val();
		//verim = $('form.driver_register').serialize();

		CKEDITOR.instances['ckeditorsistem'].updateElement();//CKEditor  bilgileri  aktarıyor.

		var verim = new FormData($('form#'+formveri)[0]);
		$.ajax({
			type: 'POST',
			url: ilme_yazar+'ajax.php',
			data: verim,
			contentType: false,
			processData: false,
			success: function(ok){
				$("span#"+formveri).hide().html(ok).fadeIn('slow');
			}
		});

		return false;
	}
	function ajax_isle(deger){
		var ilme_yazar = $('input[name="yol_yazar_hidden"]').val();

		CKEDITOR.instances['ckeditorsistem'].updateElement();//CKEditor  bilgileri  aktarıyor.

		var verim = $('form#'+deger).serialize();
		
		//var verim = new FormData($('form#'+deger)[0]);
		$.ajax({
			type: 'post',
			url: ilme_yazar+'ajax.php',
			data: verim,
			success: function(ok){
				$("span#"+deger).hide().html(ok).fadeIn('slow');
			}
		});

		return false;
	}

	function sil(id, db){
		var ilme_yazar = $('input[name="yol_yazar_hidden"]').val();
		
		var verim={'id':id, 'db':db, 'islem':'sil'};

		$.ajax({
			type: 'post',
			url: ilme_yazar+'ajax.php',
			data: $.param(verim),
			success: function(ok){
				$("span#sonuc").hide().html(ok).fadeIn('slow');
			}
		});
	}