<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  $jmlhuser = $this->db->get('tb_siswa')->num_rows();
  $jmlhbuku = $this->db->get('tb_databuku')->num_rows();
  $databuku1 = $this->db->get('tb_databuku')->result_array();
  $datasiswa1 = $this->db->get('tb_siswa')->result_array();
  $array_terpecah = array_split($nilairating, $jmlhbuku);

  echo '<pre>';
  print_r($array_terpecah);
  ?>
  <table border="1">
    <thead>
      <tr>
        <th></th>
        <?php foreach ($databuku1 as $db1) : ?>
          <th><?= $db1['tb_databuku_nama']; ?></th>
        <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
      <?php
      $a = 0;
      $a < $jmlhbuku;
      $similarityhasil = [];
      ?>
      <?php foreach ($databuku1 as $db1) : ?>
        <tr>
          <td><?= $db1['tb_databuku_nama']; ?></td>
          <?php
          $i = 0;
          $i < $jmlhbuku
          ?>
          <?php foreach ($databuku1 as $db2) : ?>
            <td><?php
                $data = [$array_terpecah[$a], $array_terpecah[$i]];
                $similarity = CosineSimilarity::calc($array_terpecah[$a], $array_terpecah[$i]);
                echo '<pre>';
                print_r($data);
                echo 'hasil similarity = ' . $similarity;
                array_push($similarityhasil, $similarity);
                ?>
            </td>
            <?php $i++; ?>
          <?php endforeach; ?>
        </tr>
        <?php $a++;
        ?>
      <?php endforeach; ?>
    </tbody>
  </table>

  <?php
  echo '<pre>';
  // print_r($similarityhasil);
  ?>

  <table border="1" style="margin-top: 50px;">
    <thead>
      <tr>
        <th>
        </th>
        <?php foreach ($databuku1 as $db4) : ?>
          <th><?= $db4['tb_databuku_nama']; ?></th>
        <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
      <?php
      $l = 1;
      $peratingan = [];
      ?>
      <?php foreach ($datasiswa1 as $ds1) : ?>
        <tr>
          <td>
            <?= $ds1['tb_siswa_nama']; ?>
          </td>
          <?php foreach ($databuku1 as $db3) : ?>
            <?php $carinilaibuku = $this->db->get_where('tb_databuku_rating', ['tb_siswa_id' => $ds1['tb_siswa_id'], 'tb_databuku_id' => $db3['tb_databuku_id']])->row_array(); ?>
            <td>
              <?php if (!$carinilaibuku) : ?>
                kosong
                <?php
                $nilainol = 0;
                array_push($peratingan, $nilainol);
                ?>
              <?php else : ?>
                <?php
                echo 'nilai rating = ' . $carinilaibuku['tb_databuku_rating_nilai'];
                array_push($peratingan, $carinilaibuku['tb_databuku_rating_nilai']);
                ?>
              <?php endif; ?>
            </td>
          <?php endforeach; ?>
        </tr>
        <?php $l++; ?>
      <?php endforeach; ?>
    </tbody>
  </table>

  <?php
  $array_terpecah_buku = array_split($peratingan, $jmlhuser);
  $array_terpecah_similarity = array_split($similarityhasil, $jmlhbuku);
  ?>

  <table border="1" style="margin-top: 50px;">
    <thead>
      <tr>
        <th>
        </th>
        <?php foreach ($databuku1 as $databukufinal) : ?>
          <th><?= $databukufinal['tb_databuku_nama']; ?></th>
        <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
      <?php
      $perulangan1 = 0;
      $hasilperatingan = [];
      ?>
      <?php foreach ($datasiswa1 as $datasiswafinal) : ?>
        <tr>
          <td>
            <?= $datasiswafinal['tb_siswa_nama']; ?>
          </td>
          <?php
          $perulangan2 = 0;
          ?>
          <?php foreach ($databuku1 as $databukufinal) : ?>
            <?php $carinilaibuku = $this->db->get_where('tb_databuku_rating', ['tb_siswa_id' => $datasiswafinal['tb_siswa_id'], 'tb_databuku_id' => $databukufinal['tb_databuku_id']])->row_array(); ?>
            <td>
              <?php $tampilidsiswa = '2' ?>
              <?php if ($datasiswafinal['tb_siswa_id'] == $tampilidsiswa) : ?>
                <?php if (!$carinilaibuku) : ?>
                  <?php
                  $hasil_prediksi0 = Weighted_average::calc($array_terpecah_buku[$perulangan1], $array_terpecah_similarity[$perulangan2]);
                  echo $hasil_prediksi0;
                  $data_hasil_prediksi = [
                    'nilairating' => $hasil_prediksi0,
                    'databukuid' => $databukufinal['tb_databuku_id']
                  ];
                  array_push($hasilperatingan, $data_hasil_prediksi);
                  ?>
                <?php else : ?>
                  telah dirating
                  <?php
                  $data_hasil_prediksi = [
                    'nilairating' => 0,
                    'databukuid' => $databukufinal['tb_databuku_id']
                  ];
                  array_push($hasilperatingan, $data_hasil_prediksi);
                  ?>
                <?php endif; ?>
              <?php else : ?>
                <?php if (!$carinilaibuku) : ?>
                  <?php
                  $hasil_prediksi0 = Weighted_average::calc($array_terpecah_buku[$perulangan1], $array_terpecah_similarity[$perulangan2]);
                  echo 'hasilrating ' . $hasil_prediksi0;
                  ?>
                <?php else : ?>
                  telah dirating
                <?php endif; ?>
              <?php endif; ?>
            </td>
            <?php $perulangan2++; ?>
          <?php endforeach; ?>
        </tr>
        <?php $perulangan1++; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php
  rsort($hasilperatingan);
  ?>

  <?php foreach ($hasilperatingan as $hp) : ?>
    <?php if ($hp['nilairating'] != 0) : ?>
      <h1>
        nama buku =
        <?php
        $this->db->where('tb_databuku_id', $hp['databukuid']);
        $carinamabukuhasilrating = $this->db->get('tb_databuku')->row_array();
        $carinamabukuhasilrating['tb_databuku_nama'];
        ?>
      </h1>
    <?php endif; ?>
  <?php endforeach; ?>


</body>

</html>