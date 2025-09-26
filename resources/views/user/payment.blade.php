<x-app-layout>
     <div class="container mt-5">
        <div class="card-body p-0">
            <div class="table-responsive" style="max-height: 400px; overflow-x: auto; overflow-y: auto;">
            <h2>Payments</h2>
                <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Reference</th>
                    <th>Amount (₦)</th>
                    <th>Fees (₦)</th>
                    <th>Total (₦)</th>
                    <th>Gateway</th>
                    <th>Status</th>
                    <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{$count}</td>
                        <td>{$pay['reference']}</td>
                        <td>" . number_format($pay['amount'], 2) . "</td>
                        <td>" . number_format($pay['fees'], 2) . "</td>
                        <td>" . number_format($pay['total'], 2) . "</td>
                        <td>{$pay['gateway']}</td>
                        <td><span class='badge bg-" . ($pay['status'] == 'Completed' ? 'success' : ($pay['status'] == 'Pending' ? 'warning' : 'danger')) . "'>{$pay['status']}</span></td>
                        <td>{$pay['created_at']}</td>
                    </tr>"
                </tbody>
                </table>
                <div class="alert alert-info mt-3">No transactions found.</div>
            </div>
        </div>
    </div>
</x-app-layout>
