<div class="container">
  <div class="row mt-4 mb-4">


    <div class="col-4">
      <div class="card">
        <div class="p-2 bg-primary text-white">Kategoriler</div>
        <div class="list-group">
          <?php
            foreach($kat_gel as $kat){
              echo '<a href="'.url.'yazarlar.php?sayfa=kategori&kat='.$kat['slug'].'" class="list-group-item list-group-item-action">'.$kat['baslik'].'</a>';
            }
           ?>
        </div>
      </div>
    </div>

    <div class="col-8">
      <span id="sesli_ders_icerik"></span>
    <?php
      if($totalRecord > 0){
        echo '<ul class="list-group">';
          foreach($yazar_makale_gel as $yaz_gel){
            //echo '<li class="list-group-item"><a href="javascript:void(0);" onclick="sesli_ders(\''.$ses['id'].'\', \''.$ses['slug'].'\')">'.$ses['baslik'].'</a></li>';
            echo '<li class="list-group-item"><a href="'.url.'yazarlar.php?sayfa=incele&ic='.$yaz_gel['slug'].'">'.$yaz_gel['baslik'].'</a></li>';
          }
        echo '</ul>';
      }
     ?>

    </div>

  </div>

  <?php
  if($totalRecord > $pageLimit){
    echo '<nav class="center">
      <ul class="pagination pagination-s justify-content-center">';
        echo $db->showPagination(url.'yazarlar.php?'.$pageParam.'=');
      echo '</ul>
    </nav>';
  }
  ?>


</div>