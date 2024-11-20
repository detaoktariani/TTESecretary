
<div class="card">
<div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
<center><strong style="color:red"><?php echo $this->session->flashdata('error'); ?></strong></center>
<center><strong style="color:green"><?php echo $this->session->flashdata('success'); ?></strong></center>
                <?php echo form_open('Updatepassword/change_password'); ?>

                    <div class="row mb-6">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="pwlama" type="password" class="form-control" id="pwlama">
                      </div>
                    </div>

                    <div class="row mb-6">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="pwbaru" type="password" class="form-control" id="pwbaru">
                      </div>
                    </div>

                    <div class="row mb-6">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password Baru</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="confirm_password" type="password" class="form-control" id="confirm_password">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Ubah Password</button>
                    </div>
                    <?php echo form_close(); ?>

     
                  </div></div>