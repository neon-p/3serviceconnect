<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="<?php echo base_url(); ?>" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">ServiceConnect</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
           <li><a href="welcome" class="active">Home</a></li>
           


           



           <?php if ($this->session->userdata('logged_in')){ ?>
                                   
                    <li class="dropdown"><a href="#"><span>Welcome, <?php echo $this->session->userdata('username'); ?>!</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                      <li><a href="<?php echo base_url('myprofile'); ?>">View Profile</a></li>  
                      <li><a href="<?php echo base_url('login/logout'); ?>">Logout</a></li> 
                    </ul>
                  </li> 


                <?php } else { ?>

                    <li><a href="register">Register</a></li>
                    <li><a href="login">Login</a></li>

                <?php } ?>


 
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>