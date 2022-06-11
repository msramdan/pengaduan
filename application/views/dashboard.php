<div id="content" class="content">
	<!-- begin row -->
	<div class="row">
		<!-- begin col-3 -->
		<div class="col-md-3 col-sm-6">
			<div class="widget widget-stats bg-green">
				<div class="stats-icon"><i class="fa fa-desktop"></i></div>
				<div class="stats-info">
					<h4>DATA IN REVIEW</h4>
					<?php
					$review = $this->db->get_where('laporan', array('status' => 'In Review'))->num_rows();
					?>
					<p><?= $review ?></p>
				</div>
				<div class="stats-link">
					<a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
				</div>
			</div>
		</div>
		<!-- end col-3 -->
		<!-- begin col-3 -->
		<div class="col-md-3 col-sm-6">
			<div class="widget widget-stats bg-blue">
				<div class="stats-icon"><i class="fa fa-chain-broken"></i></div>
				<div class="stats-info">
					<h4>DATA PROCESS</h4>
					<?php
					$process = $this->db->get_where('laporan', array('status' => 'Process'))->num_rows();
					?>
					<p><?= $process ?></p>
				</div>
				<div class="stats-link">
					<a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
				</div>
			</div>
		</div>
		<!-- end col-3 -->
		<!-- begin col-3 -->
		<div class="col-md-3 col-sm-6">
			<div class="widget widget-stats bg-purple">
				<div class="stats-icon"><i class="fa fa-users"></i></div>
				<div class="stats-info">
					<h4>DATA DECLINE</h4>
					<?php
					$decline = $this->db->get_where('laporan', array('status' => 'Decline'))->num_rows();
					?>
					<p><?= $decline ?></p>
				</div>
				<div class="stats-link">
					<a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
				</div>
			</div>
		</div>
		<!-- end col-3 -->
		<!-- begin col-3 -->
		<div class="col-md-3 col-sm-6">
			<div class="widget widget-stats bg-red">
				<div class="stats-icon"><i class="fa fa-clock-o"></i></div>
				<div class="stats-info">
					<h4>DATA USER</h4>
					<?php
					$user = $this->db->get('user')->num_rows();
					?>
					<p><?= $user ?></p>
					</p>
				</div>
				<div class="stats-link">
					<?php if ($this->fungsi->user_login()->level_id == 2) { ?>
						<a href="<?= base_url() ?>user">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
					<?php }else{ ?>
						<a href="">Akses Super Admin <i class="fa fa-arrow-circle-o-right"></i></a>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- end col-3 -->
	</div>
</div>
