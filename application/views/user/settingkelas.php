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
                  <h5>Setting Kelas untuk guru "<?= $namaguru['user_name']; ?>"</h5>
                  <span>DataTables has most features enabled by default, so all you need to do to use it with your own ables is to call the construction function: $().DataTable();.</span>
                  <hr>
                </div>
                <div class="card-block">
                  <form action="<?= base_url('user/settingkelas/') . $userid ?>" method="POST">
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