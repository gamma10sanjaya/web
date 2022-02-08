<div class="pcoded-content">
  <div class="pcoded-inner-content">
    <div class="main-body">
      <div class="page-wrapper">
        <div class="page-body">
          <div class="row">
            <!--  sale analytics start -->
            <div class="col-sm-12">
              <!-- Zero config.table start -->
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-9">
                      <h5>Data Jenis Buku</h5>
                    </div>
                    <div class="col-3">
                      <a href="<?= base_url('dashboard/tambahjenisbuku'); ?>" class="btn btn-primary" style="width: 100%">Tambah Jenis Buku</a>
                    </div>
                  </div>
                  <hr>
                </div>
                <div class="card-block">
                  <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                      <thead>
                        <tr>
                          <th>Data Buku</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($jenisbuku as $jb) : ?>
                          <tr>
                            <td>
                              <?= $jb['tb_databuku_jenis_title']; ?>
                            </td>
                            <td>
                              <a href="<?= base_url('dashboard/editjenisbuku/') . $jb['tb_databuku_jenis_id']; ?>" class="btn btn-success">Ubah</a>
                              <a href="<?= base_url('dashboard/hapusjenisbuku/') . $jb['tb_databuku_jenis_id']; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- social download  end -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>