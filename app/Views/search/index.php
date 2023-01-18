<?=$this->extend('layout/default'); ?>

<?=$this->section('css') ;?>

<style>
	.dataTables_filter {
		margin-bottom:10px;
	}
</style>
<?=$this->endSection(); ?>

<?=$this->section('content'); ?>
<h1 class="h3 mb-3">Search</h1>
<div class="row">
	<div class="col-12">
		<div class="card card-default">
			
			<div class="card-body">
				<table class="table table-hover" id="gpTable">
					<thead class="bg-dark text-white">
						<th>ID</th>
						<th>DATE</th>
						<th>SUBJECT</th>
						<th>REQUEST</th>
						<th>CATEGORY</th>
						<th>BY</th>
						<th>TAG</th>
						<th>STATUS</th>
					</thead>
					<tbody>
						<?php foreach($search as $result):?>
							<tr>
								<td class=""><a href="<?=base_url('/view-request/'.$result->id);?>"><?=$result->id;?></a></td>
								<td><?=date_format(date_create($result->request_date),"m/d/Y");?></td>
								<td><?=$result->subject;?></td>
								<td><?=$result->description;?></td>
								<td><?=$result->category;?></td>
								<td><?=$result->addedby?></td>
								<td><?=$result->search_tag?></td>
								<td><?=set_status($result->status);?></td>
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