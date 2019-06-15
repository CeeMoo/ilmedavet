<?php
	$slug=g('ic');

	/*
	$cikti_array=part_function($array=array('basicdb','basic'));

	foreach($cikti_array as $cikti){
		require $cikti;
	}
	*/

	//$goruntu_ic=$db->from('goruntulu_dersler')->where('slug', $slug)->first();

	if(empty($ic))
		die('Sonuca ulaşılamadı');

	$ses_ext_list=$db->from('goruntulu_extra')->select('id,baslik')->where('goruntulu_id', $ic['id'])->orderby('id', 'DESC')->all();
	
	$ses_ext=$db->from('goruntulu_extra')->where('goruntulu_id', $ic['id'])->orderby('id', 'DESC')->first();

	array_push($g_js, 'templates/'.site_template.'/assets/js/goruntulu_dersler.js');
?>

<div class="container">
	<div class="row mt-3">
		<div class="col-8">
		
			<div class="card mb-3">
			  <div class="row no-gutters">
			    <div class="col-md-4">
			      <img src="<?=$ic['resim']?>" class="card-img" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title"><?=$ic['baslik']?></h5>
			        <p class="card-text"><small class="text-muted"><?=$ic['tarih']?></small></p>
			      </div>
			    </div>
			  </div>
			</div>
		
			<div class="card mb-3">
				<div id="goruntulu_dersler_video" class="embed-responsive embed-responsive-16by9">
					<?php echo $ses_ext['aciklama']; ?>
				</div>
			
				<div class="btn-group" role="group">
				<?php foreach($ses_ext_list as $ses): ?>
				  <button type="button" class="btn btn-secondary" onclick="goruntulu_dersler_video(<?=$ses['id']?>)"><?=$ses['baslik']?></button>
				<?php endforeach; ?>
				</div>
			
				<div class="card-body">
					<p class="card-text"><?=$ic['aciklama']?></p>
				</div>
			</div>
		</div>
	</div>
</div>