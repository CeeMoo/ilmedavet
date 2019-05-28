<h1>Login page Admin</h1>
<input type="hidden" name="yol_admin_hidden" value="<?=url_admin?>">
<div class="mx-auto col-md-6">
	<span id="admin_giris"></span>
	<form id="admin_giris" method="post" action="javascript:void(0);">
	  <div class="form-group">
	    <label for="kullanici">Kullanıcı Adınız</label>
	    <input type="text" class="form-control" id="kullanici" name="kullanici" placeholder="Kullanıcı adınız">
	  </div>
	  <div class="form-group">
	    <label for="sifreniz">Şifreniz</label>
	    <input type="password" class="form-control" id="sifreniz" name="sifre" placeholder="Password">
	  </div>
    <!--
	  <div class="form-group form-check">
	    <input type="checkbox" class="form-check-input" id="exampleCheck1">
	    <label class="form-check-label" for="exampleCheck1">Check me out</label>
	  </div>
    -->
	    <input type="hidden" name="islem" value="admin_giris">
		<button type="submit" class="btn btn-primary" onclick="ajax_isle('admin_giris')">Submit</button>
	</form>
</div>