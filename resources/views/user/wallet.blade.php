<x-app-layout>
    <div class="container py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header bg-color text-white">
                        <h3 class="mb-0">Wallet Summary</h3>
                    </div>
                    <div class="card-body">                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Main Balance</h5>
                                        <p class="card-text display-6">₦{{ number_format($wallet->mainBalance, 2 )}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Referral Balance</h5>
                                        <p class="card-text display-6">₦{{ number_format($wallet->referral_balance, 2 )}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <dl class="row">
                            <dt class="col-sm-3">Wallet ID</dt>
                            <dd class="col-sm-9"><?= $wallet['identifier'] ?? 'N/A' ?></dd>
                            
                            <dt class="col-sm-3">Status</dt>
                            <dd class="col-sm-9">
                                <span class="badge bg-<?= ($wallet['status'] ?? '') == 'Active' ? 'success' : 'danger' ?>">
                                    <?= $wallet['status'] ?? 'Inactive' ?>
                                </span>
                            </dd>
                            
                            <dt class="col-sm-3">Account Number</dt>
                            <dd class="col-sm-9"><?= $accountNumber ?? 'Not available' ?></dd>
                        </dl>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header bg-success text-white">
                        <h3 class="mb-0">Quick Actions</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="fund-wallet.php" class="btn btn-wallet">Fund Wallet</a>
                            <a href="transfer.php" class="btn btn-outline-primary">Transfer Money</a>
                            <!-- <a href="withdraw.php" class="btn btn-outline-success">Withdraw Funds</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header bg-info text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Transaction History</h3>
                    <a href="?export=true" class="btn btn-sm btn-light">Export CSV</a>
                </div>
            </div>
            <div class="card-body">
                <form method="GET" class="mb-4">
                    <div class="row g-3">
                        <div class="col-md-4">
                            {{-- <input type="text" name="search" class="form-control" placeholder="Search..." value="<?= htmlspecialchars($search) ?>"> --}}
                        </div>
                        <div class="col-md-3">
                            <select name="status" class="form-select">
                                <option value="">All Status</option>
                                {{-- <option value="Completed" <?= $statusFilter == 'Completed' ? 'selected' : '' ?>>Completed</option> --}}
                                {{-- <option value="Pending" <?= $statusFilter == 'Pending' ? 'selected' : '' ?>>Pending</option> --}}
                                {{-- <option value="Failed" <?= $statusFilter == 'Failed' ? 'selected' : '' ?>>Failed</option> --}}
                            </select>
                        </div>
                        <div class="col-md-3">
                            {{-- <input type="date" name="date" class="form-control" value="<?= htmlspecialchars($dateFilter) ?>"> --}}
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-wallet w-100">Filter</button>
                        </div>
                    </div>
                </form>
                
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Reference</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Previous Bal</th>
                                <th>New Bal</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($transactions)): ?>
                                <tr>
                                    <td colspan="8" class="text-center">No transactions found</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($transactions as $txn): ?>
                                    <tr>
                                        <td><?= $txn['id'] ?></td>
                                        <td><?= $txn['reference'] ?></td>
                                        <td>
                                            <span class="badge bg-<?= $txn['type'] == 'Credit' ? 'success' : 'danger' ?>">
                                                <?= $txn['type'] ?>
                                            </span>
                                        </td>
                                        <td>₦<?= number_format($txn['amount'], 2) ?></td>
                                        <td>₦<?= number_format($txn['balanceBefore'], 2) ?></td>
                                        <td>₦<?= number_format($txn['balanceAfter'], 2) ?></td>
                                        <td>
                                            <span class="badge bg-<?= 
                                                $txn['status'] == 'Completed' ? 'success' : 
                                                ($txn['status'] == 'Pending' ? 'warning' : 'danger') 
                                            ?>">
                                                <?= $txn['status'] ?>
                                            </span>
                                        </td>
                                        <td><?= date('j M Y, H:i', strtotime($txn['created_at'])) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>