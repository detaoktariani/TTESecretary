<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Pengguna</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5"> -->
    <div class="row">
        <table class="table datatable">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Level</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($data as $pengguna): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $pengguna->nama; ?></td>
                    <td><?php echo $pengguna->username; ?></td>
                    <td><?php echo "*" ?></td>
                    <td><?php echo $pengguna->level; ?></td>
                    <td><?php echo $pengguna->id_jabatan; ?></td>
                    <td><?php echo $pengguna->nohp; ?></td>
                    <td><a class="btn btn-primary" href="<?php echo base_url('Super/editpengguna?id=' . $pengguna->id); ?>">Edit</a>
                        <a class="btn btn-danger" href="<?php echo base_url() . 'Super/hapusdatapengguna?id=' . $pengguna->id; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<!-- </div>
</body>
</html> -->
