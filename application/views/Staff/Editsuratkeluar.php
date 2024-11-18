
<section class="section">
      <div class="row">
        <!-- <div class="col-lg-6"> -->

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Surat Keluar</h5>

              <!-- General Form Elements -->
              
              <?php
                            foreach($data as $dtsuratkeluar){
                        ?>
              <form <?php echo form_open_multipart('Staff/Staff/edsuratkeluar');?>>
              <div class="row mb-3">
                <input name="id" type="hidden" id="id" value="<?php echo $dtsuratkeluar['id']; ?>"/>
                  <label for="inputText" class="col-sm-2 col-form-label">Nomor</label>
                  <div class="col-md-1">
                    <input type="text" class="form-control" disabled>
                  </div>
                  <span class="col-md-auto">/</span>
                  <div class="col-md-2">
                  <?php
                    // Mengatur label untuk id_jabatan berdasarkan nilai dari database
                    $idjab = "";
                    if ($dtsuratkeluar['id_jabatan'] == "1") {
                        $idjab = "SEK.PTA.W7-A";
                    } elseif ($dtsuratkeluar['id_jabatan'] == "8") {
                        $idjab = "KPTA.W7-A";
                    } elseif ($dtsuratkeluar['id_jabatan'] == "9") {
                        $idjab = "WKPTA.W7-A";
                    } elseif ($dtsuratkeluar['id_jabatan'] == "10") {
                        $idjab = "PAN.PTA.W7-A";
                    }
                  ?>

                    <select id="id_jabatan" name="id_jabatan" class="form-control">
                        <?php if ($dtsuratkeluar['id_jabatan'] == "") { ?>
                            <!-- Menampilkan opsi "Pilih" sebagai opsi default jika id_jabatan kosong -->
                            <option value="" selected>Pilih</option>
                        <?php } else { ?>
                            <!-- Menampilkan opsi yang sesuai dengan nilai id_jabatan dari database -->
                            <option value="<?php echo $dtsuratkeluar['id_jabatan']; ?>" selected><?php echo $idjab; ?></option>
                        <?php } ?>
                        
                        <!-- Tambahkan pilihan lain untuk id_jabatan yang dapat dipilih oleh pengguna -->
                        <option value="1" <?php echo ($dtsuratkeluar['id_jabatan'] == "1") ? "selected" : ""; ?>>SEK.PTA.W7-A</option>
                        <option value="8" <?php echo ($dtsuratkeluar['id_jabatan'] == "8") ? "selected" : ""; ?>>KPTA.W7-A</option>
                        <option value="9" <?php echo ($dtsuratkeluar['id_jabatan'] == "9") ? "selected" : ""; ?>>WKPTA.W7-A</option>
                        <option value="10" <?php echo ($dtsuratkeluar['id_jabatan'] == "10") ? "selected" : ""; ?>>PAN.PTA.W7-A</option>
                    </select>
                  </div>
                  <span class="col-md-auto">/</span>
                  <div class="col-md-1">
                    <input type="text" class="form-control" name="kode" id="kode" value="<?php echo $dtsuratkeluar['kode']; ?>" >
                  </div>
                  <span class="col-md-auto">/</span>
                  <div class="col-md-2">
                  <select id="bulan" name="bulan" class="form-control">
                    <?php
                      $bulan = $dtsuratkeluar['nomor'];
                      $parts = explode('/', $bulan);
                      $bulan = $parts[3];
                      $allMonths = ["I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII"];
                      if ($bulan !=""){?>
                        <!-- echo '<option value="' . $bulan . '">' . $bulan . '</option>'; -->
                        <option value="<?php echo $bulan;?>" selected><?php echo $bulan;?></option>
                        <?php foreach ($allMonths as $month) {
                          if ($month !== $bulan) {?>
                          <!-- echo '<option value="' . $month . '">' . $month . '</option>'; -->
                          <option value="<?php echo $month;?>"><?php echo $month;?></option>
                          <?php } 
                        }
                      } else { ?>
                        <option value="" >Pilih</option>
                      <?php 
                        foreach ($allMonths as $month) {?>
                          <!-- echo '<option value="' . $month . '">' . $month . '</option>'; -->
                          <option value="<?php echo $month;?>" ><?php echo $month;?></option>
                        <?php }
                      }
                       
                    ?>
                  </select>
                  </div>
                  <span class="col-md-auto">/</span>
                  <div class="col-md-1">
                    <input type="text" class="form-control" name = "tahun" id="tahun"  value="<?php echo $parts[4] ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Jenis Surat</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name = "jenis" id="jenis" value="<?php echo $dtsuratkeluar['jenis']; ?>">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label">Perihal</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name = "perihal" id="perihal" value="<?php echo $dtsuratkeluar['perihal']; ?>">
                  </div>
                </div>

                
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Surat</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name = "tgl_surat" id="tgl_surat" value="<?php echo $dtsuratkeluar['tgl_surat']; ?>">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tujuan Surat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "tujuan" id="tujuan" value="<?php echo $dtsuratkeluar['tujuan']; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Link Dokumen</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "linksurat" id="linksurat" value="<?php echo $dtsuratkeluar['linksurat']; ?>">
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

        