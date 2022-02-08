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
                  <span>DataTables has most features enabled by default, so all you need to do to use it with your own ables is to call the construction function: $().DataTable();.</span>
                  <hr>
                </div>
                <div class="card-block">
                  <form action="<?= base_url('user/tambahsiswa') ?>" method="POST">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Siswa</label>
                      <div class="col-sm-10">
                        <input type="text" name="nama" id="nama" class="form-control form-control-round" placeholder="Nama Siswa" value="<?= set_value('title'); ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Rombongan Belajar</label>
                      <div class="col-sm-10">
                        <select name="rombel" id="rombel" class="form-control form-control-round">
                          <option>- Silahkan Pilih -</option>
                          <?php foreach ($datarombel as $dr) : ?>
                            <option value="<?= $dr['tb_rombel_id']; ?>"><?= $dr['tb_rombel_title']; ?></option>
                          <?php endforeach; ?>
                        </select>
                        <?= form_error('rombel', '<small class="text-danger pl-3">', '</small>'); ?>
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