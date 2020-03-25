<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Samakita | Barang</title>
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
				<?php $this->load->view('include/sidebar_daftarbarang');?>
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
							<!-- <h1>Barang</h1> -->
						</div>

					</div>
				</div><!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h2 class="card-title">Daftar Barang</h2>
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
									aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">
													Data
													Barang
												</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="form-group">
													<div class="form-line">
														<?php echo form_open('Welcome/tambah_barang', array('class' => 'form-horizontal', 'autocomplete' => 'off')); ?>
														<div class="form-row">
															<!-- <div class="form-group col-md-6">
																						<label for="inputid">Id
																							Barang</label>
																						<input type="text"
																							class="form-control"
																							id="id_barang"
																							name="id_barang">
																					</div> -->
															<div class="form-group col-md-12">
																<label for="inputnama">Nama
																	Barang</label>
																<input type="text" class="form-control" id="nama_barang"
																	name="nama_barang">
															</div>
															<div class="form-group col-md-12">
																<label for="inputunit">Unit</label>
																<input type="text" class="form-control" id="unit"
																	name="unit">
															</div>
														</div>

														<div class="form-group">
															<label for="inputharga">Harga</label>
															<input type="text" class="form-control" id="harga"
																name="harga">
														</div>
														<button type="button" class="btn btn-secondary"
															data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary">submit</button>
														<?php echo form_close(); ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /.card-header -->
							<div class="card-body">

								<table id="example1" class="table table-bordered table-striped">
									<!-- Button trigger modal -->
									<button type="button" class="btn btn-primary mb-3" data-toggle="modal"
										data-target="#exampleModal">
										Tambah Barang
									</button>
									<thead>
										<tr>
											<th>Id Barang</th>
											<th>Nama Barang</th>
											<th>Unit</th>
											<th>Harga</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($data as $barang){?>
										<tr>
											<td><?php echo $barang['id_barang'];?></td>
											<td><?php echo $barang['nama_barang'];?></td>
											<td><?php echo $barang['unit'];?></td>
											<td><?php echo $barang['harga'];?></td>
											<td><a href="<?php echo base_url('Welcome/hapus_barang/').$barang['id_barang'];?>"
													class="mb-2 btn btn-outline-danger mr-2">
													<i class="fa fa-trash" aria-hidden="true"></i>
												</a>
												<a href="javascript:void(0);"
													class="editbtn mb-2 btn btn-outline-warning mr-2"
													data-toggle="tooltip" data-placement="bottom"
													data-id="<?php echo $barang['id_barang'];?>">
													<i class="fa fa-edit" aria-hidden="true"></i>
												</a>
											</td>
										</tr>
										<?php }?>
									</tbody>

								</table>
								<!-- Modaledit -->
								<div class="modal fade" id="modaledit" tabindex="-1" role="dialog"
									aria-labelledby="modaledit" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Data
													Barang
												</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="form-group">
													<div class="form-line">
														<?php echo form_open('Welcome/editbarang', array('class' => 'form-horizontal', 'autocomplete' => 'off')); ?>
														<div class="form-row">
															<div class="form-group col-md-6">
																<label for="inputid">Id
																	Barang</label>
																<input type="text" class="form-control" id="editid"
																	name="editid">
															</div>
															<div class="form-group col-md-6">
																<label for="inputunit">Unit</label>
																<input type="text" class="form-control" id="editunit"
																	name="editunit">
															</div>
														</div>
														<div class="form-group">
															<label for="inputnama">Nama
																Barang</label>
															<input type="text" class="form-control" id="editnama"
																name="editnama">
														</div>
														<div class="form-group">
															<label for="inputharga">Harga</label>
															<input type="text" class="form-control" id="editharga"
																name="editharga">
														</div>
														<button type="button" class="btn btn-secondary"
															data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary">submit</button>
														<?php echo form_close(); ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
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



		// Create & Edit Form
		$('#editModal form').on('submit', function (e) {
			let t = $(this);
			e.preventDefault();
			$.ajax({
				url: t.attr('action'),
				method: t.attr('method'),
				data: t.serialize(),
				success: (res) => {
					let resObj = JSON.parse(res);

					if (resObj.status === true) {
						swal({
							title: "Sukses!",
							text: resObj.message,

							type: "success",
							confirmButtonText: "OK",
							closeOnConfirm: false,
						}, function (isConfirm) {
							if (isConfirm) {
								location.reload();

							}
						});
					}
				},
				error: (err) => {

					if ($('#editModal form')) {
						$('#error2').html(
							`<div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        ${err.responseText}
                                    </div>`);
					}
				}
			})
		});


		//Edit Data
		$(document).on('click', '.editbtn', function () {
			var myId = $(this).data('id');
			$.ajax({
				type: "GET",
				url: "<?php echo base_url('Welcome/get')?>",
				dataType: "JSON",
				data: {
					id: myId
				},
				success: function (data) {
					$.each(data, function (id_barang, nama_barang, unit, harga) {
						$('#modaledit').modal('show');
						$('[name="editid"]').val(data.id_barang);
						$('[name="editnama"]').val(data.nama_barang);
						$('[name="editunit"]').val(data.unit);
						$('[name="editharga"]').val(data.harga);
					});
				}
			});
			return false;
		});

	</script>

</body>

</html>
