<?=$this->extend('layout/default'); ?>

<?=$this->section('css') ;?>

<style>
	.dataTables_filter {
		margin-bottom:10px;
	}
</style>
<?=$this->endSection(); ?>

<?=$this->section('content'); ?>
<h1 class="h3 mb-3">Internet Accounts</h1>
<div class="row">
	<div class="col-12">
		<div class="card card-default">
			
			<div class="card-body">
				<table class="table table-hover" id="eaTable">
					<thead class="bg-dark text-white">
						<th>ID</th>
						<th>NO</th>
						<th>NAME</th>
						<th>TYPE</th>
						<th>PROVIDER</th>
						<th>BRANCH</th>
						<th>CIRCUIT #</th>
						<th>ACTION</th>
					</thead>
					<tbody>
						<?php foreach($internet_accounts as $internet_account):?>
							<tr>
								<td><?=$internet_account->id;?></td>
								<td><?=$internet_account->no;?></td>
								<td><?=$internet_account->name;?></td>
								<td><?=$internet_account->type;?></td>
								<td><?=$internet_account->provider;?></td>
								<td><?=$internet_account->branch;?></td>
								<td><?=$internet_account->circuit_no;?></td>
								<td>&nbsp;&nbsp;&nbsp;<a href="<?=base_url('/view-internet-account/'.$internet_account->id);?>"><i class="align-middle" data-feather="eye" data-toggle="tooltip" title="Public"></i></a> &nbsp;  <a href=""><i class="align-middle" data-feather="edit" data-toggle="tooltip" title="Update"></i></a></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?=$this->endSection(); ?>

<?=$this->section('js'); ?>
<script>
	$(document).ready( function () {
    	$('#eaTable').DataTable({
			"order": [ 0, "desc" ]
		});
	});
</script>

<?=$this->endSection(); ?>