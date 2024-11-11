<?php loadPartial('head');?>
  <body>
    <?php loadPartial('navbar');?>

    <div
      class="hero page-inner overlay"
      style="background-image: url('/images/hero_bg_1.jpg')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up"><?= $status ?></h1>
          </div>
        </div>
      </div>
    </div>


    <div class="section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-12" data-aos="fade-up" data-aos-delay="300">
            <div class="box-feature mb-4">
                <span class="flaticon-house mb-4" style="color: #D71A1A;"> 
                    <?= $message; ?>
                </span>
                <p class="text-black-50">
                  Informasi atau halaman yang anda coba akses tidak tersedia, silahkan kembali ke halaman <a href="/">Beranda</a>.
                </p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <?php loadPartial('footer');?>
  </body>
</html>