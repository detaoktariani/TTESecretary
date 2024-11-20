<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Surat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body> -->
<div class="container mt-5">
    <div class="row">
        <table class="table datatable">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal Surat</th>
                    <th scope="col">No Surat</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">Tujuan surat</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($data as $surkel): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $surkel->tgl_surat; ?></td>
                    <td contenteditable="true" onkeypress="checkEnter(event, <?= $surkel->id; ?>, 'nomor', this)" onclick="this.contentEditable = true"><?php echo $surkel->nomor; ?></td>
                    <td><?php echo $surkel->perihal; ?></td>
                    <td><?php echo $surkel->tujuan; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- </body>
</html> -->
<script>
    function checkEnter(event, id, field, element) {
    if (event.key === "Enter") {
        event.preventDefault(); // Mencegah baris baru di kolom yang dapat diedit
        var newValue = element.innerText;
        
        // Memanggil fungsi untuk memperbarui data
        updateData(id, field, newValue);
        
        // Menonaktifkan contenteditable setelah memasukkan data
        element.contentEditable = false; // Menonaktifkan kolom agar tidak bisa diedit lagi langsung
    }
}

// Fungsi updateData untuk mengirim data ke server
function updateData(id, field, value) {
    console.log("ID:", id, "Field:", field, "Value:", value); // Debug log
    $.ajax({
        url: "<?= base_url('Admin/update_nomor'); ?>",
        type: "POST",
        data: {
            id: id,
            field: field,
            value: value
        },
        success: function(response) {
            console.log("Response:", response); // Debug response
            alert("Nomor berhasil diubah");
        },
        error: function(xhr, status, error) {
            console.error("Error:", error); // Debug error
            alert("Nomor gagal diubah");
        }
    });
}

</script>