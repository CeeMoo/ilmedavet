<?php

	$array_tema_part=array(
		'templates/'.site_template.'/control.php',
		'templates/static/head.php',
		'templates/'.site_template.'/site_ust.php',
		'templates/'.site_template.'/view/sesli_dersler/sesli_dersler.php',
		'templates/'.site_template.'/site_alt.php',
		'templates/static/footer.php'
	);

	switch(g('sayfa')){
		case 'icerik':
			if(empty(g('ic')))
				$array_tema_part[3]='templates/hata404.php';

			$ic=$db->from('sesli_dersler')->where('slug', g('ic'))->where('aktif', 1)->first();

			$array_tema_part[3]='templates/'.site_template.'/view/sesli_dersler/sesli_dersler_view.php';

			if(empty($ic))
				$array_tema_part[3]='templates/hata404.php';
		break;
		case 'kategori':
			if(empty(g('kat')))
				$array_tema_part[3]='templates/hata404.php';
			
			$kat_id_yak=$db->from('sesli_dersler_kat')->select('id')->where('slug', g('kat'))->where('aktif', 1)->first();

			if(!empty($kat_id_yak)){
				$kat_gel=$db->from('sesli_dersler_kat')->select('id,baslik,slug')->where('aktif', 1)->all();

				// pagination example
				$totalRecord = $db->from('sesli_dersler')
				                ->select('count(id) as total')
				                ->where('kat_id', $kat_id_yak['id'])
				                ->total();


				$pageLimit = 4;
				if($totalRecord > 0){
					$pageParam = 's';
					$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

					$pageParam='sayfa=kategori&kat='.g('kat').'&s';

					$ses_gel = $db->from('sesli_dersler')
								->select('id,baslik,slug,aciklama')
								->orderby('id', 'DESC')
								->where('kat_id', $kat_id_yak['id'])
								->where('aktif', 1)
								->limit($pagination['start'], $pagination['limit'])
								->all();
				}
			}else{
				$array_tema_part[3]='templates/hata404.php';
			}

		break;

		default:
			$kat_gel=$db->from('sesli_dersler_kat')->select('id,baslik,slug')->where('aktif', 1)->all();

			//$ses_gel=$db->from('sesli_dersler')->select('id,baslik,slug,aciklama')->where('aktif', 1)->limit(0,3)->all();

			// pagination example
			$totalRecord = $db->from('sesli_dersler')->select('count(id) as total')->total();

			$pageLimit = 2;
			if($totalRecord > 0){
				$pageParam = 's';
				$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

				$ses_gel = $db->from('sesli_dersler')
							  ->select('id,baslik,slug,aciklama')
					          ->orderby('id', 'DESC')
					          ->where('aktif', 1)
					          ->limit($pagination['start'], $pagination['limit'])
					          ->all();
			}
		break;

	}

	foreach($array_tema_part as $theme_cik){
		if(file_exists($theme_cik)){
			require $theme_cik;
		}
	}