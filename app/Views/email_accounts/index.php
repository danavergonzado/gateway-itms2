<?=$this->extend('layout/default'); ?>

<?=$this->section('css') ;?>

<style>
	.dataTables_filter {
		margin-bottom:10px;
	}
</style>
<?=$this->endSection(); ?>

<?=$this->section('content'); ?>
<h1 class="h3 mb-3">Email Accounts</h1>
<div class="row">
	<div class="col-12">
		<div class="card card-default">
			
			<div class="card-body">
				<table class="table table-hover" id="eaTable">
					<thead class="bg-dark text-white">
						<th>ID</th>
						<th>DATE</th>
						<th>BY</th>
						<th>REQUEST</th>
						<th>CATEGORY</th>
						<th>TAG</th>
						<th>STATUS</th>
					</thead>
					<tbody>
						<?php foreach($email_accounts as $email_account):?>
							<tr>
								<td class=""><a href="<?=base_url('/view-request/'.$email_account->id);?>"><?=$email_account->id;?></a></td>
								<td><?=date_format(date_create($email_account->request_date),"m/d/Y");?></td>
								<td><?=$email_account->requestor;?></td>
								<td><?=$email_account->description;?></td>
								<td><?=$email_account->category;?></td>
								<td><?=$email_account->search_tag?></td>
								<td><?=set_status($email_account->status);?></td>
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