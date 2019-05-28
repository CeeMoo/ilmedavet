<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">İlme Admin Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"><a class="nav-link" href="<?=url_admin?>">Anasayfa</a></li>
      <li class="nav-item"><a class="nav-link" href="<?=url_admin?>?sayfa=slider">Slider</a></li>
      <li class="nav-item"><a class="nav-link" href="<?=url_admin?>?sayfa=uyeler">Üyeler</a></li>
      <li class="nav-item"><a class="nav-link" href="<?=url_admin?>?sayfa=ayarlar">Ayarlar</a></li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?=url_admin?>?sayfa=yazarlar" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          Yazarlar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?=url_admin?>?sayfa=yazarlar">Yazar List</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?=url_admin?>?sayfa=yazarlar&alt=yazarlar_kat">Makale Kat List</a>
          <a class="dropdown-item" href="<?=url_admin?>?sayfa=yazarlar&alt=makale_listele">Makale Listesi</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?=url_admin?>?sayfa=dost_dernek" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          Dost Dernekler
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?=url_admin?>?sayfa=dost_dernek">Dernek Listele</a>
          <a class="dropdown-item" href="<?=url_admin?>?sayfa=dost_dernek&alt=ekle">Dernek Ekle</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?=url_admin?>?sayfa=dost_dernek&alt=dernek_kat">Dernek İl Liste</a>
          <a class="dropdown-item" href="<?=url_admin?>?sayfa=dost_dernek&alt=dernek_kat_ekle">Dernek İl ekle</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?=url_admin?>?sayfa=yazili_dersler" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          Yazılı Ders
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?=url_admin?>?sayfa=yazili_dersler">Ders Listele</a>
          <a class="dropdown-item" href="<?=url_admin?>?sayfa=yazili_dersler&alt=ekle">Ders Ekle</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?=url_admin?>?sayfa=yazili_dersler&alt=yazili_dersler_kat">Ders Kategori Liste</a>
          <a class="dropdown-item" href="<?=url_admin?>?sayfa=yazili_dersler&alt=yazili_dersler_kat_ekle">Ders Kategori ekle</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?=url_admin?>?sayfa=yazili_dersler" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          Görüntülü Ders
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?=url_admin?>?sayfa=goruntulu_dersler">Görüntülü Listele</a>
          <a class="dropdown-item" href="<?=url_admin?>?sayfa=goruntulu_dersler&alt=ekle">Görüntülü Ekle</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?=url_admin?>?sayfa=goruntulu_dersler&alt=goruntulu_dersler_kat">Görüntülü Kategori Liste</a>
          <a class="dropdown-item" href="<?=url_admin?>?sayfa=goruntulu_dersler&alt=goruntulu_dersler_kat_ekle">Görüntülü Kategori ekle</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?=url_admin?>?sayfa=yazili_dersler" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          Sesli Ders
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?=url_admin?>?sayfa=sesli_dersler">Ses Listele</a>
          <a class="dropdown-item" href="<?=url_admin?>?sayfa=sesli_dersler&alt=ekle">Ses Ekle</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?=url_admin?>?sayfa=sesli_dersler&alt=sesli_dersler_kat">Ses Kategori Liste</a>
          <a class="dropdown-item" href="<?=url_admin?>?sayfa=sesli_dersler&alt=sesli_dersler_kat_ekle">Ses Kategori ekle</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?=url_admin?>?sayfa=sayfalar" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          Sayfalar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?=url_admin?>?sayfa=sayfalar">Sayfa Listele</a>
          <a class="dropdown-item" href="<?=url_admin?>?sayfa=sayfalar&alt=ekle">Sayfa Ekle</a>
        </div>
      </li>
      <li class="nav-item"><a class="nav-link" href="<?=url_admin?>?sayfa=cikis">Çıkış</a></li>
    </ul>
  </div>
</nav>
<input type="hidden" name="yol_admin_hidden" value="<?=url_admin?>">