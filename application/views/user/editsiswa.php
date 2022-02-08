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
                  <span>Ubah data siswa</span>
                  <hr>
                </div>
                <div class="card-block">
                  <form action="<?= base_url('user/editsiswa/') . $siswaid ?>" method="POST">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Siswa</label>
                      <div class="col-sm-10">
                        <input type="text" name="nama" id="nama" class="form-control form-control-round" value="<?= $datasiswa['tb_siswa_nama']; ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
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