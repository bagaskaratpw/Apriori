<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | DataTables</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('include/css');?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    <div class="info">
                        <h4><a href="#" class="d-block">Samakita Stationery</a></h4>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <?php $this->load->view('include/sidebar_proses');?>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Apriori</h1>
                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    Itemset 1
                                </div>

                                <form action="<?php echo base_url('mining/proses_itemset1'); ?>" method="POST">
                                    <input type="hidden" name="min_sup" value="<?php echo $_GET['min_sup'] ?>">
                                    <input type="hidden" name="min_conf" value="<?php echo $_GET['min_conf'] ?>">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Kode Item</th>
                                                        <th>Nama Item</th>
                                                        <th>Jumlah</th>
                                                        <th>Support</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($jumlah_apriori as $ja): ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $ja['items']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $ja['nama_barang']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $ja['jumlah_items']; ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $support    = $ja['jumlah_items']/$jumlah_transaksi['total']*100;
                                                            echo round($support, 2);
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Proses</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.2
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php $this->load->view('include/js');?>
        <!-- page script -->
        <script>
            $(function() {
                $('#datatable').DataTable();
            });
        </script>

</body>

</html>