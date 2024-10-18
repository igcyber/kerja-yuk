<?php loadPartial('head');?>
  <body>
    <?php loadPartial('navbar');?>

    <div
      class="hero page-inner overlay"
      style="background-image: url('images/hero_bg_3.jpg')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">
              Detail Lowongan
            </h1>

            <nav
              aria-label="breadcrumb"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">
                  <a href="/listings">Lowongan</a>
                </li>
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                >
                  <?= $listing->job_title ?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-12">
            <h2 class="heading text-primary"><?= $listing->job_title ?></h2>
            <p class="text-black-50">
              <span style="font-weight: bold;">Deskripsi : </span>
              <?= $listing->description ?>
            </p>
            <p class="text-black-50">
              <span style="font-weight: bold;">Tipe Pekerjaan : </span>
              <?= $listing->job_type ?>
            </p>
            <p class="text-black-50">
              <span style="font-weight: bold;">Persyaratan : </span>
              <ol>
                <?php
                  $requirements = explode(',', $listing->requirements);  
                  foreach($requirements as $req) : 
                ?>
                <li><?= trim($req); ?></li>

                <?php endforeach; ?>
              </ol>
            </p>
            <p class="meta"><span style="font-weight: bold;">Lokasi :</span> <?= $listing->city ?>, <?= $listing->province ?></p>
            <p class="text-black-50">
              <span style="font-weight: bold;">Gaji : </span>
              <?= rupiahFormat($listing->salary) ?>
            </p>

            <a  href="mailto:<?= $listing->email ?>" class="btn btn-sm btn-primary py-2 px-4">Lamar Sekarang</a>

            <div class="d-block agent-box p-5">
              <div class="img mb-3">
                <img
                  src="<?= $listing->company_logo ? 'images/'.$listing->company_logo : 'https://placehold.co/500x500' ?>"
                  alt="Image"
                  class="img-fluid"
                />
              </div>
              <div class="text">
                <h3 class="mb-0"><?= $listing->company ?></h3>
                <p class="meta mb-2"><?= $listing->address ?></p>
                <h3 class="mb-0">Kontak Kami : </h3>
                <ul class="list-unstyled social dark-hover d-flex">
                  <li class="me-4">
                    <i class="icon-google me-2"></i><?= $listing->email ?>
                  </li>
                  <br>
                  <li class="me-1">
                    <i class="icon-phone me-1"></i> <?= $listing->phone ?>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <?php loadPartial('footer');?>
  </body>
</html>