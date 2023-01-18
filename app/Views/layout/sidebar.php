<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">ITMS</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Collections
            </li>

            

            <!-- TASK -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('/task-list');?>">
                    <i class="align-middle" data-feather="file"></i> <span class="align-middle">Task</span>
                 </a>
            </li>

            <!-- Request -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('/request-list');?>">
                    <i class="align-middle" data-feather="edit"></i> <span class="align-middle">Request</span>
                    <?php if(count_request() != null): ?> 
                        <span class="sidebar-badge badge bg-danger">  <?=count_request(); ?> </span>
                    <?php endif; ?> 
                 </a>
            </li>

             <!--ORDERS LIST 
             <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('/order-list');?>">
                    <i class="align-middle" data-feather="package"></i> <span class="align-middle">Orders</span>
                 </a>
            </li>

            -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('/asset');?>">
                    <i class="align-middle" data-feather="server"></i> <span class="align-middle">Assets</span>
                 </a>
            </li>
            
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('/item-pullout');?>">
                    <i class="align-middle" data-feather="minus-square"></i> <span class="align-middle">Item Pullout</span>
                 </a>
            </li>
            <!--
            <li class="sidebar-item">
                <a class="sidebar-link" href="">
                    <i class="align-middle" data-feather="phone"></i> <span class="align-middle">Concerns</span>
                 </a>
            </li>

            

            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('/for_repair-list')?>">
                    <i class="align-middle" data-feather="settings"></i> <span class="align-middle">For Repair</span>
                 </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('/email_accounts')?>">
                    <i class="align-middle" data-feather="mail"></i> </span>Email Accounts </span>
                    <?php if(count_email_accounts() != null): ?> 
                        <span class="sidebar-badge badge bg-danger">  <?=count_email_accounts(); ?> </span>
                    <?php endif; ?>          
                 </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('/ob_pass')?>">
                    <i class="align-middle" data-feather="truck"></i> <span class="align-middle">OB Pass</span>
                 </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('/funds')?>">
                    <i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Funds</span>
                 </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('/travel')?>">
                    <i class="align-middle" data-feather="navigation"></i> <span class="align-middle">Travel</span>
                 </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('/item-pullout')?>">
                    <i class="align-middle" data-feather="truck"></i> <span class="align-middle">Item Pullout</span>
                 </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('/internet-account')?>">
                    <i class="align-middle" data-feather="globe"></i> <span class="align-middle"> Accounts</span>
                 </a>
            </li>
        

            <?php if( !isAdmin(session()->get('userid')) ): ?>
            
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('/item-list');?>">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Item List</span>
                 </a>
            </li>
            <?php endif; ?>
            -->
            
            <!--
            <li class="sidebar-header">
                Entry
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('/add-request');?>">
                    <i class="align-middle" data-feather="file-plus"></i> <span class="align-middle">New Task/Request</span>
                 </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('/add-asset');?>">
                    <i class="align-middle" data-feather="file-plus"></i> <span class="align-middle">New Asset</span>
                 </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('/add-account');?>">
                    <i class="align-middle" data-feather="file-plus"></i> <span class="align-middle">New Account</span>
                 </a>
            </li>-->
    </div>
</nav>