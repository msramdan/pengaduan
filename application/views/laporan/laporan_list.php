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
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="box-body">
									<div class='row'>
										<div class='col-md-9'>
										</div>
									</div>
									<div class="box-body" style="overflow-x: scroll; ">
										<table id="data-table" class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>No</th>
													<th>Kode Laporan</th>
													<th>Jenis Laporan</th>
													<th>Nama Laporan</th>
													<th>Tanggal</th>
													<th>Status</th>
													<th>Action</th>
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
														<td style="width: 210px;">
															<?php
															echo anchor(site_url('laporan/read/' . encrypt_url($laporan->laporan_id)), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-success btn-sm read_data"'); ?>
															<?php if ($laporan->status == "In Review") { ?>
																<a href="<?php base_url() ?>laporan/approved/<?= $laporan->laporan_id ?>" id="" class="btn btn-sm btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Approved</a>
																<a href="<?php base_url() ?>laporan/reject/<?= $laporan->laporan_id ?>" id="" class="btn btn-sm btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Reject</a>
															<?php } else { ?>
																<button type="button" class="btn btn-sm btn-primary" disabled><i class="fa fa-check" aria-hidden="true"></i> Approved</button>
																<button type="button" class="btn btn-sm btn-danger" disabled><i class="fa fa-times" aria-hidden="true"></i> Reject</button>
															<?php } ?>
														</td>
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
			</div>
