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
		<h1 class="h3 mb-3">Active Request</h1>
	</div>

	<div class="px-2">
		<a class="btn btn-md btn-success align-middle" id="submit" href="<?=base_url('/add-request');?>"><i class="align-middle" data-feather="file-plus"></i> New Request</a>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card card-default">
			<div class="card-body">
				<table class="table table-hover" id="rqTable">
					<thead class="bg-dark text-white">
						<th>ID</th>
						<th>DATE</th>
						<th>BY</th>
						<th>DESCRIPTION</th>
						<th>ENCODED BY</th>
						<th>TAG</th>
						<th>STATUS</th>
					</thead>
					<tbody>
						<?php foreach($requests as $request):?>
							
							<tr>
								<td class=""><a href="<?=base_url('/view-request/'.$request->id);?>"><?=$request->id;?></a></td>
								<td><?=date_format(date_create($request->request_date),"m/d/Y");?></td>
								<td><?=$request->requestor;?></td>
								<td><?=$request->description;?></td>
								<td><?=$request->addedby;?></td>
								<td><?=$request->search_tag?></td>
								<td><?=set_status($request->status);?></td>
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
    	var table = $('#rqTable').DataTable({
			"order": [ 0, "desc" ]
		});

		//('#rqTable tbody').on('click', 'tr', function () {
        //var data = table.row(this).data();
		//alert('You clicked on ' + data[0] + "'s row");
        //window.location.href = "";
	});
</script>

<?=$this->endSection(); ?>