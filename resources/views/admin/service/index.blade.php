<x-admin-layout>
    <div class="container mt-4">
        <div class="card p-3 shadow-sm mb-4">
            <h5 class="text-color">Manage Services</h5>
            <!-- Add New Service Form -->
            <form action="{{ route('service.store')}}" method="POST" class="mb-4">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" name="title" class="form-control" placeholder="Service Title (e.g., Data, Airtime)" required>
                    </div>
                    <div class="col-md-6">
                        <select name="status" class="form-control">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <a href="{{ route('service.index' )}}" class="btn btn-danger">Cancel</a>
                    <button class="btn btn-button">Add Service</button>
                </div>
            </form>

            <!-- Services Table -->
            <div class="table-responsive">        
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>{{ $service->title }}</td>
                                <td>{{ $service->status }}</td>
                                <td>{{ $service->created_at}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <img src="{{ asset('images/showIcon.png') }}" alt="" width="20">
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li><a class="dropdown-item text-color" href="{{ route('service.show', $service) }}"><i class="bi bi-eye"></i> View</a></li>
                                            <li><a class="dropdown-item text-color" href="{{ route('service.edit', $service)}}"><i class="bi bi-pencil"></i> Edit</a></li>
                                             <li><a class="dropdown-item text-danger" href="{{route('service.destroy', $service)}}" onclick="event.preventDefault();
                                                document.getElementById('delete-form').submit();"><i class="bi bi-box-arrow-right"></i> Delete</a>
                                            </li>
                                            <form id="delete-form" action="{{ route('service.destroy', $service)}}" method="POST" style="display: none">
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
    </div>
</x-admin-layout>
