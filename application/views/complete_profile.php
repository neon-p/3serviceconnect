<?php $this->load->view('header'); ?>

<div class="container mt-5">
<?php if ($this->session->flashdata('error')): ?>
        <p style="color: green;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
    <h2 class="text-center mb-4">Complete Profile</h2>
    <form method="POST" action="<?php echo base_url('profile/save_complete_profile'); ?>" enctype="multipart/form-data">
        <div class="row g-3">
            <!-- Years of Experience -->
            <div class="col-md-6">
                <label for="years_of_experience" class="form-label">Years of Experience</label>
                <select class="form-control" id="years_of_experience" name="years_of_experience" required>
                    <option value="">Select Option</option>
                    <option value="0">None or less than 1</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="2+">More than 2</option>
                </select>
            </div>

            <!-- Certification Upload -->
            <div class="col-md-6">
                <label for="certification_file" class="form-label">Upload Certification</label>
                <input type="file" class="form-control" id="certification_file" name="certification_file" required>
            </div>

            <!-- Past Projects Upload -->
            <div class="col-md-6">
                <label for="past_projects_file" class="form-label">Upload Past Projects</label>
                <input type="file" class="form-control" id="past_projects_file" name="past_projects_file" required>
            </div>

            <!-- Submit Button -->
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Complete Profile</button>
            </div>
        </div>
    </form>
</div>

<?php $this->load->view('footer'); ?>