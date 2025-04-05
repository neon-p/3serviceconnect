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

            <!-- Main Content -->
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="row g-0"> 
                            <div class="col-lg-2"></div>
                            <!-- Content Area -->
                            <div class="col-lg-8">
                                 <?php if ($this->session->flashdata('success')): ?>
                                    <p style="color: green;"><?php echo $this->session->flashdata('success'); ?></p>
                                <?php endif; ?>
                                <div class="p-4">
                                    <!-- Personal Information -->
                                    <div class="mb-4"> 
                                        <form action="<?= base_url('profile/update_profile'); ?>" method="post">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">First Name</label>
                                                <input type="text" class="form-control" value="<?php echo $user['fname']; ?>" name="fname" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" class="form-control" value="<?php echo $user['lname']; ?>" name="lname" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Email</label>
                                                <input style="background-color:#f6f6f6; " type="email" class="form-control" name="emailid" value="<?php echo $user['emailid']; ?>" readonly="">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Phone</label>
                                                <input type="tel" class="form-control" name="mobile" value="<?php echo $user['mobile']; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Address line 1</label>
                                                <input type="tel" class="form-control" name="address1" value="<?php echo $user['address1']; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Address line 2</label>
                                                <input type="tel" class="form-control" name="address2" value="<?php echo $user['address2']; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">City</label>
                                                <input type="tel" class="form-control" name="city" value="<?php echo $user['city']; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Province</label>
                                                <input type="tel" class="form-control" name="province" value="<?php echo $user['province']; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Postal Code</label>
                                                <input type="tel" class="form-control" name="postalcode" value="<?php echo $user['postalcode']; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Country</label>
                                                <input type="tel" class="form-control" name="country" value="<?php echo $user['country']; ?>">
                                            </div>
                                            <div class="col-md-12 text-center">
                                              <button type="submit" class="btn btn-secondary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div> 
                                     
                                </div>
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