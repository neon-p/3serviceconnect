<?php $this->load->view('header'); ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Complete Profile</h2>
    <form method="POST" action="<?php echo base_url('profile/save_complete_profile'); ?>">
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
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="morning" name="availability[]" value="Morning">
                    <label class="form-check-label" for="morning">Morning</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="evening" name="availability[]" value="Evening">
                    <label class="form-check-label" for="evening">Evening</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Night" name="availability[]" value="Night">
                    <label class="form-check-label" for="Night">Night</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="all_day" name="availability[]" value="all_day">
                    <label class="form-check-label" for="All_day">All Day</label>
                </div>
            </div>

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