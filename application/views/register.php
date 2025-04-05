<?php $this->load->view('header'); ?>

<body class="index-page">

  
<?php $this->load->view('menuheader'); ?>
   

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Register</h1>
                <nav class="breadcrumbs">
          <ol>
            <li><a href="welcome">Home</a></li>
            <li class="register">Register</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          

          <div class="col-lg-12">
             <?php if ($this->session->flashdata('success')): ?>
        <p style="color: green;"><?php echo $this->session->flashdata('success'); ?></p>
    <?php endif; ?>

            <form action="<?php echo base_url('register/register_process'); ?>" method="post" data-aos="fade-up" data-aos-delay="500">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="First Name" required="">
                </div>

                <div class="col-md-6">
                  <input type="text" name="lname" class="form-control" placeholder="Last Name" required="">
                </div>

                <div class="col-md-6">
                  <input type="email" class="form-control" name="username" placeholder="Email Address" required="">
                </div>

                <div class="col-md-6">
                  <input type="text" class="form-control" name="phone" placeholder="Mobile Number" required="">
                </div>

                <div class="col-md-6">
                  <input type="password" class="form-control" name="password" placeholder="Password" required="">
                </div> 

                <div class="col-md-6">
                  <input type="text" class="form-control" name="address" placeholder="Address line 1" required="">
                </div>

                <div class="col-md-6">
                  <input type="text" class="form-control" name="address2" placeholder="Address line 2">
                </div>

                <div class="col-md-6">
                  <input type="text" class="form-control" name="city" placeholder="City" required="">
                </div>

                <div class="col-md-6">
                  <input type="text" class="form-control" name="province" placeholder="Province" required="">
                </div>

                <div class="col-md-6">
                  <input type="text" class="form-control" name="postalcode" placeholder="Postal code" required="">
                </div>

                <div class="col-md-6">
                  <input type="text" class="form-control" name="country" placeholder="Country" required="">
                </div>

                  

                                <!-- User Type Selection -->
                <div class="col-md-6">
                    <select name="user_type" class="form-control" required id="user_type_select">
                        <option value="">--Select user type--</option>
                        <option value="customer">Customer</option>
                        <option value="provider">Provider</option>
                    </select>
                </div>

                

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        // Get the user type dropdown and the provider visibility section
                        const userTypeSelect = document.getElementById('user_type_select');
                        const providerVisibilitySection = document.getElementById('provider-visibility-section');

                        // Function to toggle the visibility of the provider section based on the user type selection
                        function toggleProviderVisibility() {
                            if (userTypeSelect.value === 'provider') {
                                providerVisibilitySection.style.display = 'block'; // Show the provider visibility section
                            } else {
                                providerVisibilitySection.style.display = 'none'; // Hide the provider visibility section
                            }
                        }

                        // Event listener for when the user type selection changes
                        userTypeSelect.addEventListener('change', toggleProviderVisibility);

                        // Run the function once on page load to set the initial state
                        toggleProviderVisibility();
                    });
                </script>
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-secondary">Register Now</button>
                </div>

              </div>
            </form>


          </div><!-- End Contact Form -->

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