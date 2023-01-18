<?=$this->extend('layout/default'); ?>

<?=$this->section('css') ;?>

<style>
	.dataTables_filter {
		margin-bottom:10px;
	}
</style>
<?=$this->endSection(); ?>

<?=$this->section('content'); ?>
<h1 class="h3 mb-3">Official Business Pass</h1>
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
						<?php foreach($ob_pass as $ob):?>
							<tr>
								<td class=""><a href="<?=base_url('/view-request/'.$ob->id);?>"><?=$ob->id;?></a></td>
								<td><?=date_format(date_create($ob->request_date),"m/d/Y");?></td>
								<td><?=$ob->requestor;?></td>
								<td><?=$ob->description;?></td>
								<td><?=$ob->category;?></td>
								<td><?=$ob->search_tag?></td>
								<td><?=set_status($ob->status);?></td>
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