<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Yazar Paneli</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"><a class="nav-link" href="<?=url_yazar?>">Anasayfa</a></li>
      <li class="nav-item"><a class="nav-link" href="<?=url_yazar?>?sayfa=uye">Üye Ayarları</a></li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?=url_yazar?>?sayfa=sayfalar" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          Makaleler
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?=url_yazar?>?sayfa=makaleler">Makale Listele</a>
          <a class="dropdown-item" href="<?=url_yazar?>?sayfa=makaleler&alt=ekle">Makale Ekle</a>
        </div>
      </li>
      <li class="nav-item"><a class="nav-link" href="<?=url_yazar?>?sayfa=cikis">Çıkış</a></li>
    </ul>
  </div>
</nav>
<input type="hidden" name="yol_yazar_hidden" value="<?=url_yazar?>">