<x-app-layout>
     <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <!-- Profile Update Form -->
                <div class="card p-3 shadow-sm mb-4">
                    <h5 class="text-color">Update Profile <?php echo isset($response['description']) ? htmlspecialchars($response['description']) : ''; ?></h5>
                    <form action="profile.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label"><strong>First Name</strong></label>
                            <input type="text" class="form-control" name="firstname" value="<?php echo htmlspecialchars($user['firstname']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Surname</strong></label>
                            <input type="text" class="form-control" name="surname" value="<?php echo htmlspecialchars($user['surname']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Email</strong></label>
                            <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Phone Number</strong></label>
                            <input type="number" class="form-control" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gender<span class="text-danger">*</span></label>
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="">Select gender</option>
                                <option value="M" <?php echo (isset($user['gender']) && $user['gender'] === 'M') ? 'selected' : ''; ?>>Male</option>
                                <option value="F" <?php echo (isset($user['gender']) && $user['gender'] === 'F') ? 'selected' : ''; ?>>Female</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Title<span class="text-danger">*</span></label>
                            <select name="title" id="title" class="form-control" required>
                                <option value="">Select title</option>
                                <option value="mr" <?php echo (isset($user['title']) && $user['title'] === 'mr') ? 'selected' : ''; ?>>Mr</option>
                                <option value="mrs" <?php echo (isset($user['title']) && $user['title'] === 'mrs') ? 'selected' : ''; ?>>Mrs</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Date of Birth</strong></label>
                            <input type="date" class="form-control" name="dob" value="<?php echo htmlspecialchars($user['dob']); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>BVN</strong></label>
                            <input type="text" class="form-control" name="bvn" value="<?php echo htmlspecialchars($user['bvn']); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>NIN</strong></label>
                            <input type="text" class="form-control" name="nin" value="<?php echo htmlspecialchars($user['nin']); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>State</strong></label>
                            <input type="text" class="form-control" name="state" value="<?php echo htmlspecialchars($user['state'] ?? ''); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Address</strong></label>
                            <input type="text" class="form-control" name="address" value="<?php echo htmlspecialchars($user['address'] ?? ''); ?>">
                        </div>

                        <!-- <div class="mb-3">
                            <label class="form-label"><strong>Profile Image</strong></label>
                            <input type="file" class="form-control" name="image">
                        </div> -->

                        <button type="submit" name="update_profile" class="btn btn-success">Save Changes</button>
                    </form>
                </div>
            </div>

            <div class="col-sm-4">
                <!-- Profile Information Section -->
                <div class="card p-3 shadow-sm">
                    <h5 class="text-primary">Profile Information</h5>
                    <?php if (!empty($user['image'])) : ?>
                        <img src="<?php echo htmlentities($user['image']); ?>" alt="User" width="100" class="mb-3">
                    <?php else : ?>
                        <img src="assets/images/profileIcon.png" alt="User" width="100" class="mb-3">
                    <?php endif; ?>

                    <div class="mb-3">
                        <label class="form-label"><strong>Name</strong></label>
                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($user['firstname']); ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Email</strong></label>
                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Phone</strong></label>
                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($user['phone']); ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>BVN</strong></label>
                        <input type="text" class="form-control" value="<?php echo maskSensitiveData($user['bvn']); ?>" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
