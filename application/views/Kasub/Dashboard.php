<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - TTE Secretary</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Surat Masuk Card -->
<div class="col-xxl-4 col-md-6">
  <div class="card info-card sales-card">
    <div class="card-body">
      <h5 class="card-title">Surat Masuk <span></h5>
      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-inbox"></i>
        </div>
        <div class="ps-3">
          <h6>0</h6>
          <span class="text-success small pt-1 fw-bold">Surat</span>
        </div>
      </div>
    </div>
  </div>
</div><!-- End Surat Masuk Card -->



<!-- Surat Keluar Card -->

<div class="col-xxl-4 col-md-6">
  <div class="card info-card revenue-card">
    <div class="card-body">
      <h5 class="card-title">Surat Keluar</h5>
      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-send"></i>
        </div>
        <div class="ps-3">
        <h6><?php echo $Total; ?></h6>
          <span class="text-success small pt-1 fw-bold">Surat</span>
        </div>
      </div>
    </div>
  </div>
</div><!-- End Surat Keluar Card -->


<!-- Total Surat Card -->
<div class="col-xxl-4 col-md-12">
  <div class="card info-card customers-card">
    <div class="card-body">
      <h5 class="card-title">Total </h5>
      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-file-earmark-text"></i>
        </div>
        <div class="ps-3">
        <h6><?php echo $Total; ?></h6>
          <span class="text-danger small pt-1 fw-bold">Surat</span>
        </div>
      </div>
    </div>
  </div>
</div><!-- End Total Surat Card -->


  <!-- Reports -->
  <div class="col-12">
  <div class="card">

    <div class="card-body">
      <h5 class="card-title">Grafik Surat Masuk dan Surat Keluar</h5>

      <!-- Line Chart -->
      <div id="reportsChart"></div>

      <script>
        document.addEventListener("DOMContentLoaded", () => {
          const suratKeluarData = <?php echo json_encode($Grafik); ?>;
          
          // Data untuk Surat Keluar per bulan
          const suratKeluar = suratKeluarData.map(item => item.total_surat);
          const bulan = suratKeluarData.map(item => {
            // Mencocokkan nama bulan
            const months = [
              'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
              'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ];
            return months[item.bulan - 1]; // Konversi angka bulan ke nama bulan
          });

          new ApexCharts(document.querySelector("#reportsChart"), {
            series: [{
              name: 'Surat Masuk',
              data: [0],
            }, {
              name: 'Surat Keluar',
              data: suratKeluar
            }],
          
            chart: {
              height: 350,
              type: 'area',
              toolbar: {
                show: false
              },
            },
            markers: {
              size: 4
            },
            colors: ['#4154f1', '#ff771d'],
            fill: {
              type: "gradient",
              gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.3,
                opacityTo: 0.4,
                stops: [0, 90, 100]
              }
            },
            dataLabels: {
              enabled: false
            },
            stroke: {
              curve: 'smooth',
              width: 2
            },
            xaxis: {
              categories: bulan, // Nama bulan untuk kategori sumbu X
            },
            tooltip: {
              x: {
                format: 'dd/MM/yy' // Format tooltip
              },
            }
          }).render();
        });
      </script>
      <!-- End Line Chart -->

    </div>

  </div>
</div>



    </section>

  </main><!-- End #main -->

  
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>