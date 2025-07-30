<x-admin-layout>
    <div class="container mt-4">
        <!-- Dashboard Overview -->
        <div class="row mb-4">
            <div class="col-12 col-sm-6 col-md-3 p-2">
                <div class="card p-3 shadow-sm text-center">
                    <h6>Total Users</h6>
                    {{-- <h3><?php echo $totalUsers; ?></h3> --}}
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 p-2">
                <div class="card p-3 shadow-sm text-center">
                    <h6>Total Transactions</h6>
                    {{-- <h3><?php echo $totalTransactions; ?></h3> --}}
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 p-2">
                <div class="card p-3 shadow-sm text-center">
                    <h6>Total Money</h6>
                    {{-- <h3>₦<?php echo number_format($totalRevenue, 2); ?></h3> --}}
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 p-2">
                <div class="card p-3 shadow-sm text-center">
                    <h6>Pending Requests</h6>
                    {{-- <h3><?php echo $pendingRequests; ?></h3> --}}
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row mb-4 text-center">
            <div class="col-12 col-sm-4 mb-2">
                <a href="admin-profile.php" class="btn btn-primary w-100 p-3">
                    <i class="bi bi-person-plus"></i> View Admin
                </a>
            </div>
            <div class="col-12 col-sm-4 mb-2">
                <a href="services.php" class="btn btn-success w-100 p-3">
                    <i class="bi bi-gear"></i> Manage Services
                </a>
            </div>
            <div class="col-12 col-sm-4 mb-2">
                <a href="users-log.php" class="btn btn-warning w-100 p-3">
                    <i class="bi bi-file-text"></i> View Logs
                </a>
            </div>
        </div>

        <!-- Recent Transactions -->
        <div class="card p-2 shadow-sm">
            <h5 class="text-color">Recent Transactions</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Date</th>
                            <th>User</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- <?php while ($row = $recentTransactions->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo date("d-M-Y", strtotime($row['created_at'])); ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td>₦<?php echo number_format($row['amount'], 2); ?></td>
                            <td class="<?php echo ($row['status'] == 'Success') ? 'text-success' : 'text-danger'; ?>">
                                <?php echo $row['status']; ?>
                            </td>
                        </tr>
                        <?php endwhile; ?> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
