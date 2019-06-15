<div class="container">
  <div class="row mt-4 mb-4">


    <div class="col-4">
      <div class="card">
        <div class="p-2 bg-primary text-white">Bölgeler</div>
        <div class="list-group">
          <?php
            foreach($kat_gel as $kat){
              echo '<a href="'.url.'dost_dernek.php?sayfa=kategori&kat='.$kat['slug'].'" class="list-group-item list-group-item-action">'.$kat['baslik'].'</a>';
            }
           ?>
        </div>
      </div>
    </div>

    <div class="col-8">
    <?php
      if($totalRecord > 0){
        foreach($dernek_gel as $der){
          echo '<div class="card mb-2">
            <div class="card-body">
              <h5 class="card-title"><a href="'.url.'dost_dernek.php?sayfa=incele&ic='.$der['slug'].'">'.$der['baslik'].'</a></h5>
              <p class="card-text">'.kisalt($der['aciklama'], 500).'</p>
            </div>
          </div>';
        }
      }
     ?>

    </div>

  </div>

  <?php
  if($totalRecord > $pageLimit){
    echo '<nav class="center">
      <ul class="pagination pagination-s justify-content-center">';
        echo $db->showPagination(url.'dost_dernek.php?'.$pageParam.'=');
      echo '</ul>
    </nav>';
  }
  ?>


</div>