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
		<h1 class="h3 mb-3">Company Asset</h1>
	</div>

	<div class="px-2">
		<a class="btn btn-md btn-success align-middle" id="submit" href="<?=base_url('/add-asset');?>"><i class="align-middle" data-feather="file-plus"></i> New Asset</a>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-default">
			
			<div class="card-body">
                <div style="overflow:auto; scroll:bottom">
                <table class="table table-hover" id="myTable">
                    <thead class="bg-dark text-white">
                        <th>#</th>
                        <th>SERIAL #</th>
                        <th>MODEL</th>
                        <th>DESCRIPTION</th>
                        <th>REMARKS</th>
                        <th>ALLOCATED</th>
                        <th>STATUS</th>
                    </thead>
                    <tbody>
                    <?php foreach($assets as $asset):?>
							<tr> 
                                 <td class=""><a href="<?=base_url('/view-asset/'.$asset->id);?>"><?=$asset->id;?></a></td>
								<td class=""><?=$asset->asset_no;?></a></td>
								<td><?=$asset->model_no;?></td>
								<td><?=$asset->description;?></td>
                                <td><?=$asset->remarks;?></td>
								<td><?=$asset->branch;?></td>
								<td><?=set_status($asset->operational_status);?></td>
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
            $('#myTable').DataTable({
			"order": [ 0, "desc" ]
		});
        });
    </script>
<?=$this->endSection(); ?>