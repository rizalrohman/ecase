<section class="contact-section section_padding">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="contact-title text-center mb-5">Tanggapan Pengaduan</h2>
      </div>
      <div class="col-md-12">
        <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                  <label>Pengaduan Anda </label>
                  <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" readonly=""><?php echo $pengaduan[0]['isi_laporan']; ?></textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                  <label>Jawaban Admin</label>
                  <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" readonly=""><?php echo $tanggapan[0]['tanggapan']; ?></textarea>
              </div>
            </div>
          </div>
          <div class="form-group mt-3">
            <a href="<?php echo base_url('masyarakat/buat_pengaduan') ?>" class="button button-contactForm btn_1 col-md-12 text-center" style="border-radius: 30px">Buat Pengaduan Baru</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>