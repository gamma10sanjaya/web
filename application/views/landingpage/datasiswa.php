<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon icon -->
  <link rel="icon" href="<?= base_url('assets/dashboard/'); ?>assets\images\logo_buku.ico" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <link href="<?= base_url('assets/landingpage/') ?>css/style.css" rel="stylesheet">

  <title>Sistem Rekomendasi Buku Bacaan!</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container container-fluid">
      <a class="navbar-brand" href="#">Sistem Rekomendasi Buku bacaan</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <!-- <a class="nav-link active" aria-current="page" href="#">Home</a>
          <a class="nav-link" href="#">Features</a>
          <a class="nav-link" href="#">Pricing</a> -->
          <?php
          $user_roleid = $this->session->userdata('user_role_id');
          ?>
          <!-- sudah login -->
          <?php if ($user_roleid == 1) : ?>
            <a class="btn btn-primary tombol" href="<?= base_url('dashboard'); ?>">Dashboard <?= $user['user_name']; ?></a>
          <?php else : ?>
            <h6>Hi <?= $user['user_name']; ?>, Silahkan memberikan rating</h6>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>

  <div class="container badan">
    <div class="row">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Nama Siswa</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($datasiswa as $ds) : ?>
            <tr>
              <td><?= $ds['tb_siswa_nama']; ?></td>
              <td><a href="<?= base_url('landingpage/pinjambuku/') . $ds['tb_siswa_id'] ?>" class="btn btn-primary">Peminjaman Buku</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
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