<?=$this->extend('layout/default'); ?>

<?=$this->section('css') ;?>

<style>
	.dataTables_filter {
		margin-bottom:10px;
	}
</style>
<?=$this->endSection(); ?>

<?=$this->section('content'); ?>
<h1 class="h3 mb-3">My Asset</h1>
<div class="row">
	<div class="col-12">
		<div class="card card-default">
			
			<div class="card-body">
                <div style="overflow:auto; scroll:bottom">
                <table class="table table-hover" id="myTable">
                    <thead class="bg-dark text-white">
                        <th>CODE</th>
                        <th>BRANCH</th>
                        <th>COUNT</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="<?=base_url('/asset/list/NMT')?>">NMT</a></td>
                            <td>NISSAN-MANTRADE</td>
                            <td>36</td>
                        </tr>
                        <tr>
                            <td><a href="<?=base_url('/asset/list/NOT')?>">NOT</a></td>
                            <td>NISSAN-OTIS</td>
                            <td>22</td>
                        </tr>
                        <tr>
                            <td><a href="<?=base_url('/asset/list/NGC')?>">NGC</a></td>
                            <td>NISSAN-GLOBAL CITY</td>
                            <td>9</td>
                        </tr>
                        <tr>
                            <td><a href="<?=base_url('/asset/list/MGP')?>">MGP</a></td>
                            <td>MG-PASAY
                            <td>9</td>
                        </tr>
                    
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
            $('#myTable').DataTable();
        });
    </script>
<?=$this->endSection(); ?>