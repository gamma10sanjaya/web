<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <link href="<?= base_url('assets/landingpage/') ?>css/style.css" rel="stylesheet">

  <title>Sistem Rekomendasi Buku Bacaan</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container container-fluid">
      <a class="navbar-brand" href="#">Silahkan Memberikan Rating</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <!-- <a class="nav-link active" aria-current="page" href="#">Home</a>
          <a class="nav-link" href="#">Features</a>
          <a class="nav-link" href="#">Pricing</a> -->
          <a class="btn btn-primary tombol" href="<?= base_url('landingpage'); ?>" style="margin-right: 10px;">Pilih Siswa Lain</a>
          <a class="btn btn-primary tombol" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container badan">
    <div class="row">
      <h1>Hasil Rekomendasi</h1>
      <?php foreach ($hasilperatingan as $hp) : ?>
        <?php
        $caribuku = $this->db->get_where('tb_databuku', ['tb_databuku_id' => $hp['databukuid']])->row_array();
        $cekrating = $this->dbk->getRatingbysiswa($tb_siswa_id, $caribuku['tb_databuku_id']);
        ?>
        <?php if ($cekrating['tb_databuku_id'] != $hp['databukuid']) : ?>
          <div class="col-3">
            <div class="card" style="width: 18rem;">
              <div class="frame-image">
                <img src="<?= base_url('assets/images/databuku/') . $caribuku['image']; ?>" class="card-img-top" alt="...">
              </div>
              <div class="card-body">
                <?php if (!$cekrating) : ?>
                  <form action="<?= base_url('landingpage/submitnilai/') . $caribuku['tb_databuku_id'] . '/' . $tb_siswa_id; ?>" method="post">
                    <div class="row">
                      <div class="col-8">
                        <select name="nilai" id="nilai" class="form-control">
                          <option value="1">Rating 1</option>
                          <option value="2">Rating 2</option>
                          <option value="3">Rating 3</option>
                          <option value="4">Rating 4</option>
                          <option value="5">Rating 5</option>
                        </select>
                      </div>
                      <div class="col-4">
                        <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                    </div>
                  </form>
                <?php else : ?>
                  <div class="row">
                    <div class="col-10">
                      <h6>Jumlah Rating :</h6>
                    </div>
                    <div class="col-2">
                      <h6><?= $cekrating['tb_databuku_rating_nilai']; ?></h6>
                    </div>
                  </div>
                <?php endif; ?>
                <h5 class="card-title"><?= $caribuku['tb_databuku_nama']; ?></h5>
                <hr>
                <?php $jenisbuku = $this->dbk->getDatabukujenis($caribuku['tb_databuku_jenis_id']); ?>
                <p class="card-text deskripsi">Genre Buku : <?= $jenisbuku['tb_databuku_jenis_title']; ?></p>
                <p class="card-text deskripsi"><?= $caribuku['tb_databuku_tanggal']; ?></p>
                <p class="card-text deskripsi"><?= $caribuku['tb_databuku_penulis']; ?></p>
                <p class="card-text deskripsi"><?= $caribuku['tb_databuku_penerbit']; ?></p>
                <p class="card-text deskripsi"><?= $hp['nilairating']; ?></p>
                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
    <hr>
    <div class="row">
      <h1>Sudah Dibaca</h1>
      <?php foreach ($hasilperatingan as $hp) : ?>
        <?php
        $caribuku = $this->db->get_where('tb_databuku', ['tb_databuku_id' => $hp['databukuid']])->row_array();
        $cekrating = $this->dbk->getRatingbysiswa($tb_siswa_id, $caribuku['tb_databuku_id']);
        ?>
        <?php if ($cekrating['tb_databuku_id'] == $hp['databukuid']) : ?>
          <div class="col-3">
            <div class="card" style="width: 18rem;">
              <div class="frame-image">
                <img src="<?= base_url('assets/images/databuku/') . $caribuku['image']; ?>" class="card-img-top" alt="...">
              </div>
              <div class="card-body">
                <?php if (!$cekrating) : ?>
                  <form action="<?= base_url('landingpage/submitnilai/') . $caribuku['tb_databuku_id'] . '/' . $tb_siswa_id; ?>" method="post">
                    <div class="row">
                      <div class="col-8">
                        <select name="nilai" id="nilai" class="form-control">
                          <option value="1">Rating 1</option>
                          <option value="2">Rating 2</option>
                          <option value="3">Rating 3</option>
                          <option value="4">Rating 4</option>
                          <option value="5">Rating 5</option>
                        </select>
                      </div>
                      <div class="col-4">
                        <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                    </div>
                  </form>
                <?php else : ?>
                  <div class="row">
                    <div class="col-10">
                      <h6>Jumlah Rating :</h6>
                    </div>
                    <div class="col-2">
                      <h6><?= $cekrating['tb_databuku_rating_nilai']; ?></h6>
                    </div>
                  </div>
                <?php endif; ?>
                <h5 class="card-title"><?= $caribuku['tb_databuku_nama']; ?></h5>
                <hr>
                <?php $jenisbuku = $this->dbk->getDatabukujenis($caribuku['tb_databuku_jenis_id']); ?>
                <p class="card-text deskripsi">Genre Buku : <?= $jenisbuku['tb_databuku_jenis_title']; ?></p>
                <p class="card-text deskripsi"><?= $caribuku['tb_databuku_tanggal']; ?></p>
                <p class="card-text deskripsi"><?= $caribuku['tb_databuku_penulis']; ?></p>
                <p class="card-text deskripsi"><?= $caribuku['tb_databuku_penerbit']; ?></p>
                <p class="card-text deskripsi"><?= $hp['nilairating']; ?></p>
                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
</body>

</html>