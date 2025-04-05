<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        a {
            text-decoration: none;
            color: #007BFF;
        }
        a:hover {
            text-decoration: underline;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
        .btn {
            display: inline-block;
            padding: 8px 12px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            margin-right: 5px;
        }

        .btn-approve {
            background-color: #28a745; /* Green */
            color: white;
            border: 1px solid #28a745;
        }

        .btn-approve:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-reject {
            background-color: #dc3545; /* Red */
            color: white;
            border: 1px solid #dc3545;
        }

        .btn-reject:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <h2>Pending Profiles</h2>

    <!-- Flash messages -->
    <?php if ($this->session->flashdata('success')): ?>
        <p class="success"><?php echo $this->session->flashdata('success'); ?></p>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <p class="error"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>

    <!-- Profiles Table -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User Type</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>City</th>
                <th>Province</th>
                <th>Postal Code</th>
                <th>Country</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($profiles)): ?>
                <?php foreach ($profiles as $profile): ?>
                    <tr>
                        <td><?php echo $profile['user_id']; ?></td>
                        <td><?php echo $profile['usertype']; ?></td>
                        <td><?php echo $profile['fname']; ?></td>
                        <td><?php echo $profile['lname']; ?></td>
                        <td><?php echo $profile['emailid']; ?></td>
                        <td><?php echo $profile['address1']; ?></td>
                        <td><?php echo $profile['city']; ?></td>
                        <td><?php echo $profile['province']; ?></td>
                        <td><?php echo $profile['postalcode']; ?></td>
                        <td><?php echo $profile['country']; ?></td>
                        <td>
                            <a href="<?php echo site_url('Approve_Profile/approve_profile/' . $profile['user_id']); ?>" class="btn btn-approve">Approve</a>
                            <a href="<?php echo site_url('admin_Dashboard/reject_profile/' . $profile['user_id']); ?>" class="btn btn-reject">Reject</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No pending profiles found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>