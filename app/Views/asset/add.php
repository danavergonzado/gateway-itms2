<?=$this->extend('layout/default'); ?>

<?=$this->section('css') ;?>
<style>
	.dataTables_filter {
		margin-bottom:10px;
	}

    .table>:not(caption)>*>* {
        border-bottom-width: 0;
        padding: .50rem; 
    }

    .alert-success{
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
        padding:15px;
        border-radius: 3px;
    }

    .alert-error{
        color: #842029;
        background-color: #f8d7da;
        border-color: #f5c2c7;
        padding:15px;
        border-radius: 3px;
    }


    .alert-x {
        float:right;
        cursor: pointer;
    }

    #serial_error {
        color: red;
        font-size: .90em;
        display: none;
    }
</style>

</script>
<?=$this->endSection(); ?>

<?=$this->section('content'); ?>
    <div id="alert_note"></div>
<h1 class="h3 mb-3">Add Asset Items</h1>
<div class="row">
	<div class="col-lg-12 col-sm-12">
		<div class="card card-default">
			<div class="card-body">
                 
                <div class="px-2 d-flex">
                    <div class="flex-grow-1 ">
                        <p class="text-muted">Note: Fill in the form with complete details. <br>
                    </div>
                </div>
                <hr>
                <form method="POST" id="formAsset">  
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table" id="tableAsset">
                                <tbody>
                                    <tr>
                                        <td width="30%"><strong>Item</strong></td>
                                        <td >
                                            <select class="form-select w-75" id="item" name="item">
                                                <?php foreach(get_gw_items() as $key => $value): ?>
                                                    <option value="<?=$value?>"><?=$value?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Model:</strong></td>
                                        <td>
                                        <input type="text" id="model_no" name="model_no" class="form-control w-75" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Description:</strong></td>
                                        <td>
                                        <textarea name="description" id="description" rows="3" class="form-control" required></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Serial #:</strong></td>
                                        <td>
                                            <input type="text" id="asset_no" name="asset_no" class="form-control w-75" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Allocation:</strong></td>
                                        <td>
                                        <select class="form-select" id="branch" name="branch">
                                            <?php foreach(get_gw_branches() as $key => $value): ?>
                                                <option value="<?=$value?>"><?=$value?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top"><strong>Date Acquired:</strong></td>
                                        <td><input type="text" name="date_acquired" id="date_acquired" class="form-control flatpickr-minimum devInput"  required /></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Doc Reference</strong></td>
                                        <td>
                                             <input type="text" name="doc_reference_no" id="doc_reference_no" class="form-control devInput"  required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>DR No</strong></td>
                                        <td>
                                             <input type="text" name="dr_no" id="dr_no" class="form-control devInput"  required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status:</strong></td>
                                        <td>
                                            <select class="form-select" id="operational_status" name="operational_status">
                                                <?php foreach(get_gw_status() as $key => $value): ?>
                                                    <option value="<?=$value?>"><?=$value?></option>
                                                <?php endforeach;?> 
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top"><strong>Remarks</strong></td>
                                        <td><textarea name="remarks" id="remarks" rows="3" class="form-control" required></textarea></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <div class="px-2 d-flex">
                        <div class="flex-grow-1 "></div>
                        <div class="px-2">
                            <a class="btn btn-md btn-success align-middle" id="submit"><i class="align-middle" data-feather="save"></i> Save</a>
                        </div>
                    </div>
                </form>
			</div> 
		</div>
	</div>
</div>

<?=$this->endSection(); ?>

<?=$this->section('js'); ?>
<script>
$(document).ready(function(){
    const alert_note = function(type, message){
        let alert_color = "";

        switch (type){
            case 'error': alert_color = 'alert-error'; break;
            case 'success': alert_color = 'alert-success'; break;
            default:  alert_color = 'alert-primary';
        }
        
        $("#alert_note").append("<div class='alert "+ alert_color + "' role='alert'>" + message + "</div><br>");
    }


    const AddNewAsset = function(){
        let url = window.location.href;
        let post_data = $('#formAsset').serialize();

        if(post_data != ''){
            $.post(url, post_data, function(data){
                console.log(post_data);
                if(data == 'true'){
                    alert_note('success','Record Successful');
                } else {
                    alert_note('error', 'Error Occured from transferring data');
                }
            });
        } else {
            alert_note('error','Error Occured');
        }
    }

    $("#submit").click(function(){
        AddNewAsset();
        $("#formAsset").load(location.href + " #formAsset");
    }); 
});

    flatpickr(".flatpickr-minimum");
</script>
<?=$this->endsection(); ?>

