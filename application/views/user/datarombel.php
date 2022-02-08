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
                      <h5>Data Rombongan Belajar</h5>
                      <span>Tabel untuk menambahkan data rombongan belajar</span>
                    </div>
                    <div class="col-3">
                      <a href="<?= base_url('user/tambahrombel'); ?>" class="btn btn-primary" style="width: 100%">Tambah Data Rombongan Belajar</a>
                    </div>
                  </div>
                  <hr>
                </div>
                <div class="card-block">
                  <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                      <thead>
                        <tr>
                          <th>Data Rombongan Belajar</th>
                          <th>Status</th>
                          <th>Tahun Masuk</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($datarombel as $dr) : ?>
                          <tr>
                            <td>
                              <?= $dr['tb_rombel_title']; ?>
                            </td>
                            <td>
                              <?php
                              $kelasid = $dr['tb_kelas_id'];
                              $kelas = $this->usr->getDatakelasbyid($kelasid);
                              ?>
                              <?= $kelas['tb_kelas_title']; ?> (<?= $dr['tb_rombel_semester']; ?>)
                            </td>
                            <td>
                              <?= $dr['tb_rombel_tahun']; ?>
                            </td>
                            <td>
                              <a href="<?= base_url('user/editrombel/') . $dr['tb_rombel_id']; ?>" class="btn btn-success">Ubah</a>
                              <br>
                              <a href="<?= base_url('user/lihatkelas/') . $dr['tb_rombel_id']; ?>" class="btn btn-secondary" style="margin-top:10px;">Lihat Data Siswa</a>
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