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
<h1 class="h3 mb-3">New Entry Details</h1>
<div class="row">
	<div class="col-lg-12 col-sm-12">
		<div class="card card-default">
			<div class="card-body">
                 
                <div class="px-2 d-flex">
                    <div class="flex-grow-1 ">
                        <p class="text-muted">Note: Fill in the form with complete details. <br>Specify whether the request is PURCHASE, TASK, PROJECT, DEPLOYMENT or FUNDS and also please include the extra details in the description box.</p>
                    </div>
                </div>
                <hr>
                <form method="POST" id="formRequest">  
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table" id="tableRequest">
                                <tbody>
                                    <tr>
                                        <td width="30%"><strong id='requested_by_change'>Requested By:</strong></td>
                                        <td  width="70%">
                                        <input type="text" id="requestor" name="requestor" class="form-control w-75" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Branch Group:</strong></td>
                                        <td>
                                            <select class="form-select" id="branch" name="branch">
                                                <?php foreach(get_gw_branches() as $key => $value): ?>
                                                    <option value="<?=$value?>"><?=$value?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Department:</strong></td>
                                        <td>
                                            <select class="form-select" id="department" name="department">
                                                <?php foreach(get_gw_departments() as $key => $value): ?>
                                                        <option value="<?=$value?>"><?=$value?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Subject:</strong></td>
                                        <td>
                                         <select class="form-select" id="cboSubject" name="subject">
                                                <option value="">Please select subject</option>
                                             <?php foreach(get_gw_subject() as $key => $value): ?>
                                                        <option value="<?=$value?>"><?=$value?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Category:</strong></td>
                                        <td>
                                            <select class="form-select" id="cboCategory" name="category"></select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Priority:</strong></td>
                                        <td>
                                        <select class="form-select" id="priority" name="priority">
                                            <?php foreach(get_gw_priorities() as $key => $value): ?>
                                                    <option value="<?=$value?>"><?=$value?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top"><strong>Description:</strong></td>
                                        <td><textarea name="description" id="description" rows="8" class="form-control" required></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Branch Tag:</strong></td>
                                        <td>
                                             <select class="form-select" id="search_tag" name="search_tag">
                                                <?php foreach(get_gw_branches() as $key => $value): ?>
                                                    <option value="<?=$value?>"><?=$value?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
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


    const AddNewRequest = function(){
        let url = window.location.href;
        let post_data = $('#formRequest').serialize();
        
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


    const requested_by_change = function (subject){
        let table_data = '';
        switch (subject){
            case 'Gatepass':
                table_data = `Received By:`;
                break;

                default:
                    table_data = `Requested By:`;
                    break;
        }

        return table_data;
    }

    const DisplayRequestOptions = function(subject){
        let options = '';
        switch(subject) {
            case 'Task': 
                    options  = `
                        <?php foreach(get_task_category() as $key => $value): ?>
                            <option value="<?=$value?>"><?=$value?></option>
                        <?php endforeach; ?>
                    `;
                    break;
            
            case 'Concern' : 
                options  = `
                <option value="Internet">Internet</option>
                <option value="Trunkline">Trunkline</option>
                <option value="Deployment">Deployment</option>
                <option value="Printer Connection">Printer Connection</option>
                <option value="Hardware">Hardware</option>
                <option value="Software">Software</option>
                <option value="System">System</option>
                <option value="License Subscription">License Subscription</option>
                <option value="Security Policy">Security Policy</option>
            `;
            break;


            case 'Purchase' : 
                     options  = `
                    <?php foreach(get_purchase_category() as $key => $value): ?>
                         <option value="<?=$value?>"><?=$value?></option>
                    <?php endforeach; ?>
            `;
            break;

            case 'Project' : 
                options  = `
                <?php foreach(get_project_category() as $key => $value): ?>
                    <option value="<?=$value?>"><?=$value?></option>
                <?php endforeach; ?>
            `;
            break;

            case 'Funds' : 
                options  = `
                <option value="Travel">Travel Allowance</option>
                <option value="Refunds">Refund</option>
                <option value="IT Consumables">IT Consumables</option>
                <option value="Cloud Services">Cloud Services</option>
                <option value="Cash Advance">Cash Advance</option>
                <option value="Others">Others</option>
            `;
            break;

            case 'OB Pass' : 
                options  = `
                <option value="Maintenance">Maintenance</option>
                <option value="Branch Visit">Branch Visit</option>
                <option value="Pullout Unit">Pullout Unit</option>
            `;
            break;

            case 'Item Pullout' : 
                options  = `
                <option value="Item Transfer">Item Transfer</option>
                <option value="Pullout from Inventory">Pullout from Inventory</option>
                <option value="Item Borrow">Item Borrow</option>
            `;
            break;

            case 'Others' : 
                options  = `
                <option value="Vehicle Transportation">Vehicle Transportation</option>
                <option value="Official Business Pass">Official Business Pass</option>
                <option value="Delivery Receipt">Delivery Receipt</option>
                <option value="Item Transfer">Item Transfer</option>
            `;
            break;

            case 'Email Accounts' : 
                options  = `
                <option value="New Email">New Email</option>
                <option value="Reset Password">Reset Password</option>
            `;
            break;

            case 'For Repair' : 
                options  = `
                <option value="Office Equipment">Office Equipment</option>
            `;
            break;

            case 'Job Request' : 
                options  = `
                <option value="Hardware Repair">Hardware Repair</option>
                <option value="Hardware Upgrade">Hardware Upgrade</option>
                <option value="Hardware Installation">Hardware Installation</option>
                <option value="Hardware Deployment">Hardware Replacement</option>
                <option value="Software Installation">Software Installation</option>
                <option value="Software Upgrade">Software Upgrade</option>
                <option value="Printer Repair">Printer Repair</option>
                
            `;
            break;

            case 'Travel' : 
                options  = `
                <option value="Site Visit Repair">Site Visit</option>
                <option value="Office Network Setup">Office Network Setup</option>
                <option value="Network and Computer System Maintenance">Network and Computer System Maintenance</option>
                <option value="Full Network Setup">Full Network Setup</option>
            `;
            break;

            case 'Request for PO' : 
                options  = `
                <option value="Inter-Department Request">Inter-Department Request</option>

            `;
            break;

            default:
                    options = `<option value="Others">Others</option>`;
                    break;
        }

        return options;
    }

   
    $("#submit").click(function(){
        AddNewRequest();
        $("#formRequest").load(location.href + " #formRequest");
    }); 

    $('#cboSubject').change(function() {
        let subject = $('#cboSubject').val();
        let options = DisplayRequestOptions(subject);
        let table_data = requested_by_change(subject);
        $('#cboCategory').empty().append(options);
        $('#requested_by_change').empty().append(table_data);
    });

 });
 </script>
 <?=$this->endSection(); ?>

