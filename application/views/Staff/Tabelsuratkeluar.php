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
                    <td><a href="<?php echo $surkel->linksurat; ?>" target="_blank"><?php echo $surkel->perihal; ?></a></td>
                    <td>
                        <?php 
                            if ($surkel->statusvalidasi == 1) {
                                echo '<span class="badge badge-success">Kepala Sub Bagian</span>';
                            } elseif ($surkel->statusvalidasi == 2) {
                                echo '<span class="badge badge-info">Kepala Bagian</span>';
                            } elseif ($surkel->statusvalidasi == 3) {
                                echo '<span class="badge badge-primary">Sekretaris</span>';    
                            } else {
                                echo '<span class="badge badge-danger">Belum divalidasi</span>';
                            }   
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
