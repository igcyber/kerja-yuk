<?php loadPartial('head');?>
  <body>
    <?php loadPartial('navbar');?>

    <!-- content here -->
    <div
      class="hero page-inner overlay"
      style="background-image: url('/images/hero_bg_1.jpg')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">Tambah Lowongan</h1>

            <nav
              aria-label="breadcrumb"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                >
                  Tambah Lowongan
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-5">
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
          <h4 class="mb-2">Informasi Pekerjaan</h4>
            <?php if(isset($errors)) : ?>
              <?php foreach($errors as $error) : ?>
                <h5><span class="badge bg-danger"><?= $error ?></span></h5> 
              <?php endforeach; ?>
            <?php endif; ?>
            <form action="/listings" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-6 mb-3">
                  <input
                    type="text"
                    name="job_title"
                    value="<?= $listing['job_title'] ?? '' ?>"
                    class="form-control"
                    placeholder="Posisi Pekerjaan"
                  />
                </div>
                <div class="col-6 mb-3">
                  <input
                    type="text"
                    value="<?= $listing['salary'] ?? '' ?>"
                    name="salary"
                    class="form-control"
                    placeholder="Gaji Perbulan"
                  />
                </div>
                <div class="col-12 mb-3">
                  <input
                    type="text"
                    value="<?= $listing['description'] ?? '' ?>"
                    name="description"
                    class="form-control"
                    placeholder="Deskripsi Pekerjaan"
                  />
                </div>
                <div class="col-12 mb-3">
                  <select name="job_type" class="form-control">
                    <option selected disabled>Pilih Tipe Pekerjaan</option>
                    <option value="WFO">Work From Office (WFO)</option>
                    <option value="WFH">Work From Home (WFH)</option>
                  </select>
                </div>
                <div class="col-12 mb-3">
                  <textarea
                    name="requirements"
                    id=""
                    cols="30"
                    rows="7"
                    class="form-control"
                    placeholder="Persyaratan"
                  ><?= $listing['requirements'] ?? '' ?></textarea>
                </div>
                <div class="col-12 mb-3">
                  <textarea
                    name="benefits"
                    id=""
                    cols="30"
                    rows="7"
                    class="form-control"
                    placeholder="Benefit"
                  ><?= $listing['benefits'] ?? '' ?></textarea>
                </div>
                <div class="col-12 mb-3">
                  <input
                    type="text"
                    value="<?= $listing['tags'] ?? '' ?>"
                    name="tags"
                    class="form-control"
                    placeholder="Tag Posisi"
                  />
                </div>

                <h4 class="mb-2 mx-auto">Informasi Perusahaan & Lokasi</h4>
                <div class="col-12 mb-3">
                  <label for="file">Logo Perusahaan</label>
                  <input type="file" name="company_logo" id="file" accept="image/*" class="form-control" style="padding:0.8rem 0.2rem !important;" title="Logo Perusahaan"> 
                </div>
                <div class="col-12 mb-3">
                  <input
                    value="<?= $listing['company'] ?? '' ?>"
                    name="company"
                    type="text"
                    class="form-control"
                    placeholder="Nama Perusahaan"
                  />
                </div>
                <div class="col-12 mb-3">
                  <textarea
                    name="address"
                    id=""
                    cols="30"
                    rows="7"
                    class="form-control"
                    placeholder="Alamat Kantor"
                  ><?= $listing['address'] ?? '' ?></textarea>
                </div>
                <div class="col-12 mb-3">
                  <input
                    value="<?= $listing['city'] ?? '' ?>"
                    name="city"
                    type="text"
                    class="form-control"
                    placeholder="Kota"
                  />
                </div>
                <div class="col-12 mb-3">
                  <input
                    value="<?= $listing['province'] ?? '' ?>"
                    name="province"
                    type="text"
                    class="form-control"
                    placeholder="Provinsi"
                  />
                </div>
                <div class="col-12 mb-3">
                  <input
                    value="<?= $listing['phone'] ?? '' ?>"
                    name="phone"
                    type="text"
                    class="form-control"
                    placeholder="Nomor Hubung"
                  />
                </div>
                <div class="col-12 mb-3">
                  <input
                    value="<?= $listing['email'] ?? '' ?>"
                    name="email"
                    type="email"
                    class="form-control"
                    placeholder="Alamt Email"
                  />
                </div>
                <div class="col-12">
                  <input
                    type="submit"
                    value="Simpan Data"
                    class="btn btn-primary"
                  />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <?php loadPartial('footer');?>
  </body>
</html>
