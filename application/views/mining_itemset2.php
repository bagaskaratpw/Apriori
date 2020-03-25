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

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    Itemset 1
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="datatable1">
                                            <thead>
                                                <tr>
                                                    <th>Kode Item</th>
                                                    <th>Jumlah</th>
                                                    <th>Support</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($data_itemset1 as $di): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $di['atribut']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $di['jumlah']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $di['support'] ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    Itemset 1 Lolos
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="datatable1_">
                                            <thead>
                                                <tr>
                                                    <th>Kode Item</th>
                                                    <th>Jumlah</th>
                                                    <th>Support</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($data_itemset1_lolos as $di): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $di['atribut']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $di['jumlah']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $di['support'] ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    Itemset 2
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="datatable2">
                                            <thead>
                                                <tr>
                                                    <th>Kode Item (Atribut 1)</th>
                                                    <th>Kode Item (Atribut 2)</th>
                                                    <th>Jumlah</th>
                                                    <th>Support</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($data_itemset2 as $d2): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $d2['atribut1']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $d2['atribut2']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $d2['jumlah']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $d2['support'] ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    Itemset 2 Lolos
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="datatable2_">
                                            <thead>
                                                <tr>
                                                    <th>Kode Item (Atribut 1)</th>
                                                    <th>Kode Item (Atribut 2)</th>
                                                    <th>Jumlah</th>
                                                    <th>Support</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($data_itemset2_lolos as $d2_): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $d2_['atribut1']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $d2_['atribut2']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $d2_['jumlah']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $d2_['support'] ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
                $('#datatable1').DataTable();
                $('#datatable1_').DataTable();
                $('#datatable2').DataTable();
                $('#datatable2_').DataTable();
            });
        </script>

</body>

</html>