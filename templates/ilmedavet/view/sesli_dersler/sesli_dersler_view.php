<?php
	$slug=g('ic');

	/*
	$cikti_array=part_function($array=array('basicdb','basic'));

	foreach($cikti_array as $cikti){
		require $cikti;
	}
	*/

	$ses_ic=$db->from('sesli_dersler')->where('slug', $slug)->first();

	if(empty($ses_ic))
		die('Sonuca ulaşılamadı');

	$ses_ext_list=$db->from('sesli_extra')->select('id,baslik')->where('sesli_id', $ses_ic['id'])->orderby('id', 'DESC')->all();
	
	$ses_ext=$db->from('sesli_extra')->where('sesli_id', $ses_ic['id'])->orderby('id', 'DESC')->first();

	array_push($g_js, 'templates/'.site_template.'/assets/js/sesli_dersler.js');
?>

<div class="container">
	<div class="card mb-3">
		<div id="sesli_dersler_video" class="embed-responsive embed-responsive-16by9">
			<?php echo $ses_ext['aciklama']; ?>
		</div>
	
		<div class="btn-group" role="group">
		<?php foreach($ses_ext_list as $ses): ?>
		  <button type="button" class="btn btn-secondary" onclick="sesli_dersler_video(<?=$ses['id']?>)"><?=$ses['baslik']?></button>
		<?php endforeach; ?>
		</div>
	
		<div class="card-body">
			<p class="card-text"><?=$ses_ic['aciklama']?></p>
		</div>
	</div>
</div>