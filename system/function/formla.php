<?php

	function sistem_formla($veriler, $ajax_islem='bilinmiyor', $db=NULL){
		$cikti='<div class="col-8">';
		$cikti.='<form id="'.$ajax_islem.'" method="post" action="javascript:void(0);">';

		$ajax_func='admix_ajax';

		if($db == NULL){
			foreach($veriler as $ver => $ve){
				if($ve[0] == 'input'){
					$cikti.='<div class="form-group">
				    <label for="'.$ve[1].'">'.$ve[2].'</label>
				    <input type="input" name="'.$ve[1].'" class="form-control" id="'.$ve[1].'" '.(!empty($ve[3]) ? 'placeholder="'.$ve[3].'"' : null).'>
				  </div>';
				}elseif($ve[0] == 'text'){
					$cikti.='<div class="form-group">
				    <label for="'.$ve[1].'">'.$ve[2].'</label>
				    <textarea name="'.$ve[1].'" id="'.$ve[1].'" class="form-control" cols="30" rows="5" '.(!empty($ve[3]) ? 'placeholder="'.$ve[3].'"' : null).'></textarea>
				  </div>';
				}elseif($ve[0] == 'extra'){
					$cikti.='<div class="form-group position-relative">
					<div id="extra_id">
						<div id="extra0" class="row">';
						
						if(!empty($ve[50])){
							$cikti.='<div class="col-3"><select class="form-control" name="'.$ve[1].'[0][select]" id="'.$ve[1].'">';
						    	foreach($ve[50] as $ver => $veri){
						    		$cikti.='<option value="'.$ver.'">'.$veri.'</option>';
						    	}
						    $cikti.='</select></div>';
						}
						
						$cikti.='<div class="col-3"><input type="text" class="form-control" name="'.$ve[1].'[0][baslik]" placeholder="Başlık"></div>
							<div class="col"><input type="text" class="form-control" name="'.$ve[1].'[0][aciklama]" placeholder="İframe Kodu"></div>
						</div>';
						$cikti.='<div class="text-center m-3" style="font-size:20px">
							<button class="btn btn-info" onclick="goruntulu_extra_ekle();"><i class="fas fa-grip-horizontal"></i></button>
						</div>
					</div>';
				  $cikti.='</div>';
				}elseif($ve[0] == 'file'){
					$cikti.='<div class="form-group position-relative">
				    <input type="file" name="'.$ve[1].'" class="custom-file-input" id="'.$ve[1].'">
    				<label class="custom-file-label" for="'.$ve[1].'" '.(!empty($ve[3]) ? 'data-browse="'.$ve[3].'"' : null).'>'.$ve[2].'</label>
				  </div>';
				}elseif($ve[0] == 'text2'){
					$cikti.='<div class="form-group">
				    <label for="'.$ve[1].'">'.$ve[2].'</label>
				    <textarea name="'.$ve[1].'" id="ckeditorsistem" class="form-control ckeditor" cols="30" rows="5" '.(!empty($ve[3]) ? 'placeholder="'.$ve[3].'"' : null).'></textarea>
				  </div>';
				  $ajax_func='admix_ajax_editor';
				}elseif($ve[0] == 'select'){
					$cikti.='<div class="form-group">
				    <label for="'.$ve[1].'">'.$ve[2].'</label>
				    <select class="form-control" name="'.$ve[1].'" id="'.$ve[1].'">';
				    	foreach($ve[50] as $ver => $veri){
				    		$cikti.='<option value="'.$ver.'">'.$veri.'</option>';
				    	}
				    $cikti.='</select>';
			    	//$cikti.='<script>$("select[name=\''.$ve[1].'\']").val('.$db[$ve[1]].').change();</script>';
				  $cikti.='</div>';
				}elseif($ve[0] == 'hidden'){
					$cikti.='<input type="hidden" name="'.$ve[1].'" value="'.$ve[20].'">';
				}elseif($ve[0] == 'submit'){
					$submit='<button type="submit" class="btn btn-success w-100" onclick="'.$ajax_func.'(\''.$ajax_islem.'\')">'.$ve[20].'</button>';
				}
			}
		}else{
			foreach($veriler as $ver => $ve){
				if($ve[0] == 'input'){
					$cikti.='<div class="form-group">
				    <label for="'.$ve[1].'">'.$ve[2].'</label>
				    <input type="input" name="'.$ve[1].'" class="form-control" id="'.$ve[1].'" value="'.$db[$ve[1]].'">
				  </div>';
				}elseif($ve[0] == 'text'){
					$cikti.='<div class="form-group">
				    <label for="'.$ve[1].'">'.$ve[2].'</label>
				    <textarea name="'.$ve[1].'" id="'.$ve[1].'" class="form-control" cols="30" rows="5" '.(!empty($ve[3]) ? 'placeholder="'.$ve[3].'"' : null).'>'.$db[$ve[1]].'</textarea>
				  </div>';
				}elseif($ve[0] == 'extra'){
					$cikti.='<div class="form-group position-relative">
					<div id="extra_id">';
						
						global $bag;

						$extra_gel=$bag->query("SELECT * FROM goruntulu_extra WHERE goruntulu_id='{$db['id']}'")->fetchAll(PDO::FETCH_ASSOC);

						foreach($extra_gel as $ext){
							$cikti.='<div id="extra'.$ext['id'].'" class="row pb-2">';
								$cikti.='<div class="col-3"><select class="form-control extra'.$ext['id'].'" name="extra['.$ext['id'].'][select]">';
								$sabit_extra=$bag->query("SELECT * FROM sabit_extra WHERE gorunum=1")->fetchAll(PDO::FETCH_ASSOC);
									foreach($sabit_extra as $s_ext){
										$cikti.='<option value="'.$s_ext['id'].'">'.$s_ext['baslik'].'</option>';
									}
								$cikti.='</select></div>';
								$extra_gel_val=$bag->query("SELECT * FROM sabit_extra WHERE gorunum=1 && baslik='{$ext['baslik']}'")->fetch(PDO::FETCH_ASSOC);
								if(!empty($extra_gel_val)){
									$cikti.='<script>$(".extra'.$ext['id'].'").val('.$extra_gel_val['id'].').change();</script>';
								}
							
							$cikti.='<div class="col-3"><input type="text" class="form-control" name="'.$ve[1].'['.$ext['id'].'][baslik]" value="'.$ext['baslik'].'"></div>
								<div class="col"><input type="text" class="form-control" name="'.$ve[1].'['.$ext['id'].'][aciklama]" value="'.$ext['aciklama'].'"></div>
								<div class="float-right"><button class="btn btn-info" onclick="goruntulu_extra_sil('.$ext['id'].');"><i class="fas fa-backspace"></i></button></div>
							</div>';
						}

						$cikti.='<div class="text-center m-3" style="font-size:20px">
							<button class="btn btn-info" onclick="goruntulu_extra_ekle();"><i class="fas fa-grip-horizontal"></i></button>
						</div>
					</div>';
				  $cikti.='</div>';
				}elseif($ve[0] == 'file'){
					$cikti.='<img src="'.url.$db[$ve[1]].'" alt="'.$ve[2].'" class="rounded mx-auto d-block" style="width:210px;">';
					$cikti.='<div class="form-group position-relative">
				    <input type="file" name="'.$ve[1].'" class="custom-file-input" id="'.$ve[1].'">
    				<label class="custom-file-label" for="'.$ve[1].'" '.(!empty($ve[3]) ? 'data-browse="'.$ve[3].'"' : null).'>'.$ve[2].'</label>
				  </div>';
				}elseif($ve[0] == 'text2'){
					$cikti.='<div class="form-group">
				    <label for="'.$ve[1].'">'.$ve[2].'</label>
				    <textarea name="'.$ve[1].'" id="ckeditorsistem" class="form-control ckeditor" cols="30" rows="5" '.(!empty($ve[3]) ? 'placeholder="'.$ve[3].'"' : null).'>'.htmlspecialchars_decode($db[$ve[1]]).'</textarea>
				  </div>';
				  $ajax_func='admix_ajax_editor';
				}elseif($ve[0] == 'select'){
					$cikti.='<div class="form-group">
				    <label for="'.$ve[1].'">'.$ve[2].'</label>
				    <select class="form-control" name="'.$ve[1].'" id="'.$ve[1].'">';
				    	foreach($ve[50] as $ver => $veri){
				    		$cikti.='<option value="'.$ver.'">'.$veri.'</option>';
				    	}
				    $cikti.='</select>';
			    	$cikti.='<script>$("select[name=\''.$ve[1].'\']").val('.$db[$ve[1]].').change();</script>
				  </div>';
				}elseif($ve[0] == 'hidden'){
					$cikti.='<input type="hidden" name="'.$ve[1].'" value="'.$ve[20].'">';
				}elseif($ve[0] == 'submit'){
					$submit='<button type="submit" class="btn btn-success w-100" onclick="'.$ajax_func.'(\''.$ajax_islem.'\')">'.$ve[20].'</button>';
				}
			}
		}
			

		$cikti.='</form>';
		$cikti.='</div>';

		$cikti.='<div class="col-4"><div class="mb-2">'.$submit.'</div>
		<span id="'.$ajax_islem.'"></span></div>';

		return $cikti;
	}


	function sistem_formla_ayarlar($veriler, $ajax_islem='bilinmiyor', $db=NULL){
		$cikti='<div class="col-8">
			<form id="'.$ajax_islem.'" method="post" action="javascript:void(0);">';

		foreach($veriler as $ver => $ve){
			if($ve[0] == 'input'){
				$cikti.='<div class="form-group">
			    <label for="'.$ve[1].'">'.$ve[2].'</label>
			    <input type="input" name="'.$ve[1].'" class="form-control" id="'.$ve[1].'" value="'.$ve[3].'">
			  </div>';
			}elseif($ve[0] == 'select'){
				$cikti.='<div class="form-group">
			    <label for="'.$ve[1].'">'.$ve[2].'</label>
			    <select class="form-control" name="'.$ve[1].'" id="'.$ve[1].'">';
			    	foreach($ve[50] as $ver => $veri){
			    		$cikti.='<option value="'.$ver.'">'.$veri.'</option>';
			    	}
			    $cikti.='</select>';
		    	$cikti.='<script>$("select[name=\''.$ve[1].'\']").val('.$db[$ve[1]].').change();</script>
			  </div>';
			}elseif($ve[0] == 'hidden'){
				$cikti.='<input type="hidden" name="'.$ve[1].'" value="'.$ve[20].'">';
			}elseif($ve[0] == 'submit'){
				$cikti.='<button type="submit" class="btn btn-primary" onclick="ajax_isle(\''.$ajax_islem.'\')">'.$ve[20].'</button>';
			}
		}
			

		$cikti.='</form>
			</div>';

		$cikti.='<div class="col-4"><span id="'.$ajax_islem.'"></span></div>';

		return $cikti;
	}