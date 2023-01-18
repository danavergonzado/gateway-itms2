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
                        <p class="h4 d-inline align-middle mb-4 text-muted"><strong>ID# <?="{$request->id}:  {$request->subject} | {$request->category}"; ?></strong></p>
                        <p class="badge bg-success text-white ms-2"><?=($request->in_public == '1') ? 'Public' : '' ?></p> 
                    </div>
                    <div class="px-2">
                        <a href="#" id="btnPrintDiv"><i class="align-middle" data-feather="printer" data-toggle="tooltip" title="Print"></i></a>
                    </div>
                    <?php if($request->status != 'Closed' AND $request->status != 'Released'): ?>
                       
                        <?php if(isAdmin(session()->get('userid')) == 'superadmin' OR isAdmin(session()->get('userid')) == 'admin'):?>
                        <div class="px-2">
                            <a href="#" id="isPublic"><i class="align-middle" data-feather="eye" data-toggle="tooltip" title="Public"></i></a>
                        </div>
                        <?php endif;?>
                        
                    <div class="px-2">
                        <a href="<?=base_url('edit-request/'.$request->id)?>"><i class="align-middle" data-feather="edit" data-toggle="tooltip" title="Update"></i></a>
                    </div>
                    <div class="px-2">
                        <a href="#" id="closeRequest"><i class="align-middle" data-feather="check-square" data-toggle="tooltip" title="Closed"></i></a>
                    </div>
                    
                    <?php endif?>
                </div>

                <table class="table table-bordred">
                    <thead class="bg-dark text-light">
                   
                        <th colspan="2">DETAILS </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="20%"><strong>REQUESTED BY:</strong></td>
                            <td width="80%" id="txtRequestedBy"><?=$request->requestor;?></td>
                        </tr>
                        <tr>
                            <td><strong>DATE:</strong></td>
                            <td><?=$request->request_date;?></td>
                        </tr>

                        <tr>
                            <td><strong>BRANCH:</strong></td>
                            <td><?=$request->branch;?></td>
                        </tr>

                        <tr>
                            <td><strong>DEPARTMENT:</strong></td>
                            <td><?=$request->department;?></td>
                        </tr>

                        <tr>
                            <td><strong>PRIORITY:</strong></td>
                            <td><?=set_status($request->priority);?></td>
                        </tr>

                        <tr >
                            <td><strong>STATUS:</strong></td>
                            <td id="statusRow"><?=set_status($request->status);?></td>
                        </tr>

                        <tr>
                            <td><strong>PREPARED BY:</strong></td>
                            <td><?=$request->addedby;?></td>
                        </tr>
                        <tr>
                            <td><strong>ORDER NO:</strong></td>
                            <td>
                                <?php if($orders != null) :?>  
                                    <!-- <?php foreach($orders as $rows): ?>
                                        <?= implode(array(",",$rows->po_number));?>
                                    <?php endforeach;?> -->

                                    
                                     <?=implode(', ', array_map(function($orders) { return "<a>".$orders->po_number."</a>"; }, $orders));?>
                                <?php else:?>
                                    No Purchase Order
                                <?php endif;?>

                                <?php  //var_dump(); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="px-2"> 
                    <p><strong>DESCRIPTION:</strong></p>
                    <textarea class="form-control" id="txtArea" cols="50" rows="12" disabled><?=trim($request->description);?></textarea>
                </div>
               
                <hr>
                
                <small><em>tags: <?=$request->search_tag;?></em></small>
            </div>
        </div>
    </div>
</div>

<!-- NOTES/LOGS -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="px-2 d-flex">
                    <div class="flex-grow-1 ">
                        <p><strong> NOTES:</strong></p>
                    </div>
                    <?php if($request->status != 'Closed' AND $request->status != 'Released' ):?>
                    <div class="px-2">
                        <a alt-text="Click to add new notes." id="addNotes"><i class="align-middle" data-feather="file-plus" data-toggle="tooltip" title="New Note"></i></a>
                    </div>
                    <?php endif?>
                </div>
                <table class="table table-bordred" id="tblNotes">
                    <thead class="bg-dark text-light">
                        <th width="15%">DATE</th>
                        <th width="15%">USER</th>
                        <th width="70%">MESSAGE</th>
                    </thead>
                    <tbody>

                        <?php if( count($comments) == 0 ): ?>
                            <tr>
                                <td colspan="6">
                                   <center> No data available</center>
                                </td>
                            </tr>
                        <?php endif;?>

                        <?php foreach($comments as $comment): ?>
                        <tr>
                       
                            <td> <?=date_format(date_create($comment->date_performed),"m/d/Y H:i A");?></td>
                            <td><?= getUserName($comment->userid);?></td>
                            <td><?=$comment->action;?></td>
                        </tr>
                        <?php endforeach ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="MarkAsClose" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

  <div id="print_preview" class="d-none d-print-block" >
    <div class="row">
            <div class="d-flex">
                <div class="d-inline py-4"><h5><strong><?=($request->subject == 'Gatepass') ? 'ITEM GATEPASS' : 'INTER-DEPARTMENT REQUISITION FORM' ?></strong></h3>
                </div>
                <div class="ms-auto d-inline">
                    <img style="width:300px" src="<?=base_url('img/Gateway_logo.png')?>"></img>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered">
                <tr>
                    <td colspan="3" ><strong><?=($request->subject == 'Gatepass') ? 'GATEPASS' : 'INTER-DEPARTMENT REQUISITION FORM' ?>#:<?=$request->id?></strong></td>
                </tr>
                <tr>
                    <td style="width:50%">
                        <p>
                            Requested By: <?=$request->requestor?> <br/>
                            Branch: <?=$request->branch?> <br/>
                            Department: <?=$request->department?> <br/>
                            Subject: <?=$request->subject?> <br/>
                        </p>
                    </td>
                    <td colspan="2">
                        <p>
                            Date: <?=$request->request_date?><br/>
                            Category: <?=$request->category?> <br/>
                            Priority: <?=$request->priority?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><strong>DESCRIPTION:</strong></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <pre style="border:none;background-color:#fff;font-family: 'Helvetica Neue',sans-serif;font-size: 14px;"><?=$request->description?></pre>
                    </td>
                </tr>
                
                <tr>
                    <table class="table table-bordered">
                        <tr>
                            <td ><strong>Prepared By:</strong></td>
                            <td ><strong>Acknowledged By:</strong></td>
                            <td><strong>Approved By:</strong></td>
                        </tr>

                        <tr style="">
                            <td>
                                <div style="text-align:center">
                                    <select style="border:0px;text-align:center" class="form-select">
                                        <option></option>
                                        <option><?=getUserFullName($request->addedby);?></option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div style="text-align:center">
                                    <select style="border:0px;text-align:center" class="form-select">
                                        <?php foreach(get_gw_approved() as $key => $value): ?>
                                                <option value="<?=$value?>"><?=$value?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div style="text-align:center">
                                    <select style="border:0px;text-align:center" class="form-select">
                                        <?php foreach(get_gw_approved() as $key => $value): ?>
                                                <option value="<?=$value?>"><?=$value?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><div style="font-size:10px;height:5px;text-align:center">Signature Over Printed Name</div></td>
                            <td><div style="font-size:10px;height:5px;text-align:center">Signature Over Printed Name</div></td>
                            <td><div style="font-size:10px;height:5px;text-align:center">Signature Over Printed Name</div></td>
                        </tr>
                    </table>
                </tr>
            </table>
            <input type="hidden" id="requestID" value="<?=$request->id?>">
            <div class="pull-right">	
        </div>
        </div>
    </div>
</div>


<?=$this->endSection(); ?>


<?=$this->section('js');?>
<script type="text/javascript">

   $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
        // =================================
        // methods, functions and declations
        // =================================

       const printDiv = function(){
            var divContents = document.getElementById("print_preview").innerHTML;
            var app_css = document.getElementById("app_css").href;
            var a = window.open('', '', 'height=1000, width=1000');
            a.document.write('<html>');
            a.document.write('<head>');
            a.document.write('<link href="'+app_css+'" rel="stylesheet">');
            a.document.write('</head>');
            a.document.write('<body style="background-color:#fff"> <br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
           // a.print();
       }

        let newRow = '';
        let objTxtInput = '';
        let txtReqID = '';
        const addNewRow = function(){
            const objTblNotes =  $('#tblNotes tr:last');
            const newTblRow = "<tr>" +
                                "<td><?=date('Y-m-d H:i:s');?></td>" + 
                                "<td> <input class='form-control' type='text' name='username' id='txtUserName' disabled='true' value='<?=session()->get('username');?>'/> </td>" + //optimize this code later</td>" +
                                "<td>" +
                                    "<input type='hidden' name='requestid' id='requestid' value='<?=$request->id?>' />" +  //optimize this code later
                                    "<input class='form-control' type='text' name='note' id='txtNote' /> " + 
                                "</td>" +
                              "</tr>";
                    objTblNotes.after(newTblRow);
                    objTxtInput = $('#txtNote');
                    txtReqID = $('#requestid').val();

            newRow = true;
        }

        const addNewNote = function(){
            let url = "<?=base_url('/add-comment');?>";
            $.post(url, {'note': objTxtInput.val(), 'requestid':  txtReqID}, function(){
                $("#tblNotes").load(location.href + " #tblNotes");
                newRow = false;
            });
            
        }

         // =================================
        //  EVENT LISTENERS
        // =================================
        $('#btnPrintDiv').on('click', function(){
            printDiv();
       });

        $('#addNotes').on('click', function(){
            if(newRow != true){
                addNewRow();
                objTxtInput.focus();
                objTxtInput.keyup(function(e){
                    if(e.keyCode == 13 && objTxtInput.val().length !== 0){ 
                         addNewNote(); 
                    }
                });
            }
        });

        $('#closeRequest').click(function(){
            let closeRequest = confirm('are you sure you want to closed this Request?');
            let requestID = $('#requestID').val();
            let url = "<?=base_url('close-request')?>/"+ requestID; 

            if(closeRequest == true){
                $.post(url,{ reqID: requestID }, function(data){
                    $("#statusRow").load(location.href + " #statusRow" );
                   console.log(data);
                });
            } 
        });

        $('#isPublic').click(function(){
            let isPublicRequest = confirm('are you sure you want to public this Request?');
            let requestID = $('#requestID').val();
            let url = "<?=base_url('is-public')?>/"+ requestID; 

            if(isPublicRequest == true){
                $.post(url,{ reqID: requestID }, function(data){
                    $("#statusHeader").load(location.href + " #statusHeader" );
                   console.log(data);
                });
            } 
        });
   });
        
    </script>
<?=$this->endSection(); ?>