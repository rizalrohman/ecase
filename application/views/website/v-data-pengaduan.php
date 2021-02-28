<section class="contact-section section_padding">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="contact-title text-center mb-5">Data Pengaduan Anda</h2>
      </div>
      <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class="btn btn-primary btn-sm col-md-12" href="<?php echo base_url('masyarakat/buat_pengaduan') ?>">Buat Pengaduan Baru</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tanggal</th>
                      <th>Judul Pengaduan</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($pengaduans as $pengaduan) : ?>
                    <tr>
                      <th><?php echo $no; ?></th>
                      <th><?php echo $pengaduan['tgl_pengaduan'] ?></th>
                      <th><?php echo $pengaduan['judul_pengaduan'] ?></th>
                      <th>
                        <?php if ($pengaduan['status'] == 0) { ?>
                          <button class="btn btn-warning btn-sm">Belum Diproses</button>
                        <?php }elseif($pengaduan['status'] == 1){ ?>
                          <button class="btn btn-primary btn-sm">Diproses</button>
                        <?php }elseif($pengaduan['status'] == 2){ ?>
                          <button class="btn btn-success btn-sm">Selesai</button>
                        <?php }elseif($pengaduan['status'] == 3){ ?>
                          <button class="btn btn-danger btn-sm">Ditolak</button>  
                        <?php } ?>

                        
                        
                        
                        
                      </th>
                      <th>
                        <?php if ($pengaduan['status'] == 0) { ?>
                          <a href="<?php echo base_url('masyarakat/delete_pengaduan/'.$pengaduan['id']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                          <a href="<?php echo base_url('masyarakat/edit_data/'.$pengaduan['id']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>  
                        <?php }elseif($pengaduan['status'] == 1){ ?>
                          <a href="<?php echo base_url('masyarakat/delete_pengaduan/'.$pengaduan['id']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        <?php }elseif($pengaduan['status'] == 2){ ?>
                          <a href="<?php echo base_url('masyarakat/tanggapan_pengaduan/'.$pengaduan['id']) ?>" class="btn btn-success btn-sm"><i class="fa fa-info"></i></a>
                        <?php }elseif($pengaduan['status'] == 3){ ?>
                          <a href="<?php echo base_url('masyarakat/delete_pengaduan/'.$pengaduan['id']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        <?php } ?>
                        
                      </th>
                    </tr>
                    <?php $no++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="<?php echo base_url() ?>public/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() ?>public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url() ?>public/admin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url() ?>public/admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>public/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url() ?>public/admin/js/demo/datatables-demo.js"></script>
  
</body>

</html>