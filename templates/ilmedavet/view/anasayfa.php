<div class="row no-gutters">
  <div class="col-md-8">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <?php
          foreach($slider as $sl => $sly){
            echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$sl.'"'.($sl==0 ? ' class="active"' : null).'></li>';
          }
        ?>
      </ol>
      <div class="carousel-inner">
        <?php
          foreach($slider as $slt => $slyt){
            echo '<div class="carousel-item'.($slt==0 ? ' active' : null).'" data-interval="'.$slt.'0000"><img src="'.$slyt['resim'].'" class="d-block w-100 h-50" alt="'.$slyt['baslik'].'"></div>';
          }
        ?>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <div class="col-md-4">
    <div class="row no-gutters">
      <?php
        for($i=0; $i <= 3; $i++){
          echo '<div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>-->
                <a href="#" class="card-link">Oku</a>
              </div>
            </div>
          </div>';
        }
      ?>
    </div>
  </div>
</div>

<div class="container">
  <div class="row mt-3 mb-3">
  <?php foreach($son_yazarlar as $sn_yaz):?>
    <?php $uye_av=$db->from('yazarlar')->where('uye_id', $sn_yaz['uye_id'])->first();  ?>
    <div class="col-4">
      <?php
        if(!empty($uye_av['resim'])){echo '<img src="'.$uye_av['resim'].'" class="rounded-circle mx-auto d-block mb-2" style="width:150px;height:150px;" alt="yazar">';}
      ?>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center"><a href="<?=url?>yazarlar.php?sayfa=incele&ic=<?=$sn_yaz['slug']?>"><?=$sn_yaz['baslik']?></a></h5>
          <p class="card-text"><?=$sn_yaz['kisa_aciklama']?></p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  </div>
</div>

<div class="container">
  <div class="row mt-4 mb-4">
    <div class="col-md-4">
      <div class="card">
        <div class="p-2 bg-primary text-white">Yazılı Dersler</div>
        <div class="list-group">
        <?php
          foreach($yazili_dersler as $yaz_ders){
            echo '<a href="yazili_dersler.php?sayfa=incele&ic='.$yaz_ders['slug'].'" class="list-group-item list-group-item-action">'.$yaz_ders['baslik'].'</a>';
          }
        ?>
        </div>
      </div>
    </div>
    <div class="col-md-4">

      <div class="card">
        <div class="p-2 bg-warning text-white">Sesli Dersler</div>
        <div class="list-group">
        <?php
          foreach($sesli_dersler as $yaz_ders){
            echo '<a href="'.url.'sesli_dersler.php?sayfa=icerik&ic='.$yaz_ders['slug'].'" class="list-group-item list-group-item-action">'.$yaz_ders['baslik'].'</a>';
          }
        ?>
        </div>
      </div>

    </div>
    <div class="col-md-4">

      <div class="card">
        <div class="p-2 bg-danger text-white">Görüntülü Dersler</div>
        <div class="list-group">
        <?php
          foreach($goruntulu_dersler as $yaz_ders){
            echo '<a href="'.url.'goruntulu_dersler.php?sayfa=icerik&ic='.$yaz_ders['slug'].'" class="list-group-item list-group-item-action">'.$yaz_ders['baslik'].'</a>';
          }
        ?>
        </div>
      </div>

    </div>
  </div>
</div>

<!--
<aside class="container">
  <div class="row">
    <div class="col-6 col-md">
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Son Yazılarımız</h6>
            <?php for($devam=0; $devam < 4; $devam++): ?>
              <div class="media text-muted pt-3">
                <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                  <strong class="d-block text-gray-dark">@yazarisim</strong>Yazar makale açıklama kısmı.Yazar makale açıklama kısmı.Yazar makale açıklama kısmı.Yazar makale açıklama kısmı.
                </p>
              </div>
            <?php endfor; ?>
        <small class="d-block text-right mt-3">
          <a href="#">Tüm Yazılar</a>
        </small>
      </div>
    </div>
    <div class="col-6 col-md">
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">En Çok Okunan Yazılarımız</h6>
            <?php for($devam=0; $devam < 4; $devam++): ?>
              <div class="media text-muted pt-3">
                <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                  <strong class="d-block text-gray-dark">@yazarisim</strong>Yazar makale açıklama kısmı.Yazar makale açıklama kısmı.Yazar makale açıklama kısmı.Yazar makale açıklama kısmı.
                </p>
              </div>
            <?php endfor; ?>
        <small class="d-block text-right mt-3">
          <a href="#">Tüm Yazılar</a>
        </small>
      </div>
    </div>
  </div>

</aside>

<div class="album py-5 bg-warning">
    <div class="container">

      <div class="row">

      <?php for($devam=0; $devam < 6; $devam++): ?>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Resim Bilgi"><title>Resim Bilgi</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Resim</text></svg>
            <div class="card-body">
              <p class="card-text">Cuma namazına erken gitmenin fazileti</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Devamını Oku</button>
                </div>
                <small class="text-muted">21 Mayıs 2016</small>
              </div>
            </div>
          </div>
        </div>
      <?php endfor; ?>  

      </div>
    </div>
  </div>
  -->