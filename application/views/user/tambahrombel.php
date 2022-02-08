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
                  <span>Tambah data rombongan belajar</span>
                  <hr>
                </div>
                <div class="card-block">
                  <form action="<?= base_url('user/tambahrombel') ?>" method="POST">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Title Robongan Belajar</label>
                      <div class="col-sm-10">
                        <input type="text" name="title" id="title" class="form-control form-control-round" placeholder="Title Robongan Belajar" value="<?= set_value('title'); ?>">
                        <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Kelas</label>
                      <div class="col-sm-10">
                        <select name="kelas" id="kelas" class="form-control form-control-round">
                          <option>- Silahkan Pilih -</option>
                          <?php foreach ($datakelas as $dk) : ?>
                            <option value="<?= $dk['tb_kelas_id']; ?>"><?= $dk['tb_kelas_title']; ?></option>
                          <?php endforeach; ?>
                        </select>
                        <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tahun Masuk</label>
                      <div class="col-sm-10">
                        <input type="text" name="tahun" id="tahun" class="form-control form-control-round">
                        <?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
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