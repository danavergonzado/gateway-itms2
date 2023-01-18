<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <form id="formSearch" action="<?=base_url('search')?>" method='post' class="d-none d-sm-inline-block">
        <div class="input-group input-group-navbar">
            <input name="search" type="text" class="form-control" placeholder="Search…" aria-label="Search" required>
            <button class="btn" id="searchButton">
                <i class="align-middle" data-feather="search"></i>
            </button>
        </div>
    </form>

    <!-- <input type="text" class="form-control" placeholder="Search"> -->
    
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                 <span class="text-dark">Hello, <?=session()->get('username');?></span>
                </a>

                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="<?=base_url('/user-profile')?>">Update Password</a>
                    <a class="dropdown-item" href="<?=base_url('/logout')?>">Log out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>