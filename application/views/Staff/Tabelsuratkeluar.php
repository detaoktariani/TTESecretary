<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Surat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <table class="table datatable">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal Submit</th>
                    <th scope="col">No Surat</th>
                    <th scope="col">Tanggal Surat</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">Link Dokumen</th>
                    <th scope="col">Validasi</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">File Surat</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($data as $surkel): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $surkel->tgl_input; ?></td>
                    <td><?php echo $surkel->nomor; ?></td>
                    <td><?php echo $surkel->tgl_surat; ?></td>
                    <td><?php echo $surkel->perihal; ?></td>
                    <td><a href="<?php echo $surkel->linksurat; ?>" target="_blank">Link Dokumen</a></td>
                    <td>
                        <?php 
                            if ($surkel->statusvalidasi == 0) {
                                echo '<span class="badge badge-danger">Belum divalidasi</span>'; 
                            } elseif ($surkel->statusvalidasi == 1) {    
                                echo '<span class="badge badge-success">Kepala Sub Bagian</span>';
                            } elseif ($surkel->statusvalidasi == 2) {
                                echo '<span class="badge badge-info">Kepala Bagian</span>';
                            } elseif ($surkel->statusvalidasi == 3) {
                                echo '<span class="badge badge-primary">Sekretaris</span>';    
                            } else {
                                echo '-';
                            }   
                        ?>
                    </td>
                    <td><a class="btn btn-primary" href="<?php echo base_url('Staff/Staff/tampedsuratkeluar?id=' . $surkel->id); ?>">Edit</a>
                        <a class="btn btn-danger" href="<?php echo base_url() . 'Staff/Staff/hapussuratkeluar?id=' . $surkel->id; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>
                    </td>
                    <?php 
                    $nomor = preg_match('/^\d+/', $surkel->nomor);
                        if ($surkel->statusvalidasi == 3 && $nomor == 1) { ?>
                   <td>
                        <button 
                            class="btn btn-success tooltips" 
                            data-id="<?php echo $surkel->id ?>" 
                            data-bs-toggle="modal" 
                            data-bs-target="#Uploadfile"
                            title="Upload File">
                            <a>Upload file</a>
                        </button>
                    <!-- </td> -->
                    <?php if($surkel->pdfsurat!=""){ ?>
                        <a class="btn btn-warning tooltips"  href="<?php echo base_url('/assets/surat_keluar/'.$surkel->pdfsurat); ?>" target="_blank">Link Dokumen</a></td>
               <?php } } else { ?>                      
                        <td>Proses surat belum selesai</td>
                    <?php } ?>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="Uploadfile" tabindex="-1" aria-labelledby="UploadfileLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UploadfileLabel">Upload Surat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php echo form_open_multipart('Staff/Staff/upload_skeluar'); ?>
            <div class="modal-body">
                <div class="mb-3">
                    <!-- <label for="id" class="form-label">ID</label> -->
                    <input name="id" type="hidden" id="id" class="form-control" readonly />
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Surat</label>
                    <input class="form-control" type="file" id="formFile" name="file1" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>



</body>
</html>

<script>
 $(document).ready(function() {
    $('#Uploadfile').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Tombol yang memicu modal
        var id = button.data('id'); // Ambil data-id dari tombol
        
        var modal = $(this);
        modal.find('#id').val(id); // Isi input dengan ID yang diambil
    });
});

</script>



