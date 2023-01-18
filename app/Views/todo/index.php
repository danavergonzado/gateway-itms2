<?=$this->extend('layout/default'); ?>

<?=$this->section('css') ;?>

<style>
	.dataTables_filter {
		margin-bottom:10px;
	}
</style>
<?=$this->endSection(); ?>

<?=$this->section('content'); ?>
<h1 class="h3 mb-3">Todo List</h1>
<div class="row">
	<div class="col-12">
		<div class="card card-default">
			
			<div class="card-body">
				<table class="table table-hover" id="gpTable">
					<thead class="bg-dark text-white">
						<th>ID</th>
						<th>DATE</th>
						<th>TO DO</th>
						<th>STATUS</th>
					</thead>
					<tbody>
						<?php foreach($todos as $todo):?>
							<tr>
								<td class=""><a href="<?=base_url('/view-todo/'.$todo->id);?>"><?=$todo->id;?></a></td>
								<td><?=date_format(date_create($todo->created_at),"m/d/Y");?></td>
								<td><?=$todo->todo;?></td>
                                <td><?=$todo->status;?></td>
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
    	$('#gpTable').DataTable();
	});
</script>

<?=$this->endSection(); ?>