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
                  <h5>Tambah Data Buku</h5>
                  <span>Ubah data rombongan belajar</span>
                  <hr>
                </div>
                <div class="card-block">
                  <form action="<?= base_url('user/editrombel/') . $rombelid ?>" method="POST">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Kelas</label>
                      <div class="col-sm-10">
                        <select name="kelas" id="kelas" class="form-control form-control-round">
                          <?php $kelas = $this->db->get_where('tb_kelas', ['tb_kelas_id' => $datarombel['tb_kelas_id']])->row_array(); ?>
                          <option value="<?= $datarombel['tb_kelas_id']; ?>"><?= $kelas['tb_kelas_title'] ?></option>
                          <?php foreach ($datakelas as $dk) : ?>
                            <option value="<?= $dk['tb_kelas_id']; ?>"><?= $dk['tb_kelas_title']; ?></option>
                          <?php endforeach; ?>
                        </select>
                        <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Semester</label>
                      <div class="col-sm-10">
                        <select name="semester" id="semester" class="form-control form-control-round">
                          <option value="<?= $datarombel['tb_rombel_semester']; ?>"><?= $datarombel['tb_rombel_semester']; ?></option>
                          <option value="Gasal">Gasal</option>
                          <option value="Genap">Genap</option>
                          <option value="<?= date('Y'); ?>">Alumni</option>
                        </select>
                        <?= form_error('semester', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
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