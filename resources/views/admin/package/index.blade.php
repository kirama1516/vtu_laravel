<x-admin-layout>
    <div class="container mt-5">
        <h2 class="text-color text-center">Manage Packages</h2>        
        <form method="POST" action="{{ route('package.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Biller<span class="text-danger">*</span></label>
                        <select name="biller_id" class="form-control" required>
                            <option value="">Select a biller</option>
                            @foreach ($billers as $biller):
                                <option value="{{ $biller->id }}">{{ $biller->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Title<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Service<span class="text-danger">*</span></label>
                        <select name="service_id" class="form-control" required>
                            <option value="">Select a service</option>
                            @foreach ($services as $service):
                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                            @endforeach;
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">Select a category</option>
                            @foreach ($categories as $category): ?>
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Api Code<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="api_code" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Size</label>
                        <input type="text" class="form-control" name="size">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Validity (Days)</label>
                        <input type="number" class="form-control" name="validity">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Cost Price<span class="text-danger">*</span></label>
                        <input type="number" step="0.01" class="form-control" name="cost" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Selling Price<span class="text-danger">*</span></label>
                        <input type="number" step="0.01" class="form-control" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <a href="{{ route('package.index') }}" class="btn btn-danger">Cancel</a>
                    <button class="btn btn-button">Add Category</button>
                </div>
            </div>
        </form>
        <div class="table-responsive mt-5 p-3">        
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#ID</th>
                        <th>Title</th>
                        <th>Biller</th>
                        <th>Service</th>
                        <th>Category</th>
                        <th>Api_code</th>
                        <th>Size</th>
                        <th>Validity</th>
                        <th>Cost</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($packages) > 0)
                        {{-- @foreach ($packages as $index => $package) --}}
                        @foreach ($packages as $package)
                            <tr>
                                {{-- <td>{{ $index + 1 }}</td> --}}
                                <td>PKG{{ $package->id }}</td>
                                <td>{{ $package->title }}</td>
                                <td>{{ $package->biller->title }}</td>
                                <td>{{ $package->service->title }}</td>
                                <td>{{ $package->category->title }}</td>
                                <td>{{ $package->api_code }}</td>
                                <td>{{ $package->size }}</td>
                                <td>{{ $package->validity }} Days</td>
                                <td>₦{{ $package->cost }}</td>
                                <td>₦{{ $package->price }}</td>
                                <td>
                                    <span class="badge bg-{{ $package->status == 'Active' ? 'success' : 'danger' }}">
                                        {{ $package->status }}
                                    </span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <img src="{{ asset('images/showIcon.png') }}" alt="" width="20">
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li><a class="dropdown-item text-color" href="{{ route('package.show', $package) }}"><i class="bi bi-eye"></i> View</a></li>
                                            <li><a class="dropdown-item text-color" href="{{ route('package.edit', $package)}}"><i class="bi bi-pencil"></i> Edit</a></li>
                                                <li><a class="dropdown-item text-danger" href="{{route('package.destroy', $package)}}" onclick="event.preventDefault();
                                                document.getElementById('delete-form').submit();"><i class="bi bi-box-arrow-right"></i> Delete</a>
                                            </li>
                                            <form id="delete-form" action="{{ route('package.destroy', $package)}}" method="POST" style="display: none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="20" class="text-center">No packages found.</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
