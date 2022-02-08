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
                </div>
                <div class="card-block">
                  <?= form_open_multipart('dashboard/tambahbuku'); ?>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Buku</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama" id="nama" class="form-control form-control-round" placeholder="Nama Buku" value="<?= set_value('nama'); ?>">
                      <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis Buku</label>
                    <div class="col-sm-10">
                      <select name="jenis" id="jenis" class="form-control form-control-round">
                        <option>- Silahkan Pilih -</option>
                        <?php foreach ($jenisbuku as $jb) : ?>
                          <option value="<?= $jb['tb_databuku_jenis_id']; ?>"><?= $jb['tb_databuku_jenis_title'] ?></option>
                        <?php endforeach; ?>
                      </select>
                      <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun Terbit</label>
                    <div class="col-sm-10">
                      <input type="text" name="tanggal" id="tanggal" class="form-control form-control-round" placeholder="Tahun Terbit">
                      <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                      <input type="text" name="penulis" id="penulis" class="form-control form-control-round" placeholder="Penulis" value="<?= set_value('penulis'); ?>">
                      <?= form_error('penulis', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                      <input type="text" name="penerbit" id="penerbit" class="form-control form-control-round" placeholder="Penerbit" value="<?= set_value('penerbit'); ?>">
                      <?= form_error('penerbit', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                      <input type="file" name="image" id="image" class="form-control form-control-round" placeholder="Image Buku">
                      <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
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