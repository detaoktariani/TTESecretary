
<section class="section">
      <div class="row">
        <!-- <div class="col-lg-6"> -->

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Surat Keluar</h5>

              <!-- General Form Elements -->
              <?php echo form_open_multipart('Staff/Staff/edsuratkeluar');?>
              <?php
                            foreach($data as $dtsuratkeluar){
                        ?>
              <form>
              <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nomor</label>
                  <div class="col-md-1">
                    <input type="text" class="form-control" disabled>
                  </div>
                  <span class="col-md-auto">/</span>
                  <div class="col-md-2">
                    <select class="form-select" aria-label="Default select example" name = "ttdpejabat" id="ttdpejabat">
                      <option selected>Pilih</option>
                      <option value="Ketua">KPTA.W7-A</option>
                      <option value="Wakil">WKPTA.W7-A</option>
                      <option value="Sekretaris">SEK.PTA.W7-A</option>
                      <option value="Panitera">PAN.PTA.W7-A</option>
                    </select>
                  </div>
                  <span class="col-md-auto">/</span>
                  <div class="col-md-1">
                    <input type="text" class="form-control" name="kode" id="kode">
                  </div>
                  <span class="col-md-auto">/</span>
                  <div class="col-md-2">
                  <select class="form-select" aria-label="Default select example" name = "bulan" id="bulan">
                      <option selected>Pilih</option>
                      <option value="I">I</option>
                      <option value="II">II</option>
                      <option value="III">III</option>
                      <option value="IV">IV</option>
                      <option value="V">V</option>
                      <option value="VI">VI</option>
                      <option value="VII">VII</option>
                      <option value="VIII">VIII</option>
                      <option value="IX">IX</option>
                      <option value="X">X</option>
                      <option value="XI">XI</option>
                      <option value="XII">XII</option>
                    </select>
                    <!-- <input type="text" class="form-control"> -->
                  </div>
                  <span class="col-md-auto">/</span>
                  <div class="col-md-1">
                    <input type="text" class="form-control" name = "tahun" id="tahun">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Jenis Surat</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name = "jenis" id="jenis">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label">Perihal</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name = "perihal" id="perihal">
                  </div>
                </div>

                
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Surat</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name = "tgl_surat" id="tgl_surat">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tujuan Surat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "tujuan" id="tujuan">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Link Dokumen</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "linksurat" id="linksurat">
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

        