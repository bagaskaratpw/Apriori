<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Samakita | Proses Apriori</title>
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
				</div><!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card card-primary">
								<div class="card-header">
									<h3 class="card-title">Minimum Support dan Confidence</h3>
								</div>
								<!-- /.card-header -->
								<!-- form start -->
								<form action="<?php echo base_url('minings/mining_process'); ?>" method="GET" role="form">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6 col-sm-6 form-group">
												<label for="exampleInputEmail1">Minimum Support</label>
												<input type="text" class="form-control" id="min_sup" name="min_sup" placeholder="Minimum Support">
											</div>
											<div class="col-md-6 col-sm-6 form-group">
												<label for="exampleInputPassword1">Minimum Confidence</label>
												<input type="text" class="form-control" id="min_conf" name="min_conf" placeholder="Minimum Confidence">
											</div>
										</div>
									</div>
									<!-- /.card-body -->

									<div class="card-footer">
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
								</form>
							</div>
							<!-- /.card -->
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h2 class="card-title">Data</h2>
									<a href="<?php echo base_url('welcome/update_data_apriori') ?>" class="float-right badge badge-success">Update Data</a>
								</div>
								<!-- /.card-header -->
								<div class="card-body">

									<table id="example1" class="table table-bordered table-striped">

										<thead>
											<tr>
												<th>#</th>
												<th>No Inv</th>
												<th>Items</th>
												<th>Nama Barang</th>
											</tr>
										</thead>

										<tbody>
											<?php $no=1; foreach($data as $trans) {?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td> <?php echo $trans['no_inv'];?></td>
												<td> <?php echo $trans['items'];?></td>
												<td> <?php echo $trans['nama_barang'];?></td>
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
					<!-- /.row -->
				</div>

			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				<b>Version</b> 3.0.2
			</div>
			<strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
			reserved.
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
		$(function () {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});

	</script>

</body>

</html>
