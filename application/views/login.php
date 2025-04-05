<?php $this->load->view('header'); ?>

<body class="index-page">

  
<?php $this->load->view('menuheader'); ?>
   

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Login</h1>
                <nav class="breadcrumbs">
          <ol>
            <li><a href="welcome">Home</a></li>
            <li class="login">Login</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          

          <div class="col-lg-12">
             
              <?php if ($this->session->flashdata('error')): ?>
        <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>

    <?php echo form_open('login/auth'); ?>





              <div class="row gy-4">

                 <div class="col-md-2"></div>

                <div class="col-md-4">
                  <input type="email" class="form-control" name="email" placeholder="Email Address" required="">
                </div>

                

                <div class="col-md-4">
                  <input type="password" class="form-control" name="password" placeholder="Password" required="">
                </div> 

                 
                <div class="col-md-3"></div>

                <div class="col-md-6 text-center">
                  <button type="submit" class="btn btn-secondary">Login</button>
                </div>

              </div>
            <?php echo form_close(); ?>


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