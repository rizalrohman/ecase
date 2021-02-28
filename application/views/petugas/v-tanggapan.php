<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Pengaduan belum Ditanggapi</h1>
  <p class="mb-4">Berikut adalah data Masyarakat dengan status pengaduan yang belum ditanggapi.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Waktu Pengaduan</th>
              <th>NIK</th>
              <th>Judul</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($pengaduans as $pengaduan) : ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $pengaduan['tgl_pengaduan']; ?></td>
              <td><?php echo $pengaduan['nik']; ?></td>
              <td><?php echo $pengaduan['judul_pengaduan']; ?></td>
              <td>
                <a href="<?php echo base_url('petugas/detail_tanggapan/'.$pengaduan['id']) ?>" class="btn btn-info btn-sm"><i class="fa fa-info"></i></a>
              </td>
            </tr>
             <?php $no++; ?>
             <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="card-footer py-3">
      
    </div>
  </div>

</div>