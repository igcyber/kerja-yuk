  <?php loadPartial('head');?>
  <body>
    <?php loadPartial('navbar');?>

    <div class="hero">
      <div class="hero-slide">
        <div
          class="img overlay"
          style="background-image: url('images/hero_bg_3.jpg')"
        ></div>
      </div>

      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center">
            <h1 class="heading" data-aos="fade-up">
              Temukan Pekerjaan Impianmu
            </h1>
            <form
              action="#"
              class="narrow-w form-search d-flex align-items-stretch mb-3"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <input
                type="text"
                class="form-control px-4"
                placeholder="Pekerjaan..."
              />

              <input
                type="text"
                class="form-control px-4"
                placeholder="Lokasi..."
              />
              <button type="submit" class="btn btn-primary">Temukan</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-lg-6">
            <h2 class="font-weight-bold text-primary heading">
              Lowongan Terbaru
            </h2>
          </div>
          <div class="col-lg-6 text-lg-end">
            <p>
              <a
                href="/listings"
                target="_blank"
                class="btn btn-primary text-white py-3 px-4"
                >Semua Lowongan</a
              >
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="property-slider-wrap">
              <div class="property-slider">
                <?php foreach($listings as $list) : ?>
                <div class="property-item">
                    <a href="#" class="img">
                      <img src="images/img_1.jpg" alt="Image" class="img-fluid" />
                    </a>

                  <div class="property-content">  
                    <div class="price mb-2">
                      <span><?= rupiahFormat($list->salary)?></span>
                    </div>
                    <div>
                      <span class="d-block mb-2 text-black-50">
                        <?= $list->description ?>
                      </span>
                      <span class="city d-block"><?= $list->job_title ?></span>
                      <span class="d-block mb-2 text-black-50">
                        <?= $list->company ?>
                      </span>
                      <div class="mb-3">
                        <?php 
                          $benefits = explode(',', $list->benefits);
                          // print_r($benefits);
                          foreach($benefits as $benefit) :
                        ?>
                          <span class="d-block">
                            <!-- <span class="icon-tag me-2"></span> -->
                            <span class="badge bg-success mb-1"><?= $benefit ?></span>
                          </span>
                        <?php endforeach; ?>
                      </div>

                      <a
                        href="/listings/<?= $list->id?>"
                        class="btn btn-sm btn-primary py-2 px-4"
                        >Lihat Detail</a>
                    </div>
                  </div>
                </div>
                <!-- .item -->
                <?php endforeach; ?>
              </div>

              <div
                id="property-nav"
                class="controls"
                tabindex="0"
                aria-label="Carousel Navigation"
              >
                <span
                  class="prev"
                  data-controls="prev"
                  aria-controls="property"
                  tabindex="-1"
                  >Prev</span
                >
                <span
                  class="next"
                  data-controls="next"
                  aria-controls="property"
                  tabindex="-1"
                  >Next</span
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section bg-light">
      <div class="row justify-content-center footer-cta" data-aos="fade-up">
        <div class="col-lg-7 mx-auto text-center">
          <h2 class="mb-4">Sedang Mencari Talenta Baru Untuk Kebutuhan Anda</h2>
          <p>
            <a
              href="/listings/create"
              target="_blank"
              class="btn btn-primary text-white py-3 px-4"
              >Buat Lowongan Sekarang</a
            >
          </p>
        </div>
        <!-- /.col-lg-7 -->
      </div>
      <!-- /.row -->
    </div>
    
    <?php loadPartial('footer');?>
  </body>
</html>
