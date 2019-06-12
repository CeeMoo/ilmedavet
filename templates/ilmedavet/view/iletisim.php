<?php array_push($g_js, 'templates/'.site_template.'/assets/js/iletisim.js'); ?>
<div class="container">
      <div class="row p-5">
        <div class="col-md-6 order-md-1 mb-4 text-break">
          <h2><?php 
          if(!empty($ilet['baslik']))
            echo $ilet['baslik'];
          ?></h2>
          <p class="lead"><?php 
          if(!empty($ilet['aciklama']))
            echo $ilet['aciklama'];
          ?></p>
        </div>
        <div class="col-md-6 order-md-1">
          <h4 class="mb-3">Mesaj bırakın</h4>
          <form class="ilmedavet_form_iletisim" action="javascript:void(0);" method="post">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="isimsoyisim">Adınız Soyadınız <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="isimsoyisim" name="isimsoyisim" value="" placeholder="" required="">
                <div class="invalid-feedback">
                  Lütfen gerekli alanları doldurunuz.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" placeholder="ilim@hotmail.com" required="">
                <div class="invalid-feedback">
                  Geçerli bir mail adresi yazdığınıza emin olunuz.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="lastName">Telefon No</label>
              <input type="number" class="form-control" id="lastName" placeholder="İsteğe bağlı">
              <div class="invalid-feedback">
                Sayı kullandığınıza emin olunuz.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <hr class="mb-2">
            
            <div class="mb-3">
              <label for="mesajiniz">Mesajınız</label>

              <textarea name="mesaj" id="mesajiniz" class="form-control" cols="10" rows="5" required=""></textarea>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <hr class="mb-4">

            <button class="btn btn-primary btn-lg btn-block" type="submit">Mesajı İlet</button>
          </form>
        </div>


      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2017-2018 Company Name</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>