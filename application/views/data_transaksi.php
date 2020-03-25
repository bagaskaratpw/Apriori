<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Samakita | Transaksi</title>
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
				<?php $this->load->view('include/sidebar_transaksi');?>
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
							<h1>Transaksi</h1>
						</div>

					</div>
				</div><!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="row">

					<div class="col-md-4">

						<!-- SELECT2 EXAMPLE -->
						<div class="card card-default">
							<div class="card-header">
								<h3 class="card-title">Input Transaksi</h3>

								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i
											class="fas fa-minus"></i></button>
									<button type="button" class="btn btn-tool" data-card-widget="remove"><i
											class="fas fa-remove"></i></button>
								</div>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<div class="form-group">
									<div class="form-line">
										<!-- <form action="" enctype="multipart/form-data"></form> -->
										<?php echo form_open_multipart('transaksi/tambah_checkout'); ?>
										<div class="form-row">
											<!-- <div class="form-group col-md-6">
													<label for="inputid"> No. Invoice</label>
													<input type="text" class="form-control" id="id_barang"
														name="id_barang">
												</div> -->
											<div class="form-group col-md-12">
												<label for="inputunit">Invoice Date</label>
												<input class="form-control" class='date' type="date" name="date"
													value="<?php echo date('Y-m-d'); ?>" required>
											</div>
										</div>
										<div class="form-group">
											<label>Barang</label>
											<select name="barang" id="barang" class="form-control select2" required>
												<option value="">Pilih Barang</option>
												<?php
													foreach($kode as $kode)
													{
													echo '<option value="'.$kode['id_barang'].'">'.$kode['id_barang']." - ".$kode['nama_barang'].'</option>';
													}
													?>
											</select>
										</div>
										<input type="hidden" id="nama_barang" name="nama_barang">
										<div class="form-group">
											<div class="row">
												<div class="col-md-4">
													<label>Unit</label>
													<input type="type" class="form-control" id="unit" name="unit"
														readonly>
												</div>
												<div class="col-md-8">
													<label>Harga</label>
													<input type="text" class="form-control" id="harga" name="harga"
														readonly>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label>Banyak</label>
											<input type="number" name="quantity" id="" value="1"
												class="quantity form-control" required>
										</div>
										<button type="submit" class="btn btn-primary">ADD</button>
										<?php echo form_close(); ?>
									</div>
								</div>
							</div>
							<!-- /.card-body -->

						</div>
						<!-- /.card -->
					</div>
					<div class="col-md-8">
						<!-- SELECT2 EXAMPLE -->
						<div class="card card-default">
							<div class="card-header">
								<h3 class="card-title">Daftar Belanja</h3>

								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i
											class="fas fa-minus"></i></button>
									<button type="button" class="btn btn-tool" data-card-widget="remove"><i
											class="fas fa-remove"></i></button>
								</div>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<form class="form-label-left input_mask"
									action="<?php echo base_url('transaksi/tambah_transaksi') ?>" method="POST">

									<table class="table table-bordered">
										<thead>
											<tr>
												<th style="align-center">Id Barang</th>
												<th>Nama Barang</th>
												<th>unit</th>
												<th>Harga</th>
												<th>Banyak</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($data_checkout as $c): ?>
											<input type="hidden" name="c_tgl_trans"
												value="<?php echo $c['tgl_trans']; ?>">
											<tr>
												<td>
													<?php echo $c['kode_item']; ?>
													<input type="hidden" name="c_kode_item[]"
														value="<?php echo $c['kode_item']; ?>">
												</td>
												<td>
													<?php echo $c['nama_barang']; ?>
													<input type="hidden" name="c_nama_barang[]"
														value="<?php echo $c['nama_barang']; ?>">
												</td>
												<td>
													<?php echo $c['unit']; ?>
													<input type="hidden" name="c_unit[]"
														value="<?php echo $c['unit']; ?>">
												</td>
												<td>
													Rp. <?php echo number_format($c['amount'],2,',','.'); ?>
													<input type="hidden" name="c_amount[]"
														value="<?php echo $c['amount']; ?>">
												</td>
												<td>
													<?php echo $c['quantity']; ?>
													<input type="hidden" name="c_quantity[]"
														value="<?php echo $c['quantity']; ?>">
												</td>
												<td>
													<a href="<?php echo base_url('transaksi/hapus_keranjang/').$c['id'];?>"
														class="mb-2 btn btn-outline-danger mr-2">
														<i class="fa fa-trash" aria-hidden="true"></i>
												</td>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
									<button type="submit" class="btn btn-primary">Checkout</button>
								</form>
								<!-- /.card-body -->

							</div>
							<!-- /.card -->

						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h2 class="card-title">Daftar Transaksi</h2>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<!-- Modal detail -->
								<div class="modal fade" id="modaldetail">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<?php echo form_open('Welcome/detail_trans', array('class' => 'form- horizontal', 'autocomplete' => 'off') );?>
											<div class="modal-header">
												<h5 class="modal-title">Detail Transaksi
												</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<table class="table table-striped table-bordered" style="width:100%">
													<thead>
														<tr>
															<th>#</th>
															<th>No Invocie</th>
															<th>Kode Item</th>
															<th>Nama Barang</th>
															<th>Unit</th>
															<th>Harga</th>
															<th>Jumlah Beli</th>
															<th>Total Harga</th>
														</tr>
													</thead>
													<tbody id="table_detail">
														<tr>
															<td></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary"
													data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<table id="example1" class="table table-bordered table-striped">
									<!-- Button trigger modal -->



									<thead>
										<tr>
											<th style="text-align : center; ">NO. Invoice
											</th>
											<th style="text-align : center;">Invoice Date
											</th>
											<th>Detail</th>
										</tr>
									</thead>

									<tbody>
										<?php foreach($trans as $data) {?>
										<tr>
											<td>
												<?php echo $data['no_inv'];?>
											</td>
											<td>
												<?php echo $data['tgl_trans'];?>
											</td>
											<td>
												<a href="<?php echo base_url('transaksi/hapus_transaksi/').$data['no_inv'];?>"
													class="mb-2 btn btn-outline-danger mr-2">
													<i class="fa fa-trash" aria-hidden="true"></i>
												</a>
												<button type="button"
													class="btn btn-outline-primary mr-2 mb-2 btn_detail" id="btn_detail"
													data-id="<?php echo $data['no_inv']; ?>">
													<i class="fa fa-info" aria-hidden="true"></i>
												</button>

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
				<!-- /.row -->
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



		$(function () {
			$(".select2").select2();
			// $("#datepicker").datepicker({
			// 	autoclose: true,
			// });
		});
		$("#barang").change(function () {
			$.getJSON('<?php echo base_url("Welcome/ajax_kode/"); ?>' + $(this).val())
				.then(res => {
					$("#nama_barang").val(res.nama_barang);
					$("#harga").val(res.harga);
					$("#unit").val(res.unit);
				});
		});
		$('#example1').on('click', '#btn_detail', function () {
			var no_inv = $(this).data('id');
			$.ajax({
				url: '../transaksi/coba',
				type: 'GET',
				data: {
					no_inv: no_inv
				},
				dataType: 'JSON',
				success: (res) => {
					console.log(res);
					$('#modaldetail').modal('show');
					var html = '';
					var i, no = 1;
					for (i = 0; i < res.length; i++) {
						html += '<tr>' +
							'<td>' + no++ + '</td>' +
							'<td>' + res[i].no_inv + '</td>' +
							'<td>' + res[i].kode_item + '</td>' +
							'<td>' + res[i].nama_barang + '</td>' +
							'<td>' + res[i].unit + '</td>' +
							'<td>' + res[i].harga + '</td>' +
							'<td>' + res[i].quantity + '</td>' +
							'<td>' + res[i].amount + '</td>' +
							'</tr>';
					}
					$('#table_detail').html(html);
				},
				error: (err) => {

				}
			});
		});;

	</script>

</body>

</html>
