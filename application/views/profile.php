<?php $this->load->view('header'); ?>

<body class="index-page">

  
<?php $this->load->view('menuheader'); ?>
   

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Profile</h1>
                <nav class="breadcrumbs">
          <ol>
            <li><a href="dashboard">Dashboard</a></li>
            <li class="register">Profile</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
            <!-- Profile Header -->
            <div class="col-12 mb-4">
                <div class="profile-header position-relative mb-4">
                    <div class="position-absolute top-0 end-0 p-3">
                        <a href="editprofile" class="btn btn-light"><i class="fas fa-edit me-2"></i>Edit Profile</a><br>
                        <?php if ($user['status'] == 0): ?>
                            <a href="complete_profile" class="btn btn-light mt-2"><i class="fas fa-key me-2"></i>Complete Profile</a>
                            <p class="text-warning mt-2">Your profile is pending admin approval after completion.</p>
                        <?php elseif ($user['status'] == 2): ?>
                            <p class="text-warning mt-2">Your profile is under review by the admin. Please wait for approval.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="text-center"> 
                    <h3 class="mt-3 mb-1"><?php echo $user['fname'] . " " . $user['lname']; ?></h3>
                    <p class="text-muted mb-3"><?php echo $user['usertype']; ?></p>

                    <!-- Status Indicator -->
                    <?php if ($user['status'] == 1): ?>
                        <div class="alert alert-success d-inline-block" role="alert">
                            <i class="bi bi-check-circle-fill"></i> Verified
                        </div>
                    <?php elseif ($user['status'] == 0): ?>
                        <div class="alert alert-warning d-inline-block" role="alert">
                            <i class="bi bi-exclamation-triangle-fill"></i> Pending Verification
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <!-- Sidebar -->
                            <div class="col-lg-3">
                                 
                            </div>

                            <!-- Content Area -->
                            <div class="col-lg-6">
                                <div class="p-4">
                                    <!-- Personal Information -->
                                    <div class="mb-4"> 
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label"><b>Email Address: </b></label>
                                                <h6 class="mb-1"><?php echo $user['emailid']; ?></h6>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Mobile Number:</label>
                                                <h6 class="mb-1"><?php echo $user['mobile']; ?></h6>
                                            </div> 

                                            <div class="col-md-6">
                                                <label class="form-label">Address:</label>
                                                <h6 class="mb-1"><?php echo $user['address1']." ".$user['address2']; ?></h6>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">City:</label>
                                                <h6 class="mb-1"><?php echo $user['city']; ?></h6>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Province:</label>
                                                <h6 class="mb-1"><?php echo $user['province']; ?></h6>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Postal code:</label>
                                                <h6 class="mb-1"><?php echo $user['postalcode']; ?></h6>
                                            </div>
                                             
                                             <div class="col-md-6">
                                                <label class="form-label">Country:</label>
                                                <h6 class="mb-1"><?php echo $user['country']; ?></h6>
                                            </div>
                                            <?php if ($user['usertype'] == "provider"): ?> 
                                                <div class="col-md-6">
                                                    <label class="form-label"><b>Provider Visibility:</b></label>
                                                    <form method="POST" action="<?php echo base_url('Profile/update_visibility'); ?>">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="visibilityToggle" name="visibility_provider"
                                                                value="1" <?php echo ($user['visibility_provider'] == 1) ? 'checked' : ''; ?>>
                                                            <label class="form-check-label" for="visibilityToggle">
                                                                <?php echo ($user['visibility_provider'] == 1) ? 'Public' : 'Private'; ?>
                                                            </label>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary mt-2">Save</button>
                                                    </form>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div> 
                                </div>
                            </div>

                            <div class="col-lg-3">
                                 
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>

      </div>

        

    </section><!-- /Contact Section -->

  </main>

   <?php $this->load->view('footer'); ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>