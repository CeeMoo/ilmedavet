<?php array_push($g_js, 'templates/'.site_template.'/assets/js/goruntulu_dersler.js'); ?>
<div class="container">
  <div class="row mt-4 mb-4">


    <div class="col-4">
      <div class="card">
        <div class="p-2 bg-primary text-white">Kategoriler</div>
        <div class="list-group">
          <?php
            foreach($kat_gel as $kat){
              echo '<a href="'.url.'goruntulu_dersler.php?sayfa=kategori&kat='.$kat['slug'].'" class="list-group-item list-group-item-action">'.$kat['baslik'].'</a>';
            }
           ?>
        </div>
      </div>
    </div>

    <div class="col-8">
      <span id="sesli_ders_icerik"></span>
    <?php
      if($totalRecord > 0){
        echo '<div class="row">';
          foreach($goruntulu_dersler_gel as $grn){
            echo '<div class="col-4">
              <div class="card">
                <img src="'.$grn['resim'].'" class="card-img-top" alt="'.$grn['slug'].'">
                <div class="card-body">
                  <h5 class="card-title"><a href="'.url.'goruntulu_dersler.php?sayfa=icerik&ic='.$grn['slug'].'">'.$grn['baslik'].'</a></h5>
                  <p class="card-text">'.$grn['kisa_aciklama'].'</p>
                </div>
              </div>
            </div>';
          }
        echo '</div>';
      }
     ?>

    </div>

  </div>

  <?php
  if($totalRecord > $pageLimit){
    echo '<nav class="center">
      <ul class="pagination pagination-s justify-content-center">';
        echo $db->showPagination(url.'goruntulu_dersler.php?'.$pageParam.'=');
      echo '</ul>
    </nav>';
  }
  ?>


</div>