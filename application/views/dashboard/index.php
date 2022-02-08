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
                      <h5>Pie Cart Rata - Rata Nilai Rating Tiap Buku</h5>
                    </div>
                    <div class="col-3">
                      <a href="<?= base_url('dashboard/laporanratingbuku'); ?>" class="btn btn-primary" style="width: 100%">Laporan Rating Buku</a>
                    </div>
                  </div>
                  <hr>
                </div>
                <div class="card-block" style="margin-left: auto; margin-right: auto; display: block;">
                  <?php
                  // $array = [
                  //   ['Task', 'Hours per Day'],
                  //   ['Work', 8],
                  //   ['Friends', 2],
                  //   ['Eat', 2],
                  //   ['TV', 2],
                  //   ['Gym', 2],
                  //   ['Sleep', 8]
                  // ];
                  $array = [['Nama Buku', 'Hasil Rata - Rata']];
                  foreach ($databuku as $dataarray1) {
                    $jumlahnilai = [];
                    $carinilaibuku = $this->db->where('tb_databuku_id', $dataarray1['tb_databuku_id']);
                    $carinilaibuku = $this->db->get('tb_databuku_rating')->result_array();
                    foreach ($carinilaibuku as $cnb) {
                      array_push($jumlahnilai, $cnb['tb_databuku_rating_nilai']);
                    }
                    $jumlahnilaibuku = array_sum($jumlahnilai);
                    $jumlahsiswa = $this->db->get('tb_siswa')->num_rows();
                    $hasilrerata = $jumlahnilaibuku / $jumlahsiswa;
                    $datalooping = [$dataarray1['tb_databuku_nama'], $hasilrerata];
                    array_push($array, $datalooping);
                  }
                  ?>
                  <div id="piechart" style="padding-top: -70px; padding-bottom: -70px; margin-bottom: -100px; margin-top: -50px;"></div>
                </div>
              </div>
            </div>
            <!-- social download  end -->
          </div>
          <div class="row">
            <!--  sale analytics start -->
            <div class="col-sm-12">
              <!-- Zero config.table start -->
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-9">
                      <h5>Data Buku</h5>
                      <span>Tabel ini berisi data buku yang telah ditambahkan oleh admin</span>
                    </div>
                    <div class="col-3">
                      <a href="<?= base_url('dashboard/tambahbuku'); ?>" class="btn btn-primary" style="width: 100%">Tambah Data Buku</a>
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
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($databuku as $db) : ?>
                          <tr>
                            <td>
                              <div class="row">
                                <div class="col-3">
                                  <img src="<?= base_url('assets/images/databuku/') . $db['image']; ?>" alt="Cover Buku" style="width: 100%;">
                                </div>
                                <div class="col-7">
                                  <p>Nama Buku : <?= $db['tb_databuku_nama']; ?></p>
                                  <?php $jenisbuku = $this->dbk->getDatabukujenis($db['tb_databuku_jenis_id']); ?>
                                  <p>Genre Buku : <?= $jenisbuku['tb_databuku_jenis_title']; ?></p>
                                  <p>Tanggal Terbit Buku : <?= $db['tb_databuku_tanggal']; ?></p>
                                  <p>Penulis Buku : <?= $db['tb_databuku_penulis']; ?></p>
                                  <p>Penerbit Buku : <?= $db['tb_databuku_penerbit']; ?></p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <?php if ($db['is_active'] == 0) : ?>
                                <a href="<?= base_url('dashboard/isactivebuku/') . $db['tb_databuku_id']; ?>" class="btn btn-danger">Nonaktif</a>
                              <?php else : ?>
                                <a href="<?= base_url('dashboard/isactivebuku/') . $db['tb_databuku_id']; ?>" class="btn btn-success">Aktif</a>
                              <?php endif; ?>
                            </td>
                            <td>
                              <a href="<?= base_url('dashboard/editbuku/') . $db['tb_databuku_id']; ?>" class="btn btn-success">Ubah</a>
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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  // Load google charts
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);
  // Draw the chart and set the chart values
  function drawChart() {
    var data = google.visualization.arrayToDataTable(<?php echo json_encode($array); ?>);

    // Optional; add a title and set the width and height of the chart
    var options = {
      'width': 1200,
      'height': 400
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
  }
</script>