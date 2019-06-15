<?php

	$array_tema_part=array(
		'templates/'.site_template.'/control.php',
		'templates/static/head.php',
		'templates/'.site_template.'/site_ust.php',
		'templates/'.site_template.'/view/yazarlar/yazarlar.php',
		'templates/'.site_template.'/site_alt.php',
		'templates/static/footer.php'
	);

	switch(g('sayfa')){
		case 'incele':
			if(empty(g('ic')))
				$array_tema_part[3]='templates/hata404.php';

			$ic=$db->from('yazar_makale')->where('slug', g('ic'))->where('aktif', 1)->first();

			if(empty($ic)){
				$array_tema_part[3]='templates/hata404.php';
			}else{
				$title=$ic['baslik']." ";

				$array_tema_part[3]='templates/'.site_template.'/view/yazarlar/yazarlar_view.php';
			}

		break;

		case 'kategori':
			if(empty(g('kat')))
				$array_tema_part[3]='templates/hata404.php';
			
			$kat_id_yak=$db->from('yazar_makale_kat')->select('id')->where('slug', g('kat'))->where('aktif', 1)->first();

			if(!empty($kat_id_yak)){
				$kat_gel=$db->from('yazar_makale_kat')->select('id,baslik,slug')->where('aktif', 1)->all();

				// pagination example
				$totalRecord = $db->from('yazar_makale')
				                ->select('count(id) as total')
				                ->where('kat_id', $kat_id_yak['id'])
								->where('aktif', 1)
				                ->total();


				$pageLimit = 4;
				if($totalRecord > 0){
					$pageParam = 's';
					$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

					$pageParam='sayfa=kategori&kat='.g('kat').'&s';

					$yazar_makale_gel = $db->from('yazar_makale')
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
			$kat_gel=$db->from('yazar_makale_kat')->select('id,baslik,slug')->where('aktif', 1)->all();

			//$yazar_makale_gel=$db->from('yazar_makale')->select('id,baslik,slug,aciklama')->where('aktif', 1)->limit(0,3)->all();

			// pagination example
			$totalRecord = $db->from('yazar_makale')->select('count(id) as total')->where('aktif', 1)->total();

			$pageLimit = 2;
			if($totalRecord > 0){
				$pageParam = 's';
				$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

				$yazar_makale_gel = $db->from('yazar_makale')
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