<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Dashboard</a></li>
		<li class="active">Laporan</li>
	</ol>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Data Laporan</h4>
				</div>
				<div class="panel-body">
					<table id="data-table-default" class="table table-hover table-bordered table-td-valign-middle">
						<tr>
							<td>Kode Laporan</td>
							<td><?php echo $kode_laporan; ?></td>
						</tr>
						<tr>
							<td>Jenis Laporan</td>
							<td><?php echo $jenis_laporan; ?></td>
						</tr>
						<tr>
							<td>Nama Terlapor</td>
							<td><?php echo $nama_terlapor; ?></td>
						</tr>
						<tr>
							<td>Nama Laporan</td>
							<td><?php echo $nama_laporan; ?></td>
						</tr>
						<tr>
							<td>Tanggal</td>
							<td><?php echo $tanggal; ?></td>
						</tr>
						<tr>
							<td>Deskripsi</td>
							<td><?php echo $deskripsi; ?></td>
						</tr>
						<tr>
							<td>Photo</td>
							<td> <img src="<?= base_url() ?>temp/assets/berkas/<?= $photo ?>" alt="" width="450px" height="auto"> </td>
						</tr>
						<tr>
							<td>Status</td>
							<td><?php echo $status; ?></td>
						</tr>
						<tr>
							<td></td>
							<td><a href="<?php echo site_url('laporan') ?>" class="btn btn-default">Cancel</a></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
