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

                    <!-- Itemset 1 -->
                    <div class="row">
                        <!-- Awal -->
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
                                                <?php foreach($itemset1 as $i1): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $i1['atribut']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $i1['jumlah']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $i1['support'] ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Awal -->

                        <!-- Lolos -->
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    Itemset 1 Lolos
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="datatable2">
                                            <thead>
                                                <tr>
                                                    <th>Kode Item</th>
                                                    <th>Jumlah</th>
                                                    <th>Support</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($itemset1_lolos as $i1_lolos): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $i1_lolos['atribut']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $i1_lolos['jumlah']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $i1_lolos['support'] ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Lolos -->
                    </div>
                    <!-- Itemset 1 -->

                    <!-- Itemset 2 -->
                    <div class="row">
                        <!-- Awal -->
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    Itemset 2
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="datatable3">
                                            <thead>
                                                <tr>
                                                    <th>Atribut 1</th>
                                                    <th>Atribut 2</th>
                                                    <th>Jumlah</th>
                                                    <th>Support</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($itemset2 as $i2): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $i2['atribut1']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $i2['atribut2']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $i2['jumlah']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $i2['support'] ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Awal -->

                        <!-- Lolos -->
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    Itemset 2 Lolos
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="datatable4">
                                            <thead>
                                                <tr>
                                                    <th>Atribut 1</th>
                                                    <th>Atribut 2</th>
                                                    <th>Jumlah</th>
                                                    <th>Support</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($itemset2_lolos as $i2_lolos): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $i2_lolos['atribut1']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $i2_lolos['atribut2']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $i2_lolos['jumlah']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $i2_lolos['support'] ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Lolos -->
                    </div>
                    <!-- Itemset 2 -->

                    <!-- Itemset 3 -->
                    <div class="row">
                        <!-- Awal -->
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    Itemset 3
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="datatable3">
                                            <thead>
                                                <tr>
                                                    <th>Atribut 1</th>
                                                    <th>Atribut 2</th>
                                                    <th>Atribut 3</th>
                                                    <th>Jumlah</th>
                                                    <th>Support</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($itemset3 as $i3): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $i3['atribut1']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $i3['atribut2']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $i3['atribut3']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $i3['jumlah']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $i3['support'] ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Awal -->

                        <!-- Lolos -->
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    Itemset 3 Lolos
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="datatable4">
                                            <thead>
                                                <tr>
                                                    <th>Atribut 1</th>
                                                    <th>Atribut 2</th>
                                                    <th>Atribut 3</th>
                                                    <th>Jumlah</th>
                                                    <th>Support</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($itemset3_lolos as $i3_lolos): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $i3_lolos['atribut1']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $i3_lolos['atribut2']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $i3_lolos['atribut3']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $i3_lolos['jumlah']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $i3_lolos['support'] ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Lolos -->
                    </div>
                    <!-- Itemset 3 -->

                    <!-- Confidence -->
                    <div class="row">
                        <!-- Confidence 2 -->
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    Confidence Itemset 2
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="datatable6">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Confidence</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($confidence2 as $c2): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $c2['kombinasi1'] ?> => <?php echo $c2['kombinasi2']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $c2['confidence']; ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Confidence 2 -->

                        <!-- Confidence 3 -->
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    Confidence Itemset 3
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="datatable6">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Confidence</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($confidence3 as $c3): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $c3['kombinasi1'] ?> => <?php echo $c3['kombinasi2']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $c3['confidence']; ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Confidence 3 -->

                        <!-- Rule Hasil -->
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    Rule Asosiasi
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="datatable7">
                                            <thead>
                                                <tr>
                                                    <th>X => Y</th>
                                                    <th>Confidence</th>
                                                    <th>Hasil Rule</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($confidence_lolos as $c_lolos): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $c_lolos['kombinasi1'] ?> => <?php echo $c_lolos['kombinasi2']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo round($c_lolos['confidence']); ?> %
                                                    </td>
                                                    <td>
                                                        <?php echo ucwords($c_lolos['korelasi_rule']); ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Rule Hasil -->
                    </div>
                    <!-- Confidence -->

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
                $('#datatable2').DataTable();
                $('#datatable3').DataTable();
                $('#datatable4').DataTable();
                $('#datatable5').DataTable();
                $('#datatable6').DataTable();
                $('#datatable7').DataTable();
            });
        </script>

</body>

</html>