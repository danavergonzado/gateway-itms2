<?=$this->extend('layout/default'); ?>

<?=$this->section('css'); ?>
<style>
    #txtArea{
        resize:none;
        border: none;
        background:transparent;
    }

    .tooltip-inner{
        padding:1px 7px;
        color:white;
        text-align:center;
        font-weight:400;
        background: black;
        background: black;
        border: 1px solid black;
        -webkit-border-radius:9px;
        -moz-border-radius:9px;
        border-radius:4px;   
        font-size:12px
    }

</style>
<?=$this->endSection(); ?>

<?=$this->section('content'); ?>
<div class="row">
	<div class="col-12">
		<div class="card card-default">
			<div class="card-body">
                <div class="px-2 d-flex">
                    <div id="statusHeader" class="flex-grow-1 ">
                        <p class="h4 d-inline align-middle mb-4 text-muted"><strong>Account # : <?="{$internet_account->no}:  {$internet_account->name} "; ?></strong></p>
                    </div>
                    <div class="px-2">
                        <a href="#" id="btnPrintDiv"><i class="align-middle" data-feather="printer" data-toggle="tooltip" title="Print"></i></a>
                    </div>                        
                    <div class="px-2">
                        <a href="<?=base_url('edit-request/'.$internet_account->id)?>"><i class="align-middle" data-feather="edit" data-toggle="tooltip" title="Update"></i></a>
                    </div>
                </div>
                <table class="table table-bordred">
                    <thead class="bg-dark text-light">
                   
                        <th colspan="2">DETAILS </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="20%"><strong>PROVIDER:</strong></td>
                            <td width="80%"><?=$internet_account->provider;?></td>
                        </tr>
                        <tr>
                            <td><strong>TYPE:</strong></td>
                            <td><?=$internet_account->type;?></td>
                        </tr>

                        <tr>
                            <td><strong>BRANCH:</strong></td>
                            <td><?=$internet_account->branch;?></td>
                        </tr>

                        <tr>
                            <td><strong>CIRCUIT NO:</strong></td>
                            <td><?=$internet_account->circuit_no;?></td>
                        </tr>

                        <tr>
                            <td><strong>PLAN AMOUNT:</strong></td>
                            <td><?=$internet_account->plan_amount;?></td>
                        </tr>

                        <tr>
                            <td><strong>PLAN TYPE:</strong></td>
                            <td><?=$internet_account->plan_type;?></td>
                        </tr>

                        <tr >
                            <td><strong>DATE INSTALLED:</strong></td>
                            <td id="statusRow"><?=$internet_account->date_installed;?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="px-2"> 
                    <p><strong>DETAILS:</strong></p>
                    <textarea class="form-control" id="txtArea" cols="50" rows="12" disabled><?=trim($internet_account->details);?></textarea>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>


<?=$this->endSection(); ?>

