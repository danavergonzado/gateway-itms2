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
<h1 class="h3 mb-3">Add Account Details</h1>
<div class="row">
	<div class="col-lg-12 col-sm-12">
		<div class="card card-default">
			<div class="card-body">
                 
                <div class="px-2 d-flex">
                    <div class="flex-grow-1 ">
                        <p class="text-muted">Note: Fill in the form with complete details. <br>Specify whether the provider is EASTERN, PLDT, CONVERGE, ETC and also please include the extra details in the description box.</p>
                    </div>
                </div>
                <hr>
                <form method="POST" id="formAccount">  
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table" id="tableAccount">
                                <tbody>
                                    <tr>
                                        <td width="30%"><strong id='no'>No.</strong></td>
                                        <td  width="70%">
                                        <input type="text" id="no" name="no" class="form-control w-75" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%"><strong>Name</strong></td>
                                        <td  width="70%">
                                        <input type="text" id="name" name="name" class="form-control w-75" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%"><strong>Type</strong></td>
                                        <td>
                                            <select class="form-select" id="type" name="type">
                                                <?php foreach(get_account_type() as $key => $value): ?>
                                                    <option value="<?=$value?>"><?=$value?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Provider:</strong></td>
                                        <td>
                                            <select class="form-select" id="provider" name="provider">
                                                <?php foreach(get_internet_provider() as $key => $value): ?>
                                                    <option value="<?=$value?>"><?=$value?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Branch:</strong></td>
                                        <td>
                                            <select class="form-select" id="branch" name="branch">
                                                <?php foreach(get_gw_branches() as $key => $value): ?>
                                                        <option value="<?=$value?>"><?=$value?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%"><strong>Circuit No</strong></td>
                                        <td  width="70%">
                                        <input type="text" id="circuit_no" name="circuit_no" class="form-control w-75" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%"><strong>Plan Amount</strong></td>
                                        <td  width="70%">
                                        <input type="text" id="plan_amount" name="plan_amount" class="form-control w-75" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%"><strong>Plan Type</strong></td>
                                        <td  width="70%">
                                        <input type="text" id="plan_type" name="plan_type" class="form-control w-75" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%"><strong>Date Installed</strong></td>
                                        <td  width="70%">
                                        <input type="text" id="date_installed" name="date_installed" class="form-control w-75" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top"><strong>Details:</strong></td>
                                        <td><textarea name="details" id="details" rows="3" class="form-control" required></textarea></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                       
                    </div>
                    <hr>
               
                    <div class="px-2 d-flex">
                        <div class="flex-grow-1 "></div>
                        <div class="px-2">
                            <a class="btn btn-md btn-success align-middle" id="submit"><i class="align-middle" data-feather="save"></i> Submit Request</a>
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
 $(document).ready(function() {

    const alert_note = function(type, message){
        let alert_color = "";

        switch (type){
            case 'error': alert_color = 'alert-error'; break;
            case 'success': alert_color = 'alert-success'; break;
            default:  alert_color = 'alert-primary';
        }
        
        $("#alert_note").append("<div class='alert "+ alert_color + "' role='alert'>" + message + "</div><br>");
    }


    const AddNewAccount = function(){
        let url = window.location.href;
        let post_data = $('#formAccount').serialize();
        
        if(post_data != ''){
            $.post(url, post_data, function(data){
    
                if(data == 'true'){
                    alert_note('success', 'Record Successful');
                } else {
                    alert_note('error', 'Error Occured');
                }
            });
        } else {
            alert_note('error', 'Error Occured');
        }
    }

    $("#submit").click(function(){
        AddNewAccount();
       // $("#formAccount").load(location.href + " #formAccount");
    }); 

    

 });
 </script>
 <?=$this->endSection(); ?>

