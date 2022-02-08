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
                  <h5>Tambah Data Guru</h5>
                  <span>DataTables has most features enabled by default, so all you need to do to use it with your own ables is to call the construction function: $().DataTable();.</span>
                  <hr>
                </div>
                <div class="card-block">
                  <form action="<?= base_url('user/tambahguru') ?>" method="POST">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" name="nama" id="nama" class="form-control form-control-round" placeholder="username" value="<?= set_value('nama'); ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" name="email" id="email" class="form-control form-control-round" placeholder="Email">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="password1" id="password1" class="form-control form-control-round" placeholder="Password" value="<?= set_value('password'); ?>">
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Ulangi Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="password2" id="password2" class="form-control form-control-round" placeholder="Repeat Password" value="<?= set_value('password'); ?>">
                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
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