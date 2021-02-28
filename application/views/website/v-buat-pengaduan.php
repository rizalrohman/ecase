<section class="contact-section section_padding">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="contact-title text-center mb-5">Formulir Pengaduan</h2>
      </div>
      <div class="col-md-12">
        <?php echo form_open_multipart('masyarakat/postpengaduan');?>
          <div class="row">

            <div class="col-sm-6">
              <div class="form-group">
                <label><b>Tanggal Pengaduan</b></label>
                <input class="form-control" name="tanggal" id="name" type="text" value="<?php echo date('d F Y') ?>" readonly="">
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label><b>NIK</b></label>
                <input class="form-control" name="nik" id="name" type="text" value="<?php echo $this->session->userdata('nik') ?>" readonly="">
              </div>
            </div>


            <div class="col-12">
              <div class="form-group">
                <label><b>Nama Lengkap</b></label>
                <input class="form-control" name="display_name" id="name" type="text" value="<?php echo $this->session->userdata('display_name') ?>" readonly="">
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label><b>Judul Pengaduan*</b></label>
                <input class="form-control" name="judul_pengaduan" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Judul Pengaduan'" placeholder = 'Masukan Judul Pengaduan'>
              </div>
            </div>


            <div class="col-12">
              <div class="form-group">
                <label><b>Isi Pengaduan*</b></label>
                  <textarea class="form-control w-100" name="isi_pengaduan" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Pengaduan'" placeholder = 'Masukan Pengaduan' required=""></textarea>
              </div>
            </div>
            
            <div class="col-12">
              <div class="form-group">
                <label><b>Foto Bukti*</b></label>
                <input class="form-control" name="foto" id="subject" type="file" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Foto'" required="">
              </div>
            </div>
          </div>
          <div class="form-group mt-3">
            <button class="button button-contactForm btn_1 col-md-12 text-center" style="border-radius: 30px">Kirim Pengaduan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>