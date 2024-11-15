<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Surat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script>
        function confirmValidation(event) {
            event.preventDefault();
            var confirmation = confirm("Apakah Anda yakin ingin melakukan validasi?");
            if (confirmation) {
                event.target.submit(); 
            } else {
                alert("Validasi dibatalkan.");
            }
        }
    </script>
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
                        <?php if ($surkel->statusvalidasi == 0): ?>
                            <span class="badge bg-danger">Menunggu Validasi Kasub</span>  
                        <?php elseif ($surkel->statusvalidasi == 1): ?>
                            <span class="badge bg-warning text-dark">Menunggu Validasi Kabag</span>                             
                        <?php elseif ($surkel->statusvalidasi == 2): ?>
                            <form method="post" action="<?php echo base_url('Sekretaris/tabelvalidasi'); ?>" onsubmit="confirmValidation(event)">
                                <input type="hidden" name="id" value="<?php echo $surkel->id; ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Validasi</button>
                            </form>
                        <?php else: ?>
                            <span class="badge bg-success">Tervalidasi</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
