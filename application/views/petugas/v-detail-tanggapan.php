<section class="contact-section section_padding">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="contact-title text-center mb-5">Detail Pengaduan</h2>
      </div>
      <div class="col-md-12">
        <form method="post" action="<?php echo base_url('petugas/posttanggapan') ?>">
          <div class="row">

            <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id') ?>">

            <input type="hidden" name="id_pengaduan" value="<?php echo $pengaduan[0]['id'] ?>">

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
                <input class="form-control" readonly="" name="judul_pengaduan" id="name" type="text" value="<?php echo $pengaduan[0]['judul_pengaduan'] ?>">
              </div>
            </div>


            <div class="col-12">
              <div class="form-group">
                <label><b>Isi Pengaduan*</b></label>
                  <textarea class="form-control w-100" name="isi_pengaduan" id="message" readonly="" cols="30" rows="9" required=""><?php echo $pengaduan[0]['isi_laporan'] ?></textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label><b>Jawaban Anda*</b></label>
                  <textarea class="form-control w-100" name="tanggapan" id="message" required=""  onfocus="placeholder=''" onblur="placeholder='Masukan Tanggapan Anda'" onselect="placeholder=''" placeholder="Masukan Tanggapan Anda" cols="30" rows="9"></textarea>
              </div>
            </div>
          </div>
          <div class="form-group mt-3 text-center">
            
            <button type="submit" class="btn btn-primary btn-sm col-md-12">Kirim Tanggapan</button>
            
            
          </div>
        </form>
      </div>
    </div>
  </div>
</section>