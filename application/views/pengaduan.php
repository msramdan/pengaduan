<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
	<meta charset="utf-8" />
	<title>Complaint App</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="<?= base_url() ?>temp/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>temp/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>temp/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>temp/assets/css/animate.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>temp/assets/css/style.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>temp/assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>temp/assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->

	<link href="<?= base_url() ?>temp/assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>temp/assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= base_url() ?>temp/assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>

<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-without-sidebar page-header-fixed page-with-top-menu">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> Complaint App</a>
					<button type="button" class="navbar-toggle" data-click="top-menu-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->

		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
		<?php if ($this->session->flashdata('message')) : ?>
		<?php endif; ?>

		<div class="flash-data2" data-flashdata2="<?= $this->session->flashdata('error'); ?>"></div>
		<?php if ($this->session->flashdata('error')) : ?>
		<?php endif; ?>

		<!-- begin #content -->
		<div id="content" class="content">
			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Form Pengaduan/Laporan</h4>
						</div>
						<div class="panel-body">

							<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
								<thead>
									<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
										<tr>
											<td>Kode Laporan <span style="color: red;">*</span> <?php echo form_error('kode_laporan') ?></td>
											<td><input type="text" readonly class="form-control" name="kode_laporan" id="kode_laporan" placeholder="Kode Laporan" value="<?php echo $kode; ?>" /></td>
										</tr>
										<tr>
											<td>Jenis Laporan<span style="color: red;">*</span> <?php echo form_error('jenis_laporan') ?></td>
											<td>
												<select name="jenis_laporan" class="form-control" id="jenis_laporan" required>
													<option value="" style="color:black">-- Pilih --</option>
													<option value="Aduan" style="color:black">Aduan</option>
													<option value="Keluhan" style="color:black">Keluhan</option>
													<option value="Saran" style="color:black">Saran</option>
												</select>
												<input style="margin-top: 7px;" id="nama_terlapor" autocomplete="off" type="text" class="form-control" name="nama_terlapor" id="nama_terlapor" placeholder="Nama Terlapor" value="<?php echo $nama_terlapor; ?>" />
											</td>
										</tr>
										<tr>
											<td>Nama Laporan<span style="color: red;">*</span> <?php echo form_error('nama_laporan') ?></td>
											<td><input autocomplete="off" required type="text" class="form-control" name="nama_laporan" id="nama_laporan" placeholder="Nama Laporan" value="<?php echo $nama_laporan; ?>" /></td>
										</tr>
										<tr>
											<td>Deskripsi<span style="color: red;">*</span> <?php echo form_error('deskripsi') ?></td>
											<td> <textarea autocomplete="off" required class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea></td>
										</tr>
										<tr>
											<td>Berkas Pendukung <?php echo form_error('photo') ?></td>
											<td><input type="file" class="form-control" name="photo" id="photo" onchange="return validasiEkstensi()" placeholder="Photo" value="<?php echo $photo; ?>" />
												<p style="color:red;">Note : berkas yang di ijinkan ( .jpg / .jpeg / .png / .pdf) </p>
											</td>
										</tr>
										<tr>
											<td><span style="color:red ;">* Wajib Di isi</span> </td>
											<td><input type="hidden" name="laporan_id" value="<?php echo $laporan_id; ?>" />
												<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>
											</td>
										</tr>
								</thead>
								</table>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Data Pengaduan/Laporan</h4>
						</div>
						<div class="panel-body">
							<table id="data-table" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Laporan</th>
										<th>Jenis Laporan</th>
										<th>Nama Laporan</th>
										<th>Tanggal</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody><?php $no = 1;
										foreach ($laporan_data as $laporan) {
										?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?php echo $laporan->kode_laporan ?></td>
											<td><?php echo $laporan->jenis_laporan ?></td>
											<td><?php echo $laporan->nama_laporan ?></td>
											<td><?php echo $laporan->tanggal ?></td>
											<td><?php echo $laporan->status ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	</div>

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= base_url() ?>temp/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="<?= base_url() ?>temp/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="<?= base_url() ?>temp/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="<?= base_url() ?>temp/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>temp/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?= base_url() ?>temp/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->



	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?= base_url() ?>temp/assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="<?= base_url() ?>temp/assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="<?= base_url() ?>temp/assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?= base_url() ?>temp/assets/js/table-manage-default.demo.min.js"></script>
	<script src="<?= base_url() ?>temp/assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script type="text/javascript" src="<?php echo base_url(); ?>temp/assets/js/sweetalert.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>temp/assets/js/sweetalert.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="<?= base_url(); ?>temp/assets/js/dataflash.js"></script>

	<script>
		$(function() {
			$('#nama_terlapor').hide();
			$('#jenis_laporan').change(function() {
				if ($('#jenis_laporan').val() == 'Aduan') {
					$('#nama_terlapor').show();
					$('#nama_terlapor').attr("required", true);
				} else {
					$('#nama_terlapor').hide();
					$('#nama_terlapor').removeAttr('required');
				}
			});
		});
	</script>

	<script>
		$(document).ready(function() {
			App.init();
			TableManageDefault.init();
		});
	</script>

	<script type="text/javascript">
		function validasiEkstensi() {
			var inputFile = document.getElementById('photo');
			var pathFile = inputFile.value;
			var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
			if (!ekstensiOk.exec(pathFile)) {
				alert('Silakan upload berkas yang memiliki ekstensi .jpg/.jpeg/.png/.pdf');
				inputFile.value = '';
				return false;
			} else {
				// Preview photo
				if (inputFile.files && inputFile.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						document.getElementById('preview').innerHTML = '<iframe src="' + e.target.result + '" style="height:400px; width:600px"/>';
					};
					reader.readAsDataURL(inputFile.files[0]);
				}
			}
		}
	</script>
</body>

</html>
