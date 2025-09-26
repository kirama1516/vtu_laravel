<x-app-layout>
     <div class="container mt-4">
       <div class="row justify-content-center">
            <h2 class="text-color">Order History</h2>

            <form class="row g-3 mb-3" action="{{ route('user.order.index')}}" method="POST">
                @csrf
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search by User, Ref, Package, Service, Biller, Category"
                     {{-- value="<?php echo $search; ?>" --}}
                     >
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        {{-- <option value="Pending" <?php if ($status == 'Pending') echo 'selected'; ?>>Pending</option>
                        <option value="Completed" <?php if ($status == 'Completed') echo 'selected'; ?>>Completed</option>
                        <option value="Failed" <?php if ($status == 'Failed') echo 'selected'; ?>>Failed</option>
                        <option value="Cancelled" <?php if ($status == 'Cancelled') echo 'selected'; ?>>Cancelled</option> --}}
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="date" name="date" class="form-control"
                     {{-- value="<?php echo $date; ?>" --}}
                     >
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-order">Filter</button>
                    <a href="orders.php?export=true" class="btn btn-success">Export CSV</a>
                </div>
            </form>
       </div>
        
        <div class="row justify-content-center">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Package</th>
                            <th>Service</th>
                            <th>Biller</th>
                            <th>Category</th>
                            <th>Provider Ref</th>
                            <th>Provider Resp</th>
                            <th>Provider Msg</th>
                            <th>Provider</th>
                            <th>Reference</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Beneficiary</th>
                            <th>Sender</th>
                            <th>Message</th>
                            <th>Meter Type</th>
                            <th>Meter Number</th>
                            <th>Meter Name</th>
                            <th>Response API</th>
                            <th>Response Msg</th>
                            <th>Token</th>
                            <th>Status</th>
                            <th>Timestamp</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        <tr>
                            <td>{{ $order->id}}</td>
                            <td>{{ $order->user->username ?? 'N/A' }}</td>
                            <td>{{ $order->package->title ?? 'N/A' }}</td>
                            <td>{{ $order->service->title ?? 'N/A' }}</td>
                            <td>{{ $order->biller->title ?? 'N/A' }}</td>
                            <td>{{ $order->category->title ?? 'N/A' }}</td>
                            <td>{{ $order->provider_reference ?? 'N/A' }}</td>
                            <td>{{ $order->provider_response ?? 'N/A' }}</td>
                            <td>{{ $order->provider_message ?? 'N/A' }}</td>
                            <td>{{ $order->provider ?? 'N/A' }}</td>
                            <td>{{ $order->reference ?? 'N/A' }}</td>
                            <td>{{ $order->price ?? 'N/A' }}</td>
                            <td>{{ $order->quantity ?? 'N/A' }}</td>
                            <td>{{ $order->total ?? 'N/A' }}</td>
                            <td>{{ $order->beneficiary ?? 'N/A' }}</td>
                            <td>{{ $order->sender ?? 'N/A' }}</td>
                            <td>{{ $order->message ?? 'N/A' }}</td>
                            <td>{{ $order->meterType ?? 'N/A' }}</td>
                            <td>{{ $order->meterNumber ?? 'N/A' }}</td>
                            <td>{{ $order->meterName ?? 'N/A' }}</td>
                            <td>{{ $order->responseAPI ?? 'N/A' }}</td>
                            <td>{{ $order->responseMessage ?? 'N/A' }}</td>
                            <td>{{ $order->token ?? 'N/A' }}</td>
                            <td>{{ $order->status ?? 'N/A' }}</td>
                            <td>{{ $order->created_at->format('d M, Y h:i A') }}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="{{ route('user.order.view', $order) }}">
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
</x-app-layout>
