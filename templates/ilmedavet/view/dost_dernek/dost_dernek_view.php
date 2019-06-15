<div class="container">
  <div class="row mt-4 mb-4">
    <div class="col">

      <div class="card mb-2">
        <div class="card-body">
          <h1 class="card-title "><a href="<?=url?>dost_dernek.php?sayfa=incele&ic=<?=$ic['slug']?>"><?=$ic['baslik']?></a></h1>
          <!--<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>-->
          <p class="card-text"><?=$ic['aciklama']?></p>
        </div>
      </div>

      <?php if(!empty($ic['maps'])){ ?>
        <div class="card mb-2">
          <div class="card-body">
            <p class="card-text"><?=$ic['maps']?></p>
          </div>
        </div>
      <?php } ?>
    
    </div>
  </div>
</div>