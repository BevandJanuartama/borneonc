<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex,nofollow">
    <meta name="google" content="notranslate">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VPN REMOTE</title>
    <link rel="shortcut icon" href="/assets/img/icon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="/assets/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/css/adminlte.min.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <style>
        /* Additional styles for padding and layout */
        .content-wrapper {
            padding: 20px; /* Add padding to the content wrapper */
        }
    </style>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed">
    <div id="loading" class="d-none">
        <div class="load">
            <div class="spinner-border text-primary" style="width: 7rem; height: 7rem;" role="status">
                <span class="visually-hidden"></span>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="https://api.whatsapp.com/send?phone=6282171032180" target="_blank" class="btn btn-success text-right"><i class="fab fa-whatsapp fa-lg"></i> <b>Technical Support</b></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Include Sidebar -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1>VPN Remote</h1>
                            <hr class="bg-primary">
                            <ul>
                                <li>VPN Remote berfungsi untuk melakukan remote ke mikrotik anda dari luar jaringan melalui VPN Remote yang di sediakan oleh pihak RL Radius.</li>
                                <li>Minimal Paket Instance yang digunakan adalah paket RLCLoud Premium</li>
                                <li>Panduan lihat video di youtube pada link ini: <a href="https://www.youtube.com/watch?v=E5xPXkf-cOE&list=PLVA91M9nFgiyTfSrQctnx2vBdnp7IRsYJ&index=2" target="_blank"><b>Lihat Video</b></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3>VPN Account</h3>
                                </div>
                                <div id="example1_wrapper" class="m-1">
                                    <div class="row">
                                        <button type="button" class="btn btn-info text-white ml-4" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus-circle"></i> Tambah</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="tableAccount" class="table table-hover table-bordered text-nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>INSTANCE</th>
                                                    <th>PERUSAHAAN</th>
                                                    <th>ROUTER</th>
                                                    <th>USERNAME</th>
                                                    <th>PASSWORD</th>
                                                    <th>IP ADDRESS</th>
                                                    <th>EDIT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->

                        <div class="col-xl-12 mb-5">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3>VPN Firewall</h3>
                                </div>
                                <div id="example1_wrapper" class="m-1">
                                    <div class="row">
                                        <button type="button" class="btn btn-info text-white ml-4" data-toggle="modal" data-target="#modalAddFirewall"><i class="fas fa-plus-circle"></i> Tambah</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="tableDataFirewall" class="table table-hover table-bordered text-nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>INSTANCE</th>
                                                    <th>ROUTER</th>
                                                    <th>REMOTE ADDRESS</th>
                                                    <th>PROTOCOL</th>
                                                    <th>PORT TUJUAN</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer no-print text-white">
            &copy; 2020-2025 - <a href="https://rlradius.id" class="text-white">RLCLOUD MANAGER</a>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="/assets/plugins/toastr/toastr.min.js"></script>
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <script src="/assets/plugins/moment/moment.min.js"></script>
    <script src="/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
    <script src="/assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="/assets/plugins/jszip/jszip.min.js"></script>
    <script src="/assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="/assets/plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="/assets/js/adminlte.js"></script>

    <script>
        // Your JavaScript code here
    </script>
</body>
</html>