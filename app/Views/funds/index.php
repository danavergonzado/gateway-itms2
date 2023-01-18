<?=$this->extend('layout/default'); ?>

<?=$this->section('css') ;?>

<style>
	.dataTables_filter {
		margin-bottom:10px;
	}
</style>
<?=$this->endSection(); ?>

<?=$this->section('content'); ?>
<h1 class="h3 mb-3">Funds</h1>
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
						<?php foreach($funds as $fund):?>
							<tr>
								<td class=""><a href="<?=base_url('/view-request/'.$fund->id);?>"><?=$fund->id;?></a></td>
								<td><?=date_format(date_create($fund->request_date),"m/d/Y");?></td>
								<td><?=$fund->requestor;?></td>
								<td><?=$fund->description;?></td>
								<td><?=$fund->category;?></td>
								<td><?=$fund->search_tag?></td>
								<td><?=set_status($fund->status);?></td>
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