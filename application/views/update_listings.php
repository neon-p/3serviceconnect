<?php $this->load->view('header'); ?>

<div class="container mt-5">
<?php if ($this->session->flashdata('error')): ?>
        <p style="color: green;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
    <h2 class="text-center mb-4">Complete Profile</h2>
    <form method="POST" action="<?php echo base_url('profile/save_update_listings'); ?>">
        <div class="row g-3">
            <!-- Service Selection -->
            <div class="col-md-6">
                <label for="service_id" class="form-label">Service</label>
                <select class="form-control" id="service_id" name="service_id" required>
                    <option value="">Select a Service</option>
                    <?php foreach ($services as $service): ?>
                        <option value="<?php echo $service['service_id']; ?>"><?php echo $service['title']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Hourly Rate -->
            <div class="col-md-6">
                <label for="hourly_rate" class="form-label">Hourly Rate</label>
                <input type="number" class="form-control" id="hourly_rate" name="hourly_rate" placeholder="Enter hourly rate in CAD" required>
            </div>

            <!-- Availability -->
            <div class="col-md-6">
                <label for="availability" class="form-label">Availability</label>
                <select class="form-control" id="availability" name="availability" required>
                    <option value="">Select Availability</option>
                    <option value="Morning">Morning</option>
                    <option value="Evening">Evening</option>
                    <option value="Night">Night</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Complete Profile</button>
            </div>
        </div>
    </form>
</div>

<?php $this->load->view('footer'); ?>