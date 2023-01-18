<?=$this->extend('layout/default'); ?>

<?=$this->section('css'); ?>
<style>
    #txtArea{
        resize:none;
        border: none;
        background:transparent;
    }
</style>
<?=$this->endSection(); ?>

<?=$this->section('content'); ?>

    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">UPDATE PASSWORD</h1>
        </div>
        <div class="row">
            <div class="col-md-8 col-xl-4">
                <div class="card">
                    <div class="card-body h-100">
                            <div class="mb-3">
                                <label for="NewPassword" class="form-label">New Password:</label>
                                <input type="text" class="form-control" name="new_pass" id="txtNewPass" >
                            </div>
                            <div class="mb-3">
                                <label for="ConfirmNewPassword" class="form-label">Confirm Password:</label>
                                <input type="text" class="form-control" name="confirm_new_pass" id="txtConfirmPass">
                            </div>
                            <div class="mb-3">
                               <button class="btn btn-success w-100" id="btnChangePass">Submit Changes</button>
                            </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>


<?=$this->endSection(); ?>


<?=$this->section('js'); ?>
<script>
	$(document).ready(function(){
    
        const updatePass = function(password1, password2){

            let url = "<?=base_url('/update-password');?>";
            $.post(
                url, 
                {
                    'new_pass': password1, 
                    'conf_pass': password2
                }, 
                function(response){
                   if(response == 'true'){
                       alert('Password updated successfully. Please sign in with your new password.');
                       location.href = "<?=base_url('/logout');?>";
                   }else{
                       alert(response);
                   }
                }
            );
        }

        $('#btnChangePass').click(function(){
            updatePass($('#txtNewPass').val(), $('#txtConfirmPass').val());
        });
       
	});
</script>

<?=$this->endSection(); ?>