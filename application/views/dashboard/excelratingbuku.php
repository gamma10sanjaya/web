<?php
header("Content-type:application/octet-stream/");
header("Content-Disposition:attachment; filename=dataasesi.xls");
header("Program: no-chace");
header("Expires: 0");
?>
<table>
  <tbody>
    <tr>
      <td colspan="3" style="text-align: center;">Laporan Hasil Rating</td>
    </tr>
    <tr>
      <td colspan="3" style="text-align: center;">Data Buku di Perpustakaan</td>
    </tr>
  </tbody>
</table>
<br>
<br>
<br>
<?php $databuku = $this->db->get('tb_databuku')->result_array(); ?>
<?php foreach ($databuku as $db) : ?>
  <table>
    <tbody>
      <tr>
        <td></td>
        <td>Nama Buku : <?= $db['tb_databuku_nama']; ?></td>
      </tr>
      <tr>
        <td></td>
        <td>Penulis Buku : <?= $db['tb_databuku_penulis']; ?></td>
      </tr>
      <tr>
        <td></td>
        <td>Penerbit Buku : <?= $db['tb_databuku_penerbit']; ?></td>
      </tr>
      <tr>
        <td></td>
        <td>Tanggal Terbit Buku : <?= $db['tb_databuku_tanggal']; ?></td>
      </tr>
      <tr>
        <td></td>
        <td>Genre Buku : <?= $db['tb_databuku_jenis_id']; ?></td>
      </tr>
    </tbody>
  </table>
  <table class="table" border="1" width="100%">
    <thead class="text-success">
      <tr>
        <th>Nomor</th>
        <th>Nama Siswa</th>
        <th>Jumlah Rating</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php $datasiswa = $this->db->get('tb_siswa')->result_array(); ?>
      <?php foreach ($datasiswa as $ds) : ?>
        <tr>
          <td><?= $i; ?></td>
          <td><?= $ds['tb_siswa_nama']; ?></td>
          <?php
          $nilairating = $this->db->where('tb_siswa_id', $ds['tb_siswa_id']);
          $nilairating = $this->db->where('tb_databuku_id', $db['tb_databuku_id']);
          $nilairating = $this->db->get('tb_databuku_rating')->row_array();
          ?>
          <td><?= $nilairating['tb_databuku_rating_nilai']; ?></td>
        </tr>
        <?php $i++; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
  <br>
<?php endforeach; ?>