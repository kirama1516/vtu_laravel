<x-admin-layout>
    <div class="container mt-5">
        <h2 class="text-color">Add New Biller</h2>
        <form action="{{ route('biller.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Biller Title<span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Service<span class="text-danger">*</span></label>
                <select name="service_id" class="form-control" required>
                    <option value="">Select a Service</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Biller Logo</label>
                <input type="file" name="logo" class="form-control">
            </div>

            <!-- Variation Dropdown -->
            <div class="mb-3">
                <label class="form-label">Variation</label>
                <select name="variation" class="form-control">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>

            <div class="mb-3 text-center">
                <a href="{{ route('biller.index') }}" class="btn btn-danger">Cancel</a>
                <button class="btn btn-button">Add Biller</button>
            </div>
        </form>
        <div class="table-responsive mt-5 p-3">        
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#ID</th>
                        <th>Title</th>
                        <th>Service</th>
                        <th>Variation</th>
                        <th>Logo</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($billers as $biller)    
                        <tr>
                            <td>BL{{ $biller->id }}</td>
                            <td>{{ $biller->title }}</td>
                            <td>{{ $biller->service->title ?? ""}}</td>
                            <td>{{ $biller->variation }}</td>
                            <td><img src="{{ $biller->logo}}" width="50"></td>
                            <td>{{ $biller->status}}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                        <img src="{{ asset('images/showIcon.png') }}" alt="" width="20">
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-start">
                                        <li><a class="dropdown-item text-color" href="{{ route('biller.show', $biller) }}"><i class="bi bi-eye"></i> View</a></li>
                                        <li><a class="dropdown-item text-color" href="{{ route('biller.edit', $biller)}}"><i class="bi bi-pencil"></i> Edit</a></li>
                                            <li><a class="dropdown-item text-danger" href="{{route('biller.destroy', $biller)}}" onclick="event.preventDefault();
                                            document.getElementById('delete-form').submit();"><i class="bi bi-box-arrow-right"></i> Delete</a>
                                        </li>
                                        <form id="delete-form" action="{{ route('biller.destroy', $biller)}}" method="POST" style="display: none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>