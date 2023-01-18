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
<h1 class="h3 mb-3">Add Purchase Order</h1>
<div class="row">
	<div class="col-lg-12 col-sm-12">
		<div class="card card-default">
			<div class="card-body">
                 
                <div class="px-2 d-flex">
                    <div class="flex-grow-1 ">
                        <p><strong>Order Details</strong></p>
                    </div>
                </div>
                
                <form method="POST" id="formRequest">  
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table" id="tableRequest">
                                <tbody>
                                <td>
                                <strong>Request No:</strong>
                                </td>
                                <td>
                                    <select class="js-example-theme-multiple js-states form-control" id="id_label_multiple">
                                        <?php foreach($requests as $request):?>
                                                <option value="<?=$request->id?>"><?=$request->id?> - <?=$request->search_tag;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </td>
                                    <tr>
                                        <td width="30%"><strong>PO Number</strong></td>
                                        <td  width="70%">
                                        <input type="text" id="poNumber" name="poNumber" class="form-control w-75" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>PO Date:</strong></td>
                                        <td>
                                            <select class="form-select" id="poDate" name="poDate">
                                                
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Company:</strong></td>
                                        <td>
                                            <select class="form-select" id="company" name="company">
                                                <option value="">Select Company</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Delivery Address:</strong></td>
                                        <td>
                                            <textarea class="form-control" id="deliveryAddress" name="deliveryAddress"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Supplier:</strong></td>
                                        <td>
                                            <select class="form-select" id="supplier" name="category">
                                                <option value="">Select Supplier</opton>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Priority</strong></td>
                                        <td>
                                       
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top"><strong>Description</strong></td>
                                        <td><textarea name="description" id="description" rows="3" class="form-control" required></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Search Tag</strong></td>
                                        <td>
                                             <input type="text" name="search_tag" id="search_tag" class="form-control devInput"  required />
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
   
    $("#submit").click(function(){
        AddNewRequest();
        $("#formRequest").load(location.href + " #formRequest");
    }); 

    $('#cboSubject').change(function() {
        var subject = $('#cboSubject').val();
        let options = '';

        switch(subject) {
            case 'Task': 
                    options  = `
                        <option value="Support - Onsite">Support - Onsite</option>
                        <option value="Support - Remote">Support - Remote</option>
                        <option value="Device - Installation">Device - Installation</option>
                        <option value="Software - Installation">Software - Installation</option>
                        <option value="Item Deployment">Item Deployment</option>
                        <option value="Email Accounts">Email Accounts</option>
                    `;
                    break;
            
            case 'Purchase' : 
                     options  = `
                        <option value="IT-Office Equipment">Office Equipment</option>
                        <option value="IT-Network Device">IT-Network Device</option>
                        <option value="IT-Miscellaneous">IT-Miscellaneous</option>
                        <option value="IT-Peripherals">IT-Peripherals</option>
                        <option value="IT-End User Device">IT-End User Device</option>
                        <option value="IT-Tools">IT-Tools</option>
                        <option value="IT-License Subscription">IT-License Subscription</option>
                        <option value="IT-Security Devices">IT-Security Devices</option>

                    `;
                    break;

            default:
                    options = `<option value="Others">Others</option>`;
                    break;
        }

        $('#cboCategory').empty().append(options);
    });

    $(".js-example-theme-multiple").select2({
         theme: "classic"
    });
 });
 </script>
 <?=$this->endSection(); ?>

