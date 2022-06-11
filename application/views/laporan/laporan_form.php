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
					<h4 class="panel-title">Data LAPORAN</h4>
				</div>
				<div class="panel-body">

					<form action="<?php echo $action; ?>" method="post">
						<thead>
							<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
								<tr>
									<td>Kode Laporan <?php echo form_error('kode_laporan') ?></td>
									<td><input type="text" class="form-control" name="kode_laporan" id="kode_laporan" placeholder="Kode Laporan" value="<?php echo $kode_laporan; ?>" /></td>
								</tr>
								<tr>
									<td>Jenis Laporan <?php echo form_error('jenis_laporan') ?></td>
									<td><input type="text" class="form-control" name="jenis_laporan" id="jenis_laporan" placeholder="Jenis Laporan" value="<?php echo $jenis_laporan; ?>" /></td>
								</tr>
								<tr>
									<td>Nama Laporan <?php echo form_error('nama_laporan') ?></td>
									<td><input type="text" class="form-control" name="nama_laporan" id="nama_laporan" placeholder="Nama Laporan" value="<?php echo $nama_laporan; ?>" /></td>
								</tr>
								<tr>
									<td>Tanggal <?php echo form_error('tanggal') ?></td>
									<td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td>
								</tr>

								<tr>
									<td>Deskripsi <?php echo form_error('deskripsi') ?></td>
									<td> <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea></td>
								</tr>
								<tr>
									<td>Photo <?php echo form_error('photo') ?></td>
									<td><input type="text" class="form-control" name="photo" id="photo" placeholder="Photo" value="<?php echo $photo; ?>" /></td>
								</tr>
								<tr>
									<td>Status <?php echo form_error('status') ?></td>
									<td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="hidden" name="laporan_id" value="<?php echo $laporan_id; ?>" />
										<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>
										<a href="<?php echo site_url('laporan') ?>" class="btn btn-info"><i class="fa fa-undo"></i> Kembali</a>
									</td>
								</tr>
						</thead>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
