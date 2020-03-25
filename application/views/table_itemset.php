<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Samakita | Proses Apriori</title>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Itemset 1</h2>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Kode Items</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Items</th>
                                            <th>Perhitungan Nilai Support</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($total_items as $item1) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $item1['items'];?>
                                                </td>
                                                <td>
                                                    <?php echo $item1['nama_barang'];?>
                                                </td>
                                                <td>
                                                    <?php echo $item1['jumlah_items'];?>
                                                </td>
                                                <th>
                                                    <?php
													$hitung = $item1['jumlah_items'] / $total_transaksi['total'] * 100;
													echo $item1['jumlah_items']. " / ". $total_transaksi['total']. " * 100% = ". round($hitung, 2)." %";
													?>
                                                </th>
                                            </tr>
                                            <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>

				<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Itemset 2</h2>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Kode Items</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Items</th>
                                            <th>Perhitungan Nilai Support</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($total_items as $item1) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $item1['items'];?>
                                                </td>
                                                <td>
                                                    <?php echo $item1['nama_barang'];?>
                                                </td>
                                                <td>
                                                    <?php echo $item1['jumlah_items'];?>
                                                </td>
                                                <th>
                                                <?php
													$hitung = $item1['jumlah_items'] / $total_transaksi['total'] * 100;
													echo $item1['jumlah_items']. " / ". $total_transaksi['total']. " * 100% = ". round($hitung, 2)." %";
													?>
                                                </th>
                                                <td>
                                                    
                                                </td>
                                            </tr>
                                            <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>

				<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Itemset 3</h2>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example3" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Kode Items</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Items</th>
                                            <th>Perhitungan Nilai Support</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($total_items as $item1) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $item1['items'];?>
                                                </td>
                                                <td>
                                                    <?php echo $item1['nama_barang'];?>
                                                </td>
                                                <td>
                                                    <?php echo $item1['jumlah_items'];?>
                                                </td>
                                                <th>
                                                <?php
													$hitung = $item1['jumlah_items'] / $total_transaksi['total'] * 100;
													echo $item1['jumlah_items']. " / ". $total_transaksi['total']. " * 100% = ". round($hitung, 2)." %";
													?>
                                                </th>
                                            </tr>
                                            <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
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
            $(document).ready(function() {
                $('#example1').DataTable({
					// dom: 'Bfrtip',
					// buttons: [
					// 	'copy', 'csv', 'excel', 'pdf', 'print'
					// ]
				});
                $('#example2').DataTable();
                $('#example3').DataTable();
            });
        </script>

</body>

</html>