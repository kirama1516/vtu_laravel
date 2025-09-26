<x-app-layout>
    <div class="container my-5">
        <div class="row">
            <!-- Right Column (Settings & Transactions) -->
            <div class="col-sm-3">
                <!-- Change Password Section -->
                <div class="card p-3 shadow-sm mb-4">
                    <h5 class="text-color">Change Password</h5>
                    <form action="settings.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <input type="password" name="current_password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" name="new_password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control">
                        </div>
                        <button name="change_paswrd" class="btn btn-update">Update Password</button>
                    </form>
                </div>

                <!-- Change PIN Section -->
                <div class="card p-3 shadow-sm mb-4">
                    <h5 class="text-color">Change PIN</h5>
                    <form action="settings.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <input type="password" name="current_password" class="form-control" maxlength="4">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">New PIN</label>
                            <input type="password" name="new_pin" class="form-control" maxlength="4">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm PIN</label>
                            <input type="password" name="confirm_pin" class="form-control" maxlength="4">
                        </div>
                        <button name="change_pin" class="btn btn-update">Update PIN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
