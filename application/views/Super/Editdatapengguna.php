
<section class="section">
      <div class="row">
        <!-- <div class="col-lg-6"> -->

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Data Pengguna</h5>

              <!-- General Form Elements -->
              
              <?php foreach($data as $dtpengguna){ ?>
                <?php echo form_open_multipart('Super/eddatapengguna'); ?>

              <div class="row mb-3">
                  <input name="id" type="hidden" id="id" value="<?php echo $dtpengguna['id']; ?>"/>
                  <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name = "username" id="username" value="<?php echo $dtpengguna['username']; ?>">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-4">
                    <input type="password" class="form-control" name = "password" id="password" value="<?php echo $dtpengguna['password']; ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name = "nama" id="nama" value="<?php echo $dtpengguna['nama']; ?>">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label">No Hp</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name = "nohp" id="nohp" value="<?php echo $dtpengguna['nohp']; ?>">
                  </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Role</label>
                  <div class="col-md-2">
                    <select id="level"  name = "level" class="form-control">
                      <option selected>Pilih</option>
                      <option value="1" <?php echo ($dtpengguna['level'] == "1") ? "selected" : ""; ?>>Admin</option>
                      <option value="5" <?php echo ($dtpengguna['level'] == "5") ? "selected" : ""; ?>>Pimpinan</option>
                      <option value="4" <?php echo ($dtpengguna['level'] == "4") ? "selected" : ""; ?>>Kabag</option>
                      <option value="3" <?php echo ($dtpengguna['level'] == "3") ? "selected" : ""; ?>>Kasubbag</option>
                      <option value="2" <?php echo ($dtpengguna['level'] == "2") ? "selected" : ""; ?>>Staff</option>
                    </select>
                  </div>
                  <label for="inputText" class="col-sm-1 col-form-label">Jabatan</label>
                  <div class="col-md-4">
                    <select class="form-select" aria-label="Default select example" name = "id_jabatan">
                      <option selected>Pilih</option>
                      <option value="8" <?php echo ($dtpengguna['id_jabatan'] == "1") ? "selected" : ""; ?>>Ketua</option>
                      <option value="9" <?php echo ($dtpengguna['id_jabatan'] == "9") ? "selected" : ""; ?>>Wakil Ketua</option>
                      <option value="10" <?php echo ($dtpengguna['id_jabatan'] == "10") ? "selected" : ""; ?>>Panitera</option>
                      <option value="1" <?php echo ($dtpengguna['id_jabatan'] == "1") ? "selected" : ""; ?>>Sekretaris</option>
                      <option value="2" <?php echo ($dtpengguna['id_jabatan'] == "2") ? "selected" : ""; ?>>Kabag Perencanaan Kepegawaian dan IT</option>
                      <option value="3" <?php echo ($dtpengguna['id_jabatan'] == "3") ? "selected" : ""; ?>>Kabag Umum dan Keuangan</option>
                      <option value="5" <?php echo ($dtpengguna['id_jabatan'] == "5") ? "selected" : ""; ?>>Kasubbag Kepegawaian dan IT</option>
                      <option value="4" <?php echo ($dtpengguna['id_jabatan'] == "4") ? "selected" : ""; ?>>Kasubbag Perencanaan</option>
                      <option value="7" <?php echo ($dtpengguna['id_jabatan'] == "7") ? "selected" : ""; ?>>Kasubbag TU RT</option>
                      <option value="6" <?php echo ($dtpengguna['id_jabatan'] == "6") ? "selected" : ""; ?>>Kasubbag Keuangan dan Pelaporan</option>
                      <option value="11" <?php echo ($dtpengguna['id_jabatan'] == "11") ? "selected" : ""; ?>>Staf Kepegawaian dan IT</option>
                      <option value="12" <?php echo ($dtpengguna['id_jabatan'] == "12") ? "selected" : ""; ?>>Staf Perencanaan</option>
                      <option value="14" <?php echo ($dtpengguna['id_jabatan'] == "14") ? "selected" : ""; ?>>Staf TU RT</option>
                      <option value="13" <?php echo ($dtpengguna['id_jabatan'] == "13") ? "selected" : ""; ?>>Staf Keuangan dan Pelaporan</option>
                    </select>
                  </div>
                  <label for="inputText" class="col-sm-1 col-form-label">Status</label>
                  <div class="col-md-2">
                    <select class="form-select" aria-label="Default select example" name = "status">
                      <option selected>Pilih</option>
                      <option value="Y" <?php echo ($dtpengguna['status'] == "Y") ? "selected" : ""; ?>>Aktif</option>
                      <option value="N" <?php echo ($dtpengguna['status'] == "N") ? "selected" : ""; ?>>Tidak Aktif</option>
                    </select>
                  </div>
                </div>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
                <?php echo form_close(); ?>
              </form><!-- End General Form Elements -->
              <?php } ?>
                
            </div>
          </div>

        </div>

        