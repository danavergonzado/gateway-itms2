<?=$this->extend('layout/default'); ?>

<?=$this->section('css') ;?>

<style>
	.dataTables_filter {
		margin-bottom:10px;
	}
</style>
<?=$this->endSection(); ?>

<?=$this->section('content'); ?>
<h1 class="h3 mb-3">Gatepass</h1>
<div class="row">
	<div class="col-12">
		<div class="card card-default">
			
			<div class="card-body">
				<table class="table table-hover" id="gpTable">
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
						<?php foreach($gatepass as $pass):?>
							<tr>
								<td class=""><a href="<?=base_url('/view-request/'.$pass->id);?>"><?=$pass->id;?></a></td>
								<td><?=date_format(date_create($pass->request_date),"m/d/Y");?></td>
								<td><?=$pass->requestor;?></td>
								<td><?=$pass->description;?></td>
								<td><?=$pass->category;?></td>
								<td><?=$pass->search_tag?></td>
								<td><?=set_status($pass->status);?></td>
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
    	$('#gpTable').DataTable({
			"order": [ 0, "desc" ]
		});
	});
</script>

<?=$this->endSection(); ?>