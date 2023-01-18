<?=$this->extend('layout/default'); ?>

<?=$this->section('css') ;?>

<style>
	.dataTables_filter {
		margin-bottom:10px;
	}
</style>
<?=$this->endSection(); ?>

<?=$this->section('content'); ?>

<div class="px-2 d-flex">
	<div class="flex-grow-1 ">
		<h1 class="h3 mb-3">Active Task</h1>
	</div>

	<div class="px-2">
		<a class="btn btn-md btn-success align-middle" id="submit" href="<?=base_url('/add-request');?>"><i class="align-middle" data-feather="file-plus"></i> Add Task</a>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card card-default">
			<div class="card-body">
				<div style="overflow:auto; scroll:bottom">
					<table class="table table-hover" id="rqTable">
						<thead class="bg-dark text-white">
							<th>ID</th>
							<th>DATE</th>
							<th>BY</th>
							<th>SUBJECT</th>
							<th>REQUEST</th>
							<th>CATEGORY</th>
							<th>TAG</th>
							<th>STATUS</th>
						</thead>
						<tbody>
							<?php foreach($tasks as $task):?>
								<tr>
									<td class=""><a href="<?=base_url('/view-request/'.$task->id);?>"><?=$task->id;?></a></td>
									<td><?=date_format(date_create($task->request_date),"m/d/Y");?></td>
									<td><?=$task->requestor;?></td>
									<td><?=$task->subject;?></td>
									<td><?=$task->description;?></td>
									<td><?=$task->category;?></td>
									<td><?=$task->search_tag?></td>
									<td><?=set_status($task->status);?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?=$this->endSection(); ?>

<?=$this->section('js'); ?>
<script>
	$(document).ready( function () {
    	$('#rqTable').DataTable({
			"order": [ 0, "desc" ]
		});
	});
</script>

<?=$this->endSection(); ?>