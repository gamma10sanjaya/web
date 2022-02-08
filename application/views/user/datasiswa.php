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
                      <span>Data rombongan belajar</span>
                    </div>
                    <div class="col-3">
                      <a href="<?= base_url('user/tambahsiswa'); ?>" class="btn btn-primary" style="width: 100%">Tambah Data Siswa</a>
                    </div>
                  </div>
                  <hr>
                </div>
                <div class="card-block">
                  <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                      <thead>
                        <tr>
                          <th>Data Siswa</th>
                          <th>Kelas</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($datasiswa as $ds) : ?>
                          <tr>
                            <td>
                              <?= $ds['tb_siswa_nama']; ?>
                            </td>
                            <td>
                              <?php
                              $siswaid = $ds['tb_rombel_id'];
                              $rombel = $this->usr->getDatarombelbyid($siswaid);
                              $kelasid = $rombel['tb_kelas_id'];
                              $kelas = $this->usr->getDatakelasbyid($kelasid);

                              echo $rombel['tb_rombel_title'];
                              echo '<br style="margin: 5px;">';
                              echo $kelas['tb_kelas_title'];
                              ?>
                            </td>
                            <td>
                              <a href="<?= base_url('user/editsiswa/') . $ds['tb_siswa_id']; ?>" class="btn btn-success">Ubah</a>
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