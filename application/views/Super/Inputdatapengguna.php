
<section class="section">
      <div class="row">
        <!-- <div class="col-lg-6"> -->

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Input Data Penguna</h5>

              <!-- General Form Elements -->
              <?php echo form_open_multipart('Super/inputdata');?>
              <form>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name = "username">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-4">
                    <input type="password" class="form-control" name = "password">
                  </div>
                </div>

                
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name = "nama">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label">No Hp</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name = "nohp">
                  </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Role</label>
                  <div class="col-md-2">
                    <select class="form-select" aria-label="Default select example" name = "level">
                      <option selected>Pilih</option>
                      <option value="1">Admin</option>
                      <option value="5">Pimpinan</option>
                      <option value="4">Kabag</option>
                      <option value="3">Kasubbag</option>
                      <option value="2">Staff</option>
                    </select>
                  </div>
                  <label for="inputText" class="col-sm-1 col-form-label">Jabatan</label>
                  <div class="col-md-4">
                    <select class="form-select" aria-label="Default select example" name = "id_jabatan">
                      <option selected>Pilih</option>
                      <option value="8">Ketua</option>
                      <option value="9">Wakil Ketua</option>
                      <option value="10">Panitera</option>
                      <option value="1">Sekretaris</option>
                      <option value="2">Kabag Perencanaan Kepegawaian dan IT</option>
                      <option value="3">Kabag Umum dan Keuangan</option>
                      <option value="5">Kasubbag Kepegawaian dan IT</option>
                      <option value="4">Kasubbag Perencanaan</option>
                      <option value="7">Kasubbag TU RT</option>
                      <option value="6">Kasubbag Keuangan dan Pelaporan</option>
                      <option value="11">Staf Kepegawaian dan IT</option>
                      <option value="12">Staf Perencanaan</option>
                      <option value="14">Staf TU RT</option>
                      <option value="13">Staf Keuangan dan Pelaporan</option>
                    </select>
                  </div>
                  <label for="inputText" class="col-sm-1 col-form-label">Status</label>
                  <div class="col-md-2">
                    <select class="form-select" aria-label="Default select example" name = "status">
                      <option selected>Pilih</option>
                      <option value="Y">Aktif</option>
                      <option value="N">Tidak Aktif</option>
                    </select>
                  </div>
                </div>
                
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
                <?php echo form_close(); ?>
              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        