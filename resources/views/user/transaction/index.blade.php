<x-app-layout>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="text-color mb-4">Transaction History</h2>    
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="GET" class="row g-3">
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="Search by Reference or Type" 
                                {{-- value="<?= htmlspecialchars($search) ?>" --}}
                                >
                            </div>
                            <div class="col-md-3">
                                <select name="status" class="form-select">
                                    <option value="">All Status</option>
                                    {{-- <option value="Completed" <?= $statusFilter == 'Completed' ? 'selected' : '' ?>>Completed</option>
                                    <option value="Pending" <?= $statusFilter == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                    <option value="Failed" <?= $statusFilter == 'Failed' ? 'selected' : '' ?>>Failed</option> --}}
                                </select>
                            </div>
                            <div class="col-md-3">
                                {{-- <input type="date" name="date" class="form-control" value="<?= htmlspecialchars($dateFilter) ?>"> --}}
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-color w-100">Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">All Transactions</h5>
                        <a href="?export=true&<?= http_build_query($_GET) ?>" class="btn btn-sm btn-success">
                            <i class="bi bi-download"></i> Export CSV
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive" style="max-height: 400px; overflow-x: auto; overflow-y: auto;">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Reference</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Balance Before</th>
                                        <th>Balance After</th>
                                        <th>Note</th>
                                        <th>Status</th>
                                        <th>Timestamp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->id}}</td>
                                        <td>{{ $transaction->user->username ?? 'N/A' }}</td>
                                        <td>{{ $transaction->reference ?? 'N/A' }}</td>
                                        <td>{{ $transaction->type ?? 'N/A' }}</td>
                                        <td>{{ $transaction->price ?? 'N/A' }}</td>
                                        <td>{{ $transaction->balanceBefore ?? 'N/A' }}</td>
                                        <td>{{ $transaction->balanceAfter ?? 'N/A' }}</td>
                                        <td>{{ $transaction->note ?? 'N/A' }}</td>
                                        <td>{{ $transaction->status ?? 'N/A' }}</td>
                                        <td>{{ $transaction->created_at->format('d M, Y h:i A') }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="{{ route('user.transaction.view', $transaction) }}">
                                                    <img src="{{ asset('images/showIcon.png') }}" alt="" width="20">
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No orders found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
