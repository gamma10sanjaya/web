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
                      <h5>Data Guru</h5>
                      <span>Tabel ini berisi data guru yang aktif maupun tidak</span>
                    </div>
                    <div class="col-3">
                      <a href="<?= base_url('user/tambahguru'); ?>" class="btn btn-primary" style="width: 100%">Tambah Data Guru</a>
                    </div>
                  </div>
                  <hr>
                </div>
                <div class="card-block">
                  <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                      <thead>
                        <tr>
                          <th>Data Guru</th>
                          <th>Kelas</th>
                          <!-- <th>Status</th> -->
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($dataguru as $dg) : ?>
                          <tr>
                            <td>
                              Nama : <?= $dg['user_name']; ?>
                              <br style="margin: 5px;">
                              Email : <?= $dg['user_email']; ?>
                            </td>
                            <td>
                              <?php
                              $userid = $dg['user_id'];
                              $gurukelas = $this->usr->getGurukelasbyid($userid);
                              if ($gurukelas == null) {
                                echo "guru belum memiliki kelas yang di ampu";
                              } else {
                                $kelasid = $gurukelas['tb_kelas_id'];
                                $kelas = $this->usr->getDatakelasbyid($kelasid);
                                echo $kelas['tb_kelas_title'];
                              }
                              ?>
                            </td>
                            <!-- <td>
                              <?php if ($dg['is_active'] == 1) : ?>
                                <a href="#" class="btn btn-success">Aktif</a>
                              <?php else : ?>
                                <a href="#" class="btn btn-success">Suspend</a>
                              <?php endif; ?>
                            </td> -->
                            <td>
                              <a href="<?= base_url('user/settingkelas/') . $userid ?>" class="btn btn-secondary">Setting Kelas</a>
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