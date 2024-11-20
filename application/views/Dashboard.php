<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - TTE Secretary</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="<?php echo base_url('assets/img/logoptakecilbgt.png')?>" rel="icon">
  <link href="<?php echo base_url('assets/img/apple-touch-icon.png')?>" rel="apple-touch-icon">
  <link href="<?php echo base_url('https://fonts.gstatic.com')?>" rel="preconnect">
  <link href="<?php echo base_url('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i')?>" rel="stylesheet">


  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/boxicons/css/boxicons.min.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/quill/quill.snow.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/quill/quill.bubble.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/remixicon/remixicon.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/simple-datatables/style.css')?>" rel="stylesheet">

  <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="<?php echo base_url('assets/img/logoptakecil.png')?>" alt="">
        <span class="d-none d-lg-block">SMSK</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <?php
        $userLevel = $this->session->userdata('level');
        $notif = [];

        switch ($userLevel) {
            case '1':
                $notif = $this->ModelNotif->notifadmin();
                $message = "Anda memiliki " . count($notif) . " surat yang belum diberi nomor";
                $link = base_url('Admin/tabelsuratkeluar');
                break;
            case '2':
                $notif = $this->ModelNotif->notifstaf();
                $message = "Anda memiliki " . count($notif) . " surat yang belum di TTE";
                $link = base_url('Staff/Staff/tabelsuratkeluar');
                break;
            case '3':
                $notif = $this->ModelNotif->notifkasub();
                $message = "Anda memiliki " . count($notif) . " surat yang belum divalidasi";
                $link = base_url('Kasub/tabelvalidasi');
                break;
            case '4':
                $notif = $this->ModelNotif->notifkabag();
                $message = "Anda memiliki " . count($notif) . " surat yang belum divalidasi";
                $link = base_url('Kabag/tabelvalidasi');
                break;
            case '5':
                $notif = $this->ModelNotif->notifses();
                $message = "Anda memiliki " . count($notif) . " surat yang belum divalidasi";
                $link = base_url('Sekretaris/tabelvalidasi');
                break;
            default:
                $message = "Tidak ada notifikasi";
                $link = "#";
                break;
        }
        ?>
            <span class="badge bg-primary badge-number"><?php echo count($notif); ?></span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
                    <?php echo $message; ?>
                <a href="<?php echo $link; ?>">
                    <span class="badge rounded-pill bg-primary p-2 ms-2">Lihat surat</span>
                </a>
            </li>

            <li>
                <hr class="dropdown-divider">
            </li>

            <?php 
            $notifLimit = array_slice($notif, 0, 5); // Batasi hanya 5 notifikasi
            foreach ($notifLimit as $item): ?>
                <li class="notification-item">
                    <i class="bi bi-exclamation-circle text-warning"></i>
                    <div>
                        <h4><?php echo $item['tgl_surat']; ?></h4>
                        <p><?php echo $item['perihal']; ?></p>
                        <p>Diinput pada tanggal <?php echo $item['tgl_input']; ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        </li>

        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $this->session->userdata('nama')?></span>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url('Updatepassword')?>">
                <i class="ri-edit-box-line"></i>
                <span>Update Password</span>
              </a>
          </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url('Login/logout')?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>
          </ul>
          </li>
          </ul>
          </nav>       

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
    <?php if($this->session->userdata('level') == '3' ) { ?>
  <li class="nav-item">
  <a class="nav-link" href="<?php echo base_url('Kasub/index')?>">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
  <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-journal-text"></i>
          <span>Surat Masuk</span>
        </a>
      </li>
  <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('Kasub/tabelvalidasi')?>">
          <i class="bi bi-journal-text"></i>
          <span>Surat Keluar</span>
        </a>
  </li>

<?php } else if($this->session->userdata('level') == '4' ) { ?>
  <li class="nav-item">
  <a class="nav-link" href="<?php echo base_url('Kabag/index')?>">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
  <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-journal-text"></i>
          <span>Surat Masuk</span>
        </a>
      </li>

  <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('Kabag/tabelvalidasi')?>">
          <i class="bi bi-journal-text"></i>
          <span>Surat Keluar</span>
        </a>
  </li>

<?php } else if($this->session->userdata('level') == '5' ) { ?>
  <li class="nav-item">
  <a class="nav-link" href="<?php echo base_url('Sekretaris/index')?>">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
  <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-journal-text"></i>
          <span>Surat Masuk</span>
        </a>
      </li>

  <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('Sekretaris/tabelvalidasi')?>">
          <i class="bi bi-journal-text"></i>
          <span>Surat Keluar</span>
        </a>
  </li>

<?php } else if($this->session->userdata('level') == '2') { ?>
  <li class="nav-item">
  <a class="nav-link" href="<?php echo base_url('Staff/Staff/index')?>">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Surat Masuk</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="#">
          <i class="bi bi-circle"></i><span>Input Surat Masuk</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="bi bi-circle"></i><span>Tabel Surat Masuk</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Surat Keluar</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?php echo base_url('Staff/Staff/inputsuratkeluar')?>">
          <i class="bi bi-circle"></i><span>Input Surat Keluar</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url('Staff/Staff/tabelsuratkeluar')?>">
          <i class="bi bi-circle"></i><span>Tabel Surat Keluar</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->
<?php } else if($this->session->userdata('level') == '1') { ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('Admin/Welcome')?>">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Surat Masuk</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="#">
          <i class="bi bi-circle"></i><span>Input Surat Masuk</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="bi bi-circle"></i><span>Tabel Surat Masuk</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Surat Keluar</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
    
      <li>
        <a href="<?php echo base_url('Admin/tabelsuratkeluar')?>">
          <i class="bi bi-circle"></i><span>Tabel Surat Keluar</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->
<?php } ?>


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active"><?php echo $judul ?></li>
        </ol>
      </nav>
    </div>

    <!-- <section class="section dashboard">
      <div class="row"> -->

        <!-- Left side columns -->
        <!-- <div class="col-lg-8">
          <div class="row"> -->

          <div class="main-panel">
          <div class="content-wrapper">
          <div class="wrapper">
               <?php $this->load->view($html);?>
            </div>
          </div>

      <!-- </div>
    </section> -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>PTA Bengkulu</span></strong>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files Modal -->
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
  <!-- Vendor JS Files -->
  <script src="<?php echo base_url('assets/vendor/apexcharts/apexcharts.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/chart.js/chart.umd.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/echarts/echarts.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/quill/quill.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/simple-datatables/simple-datatables.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/tinymce/tinymce.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/php-email-form/validate.js')?>"></script>
  
  <!-- Template Main JS File -->
  <script src="<?php echo base_url('assets/js/main.js')?>"></script>

</body>

</html>