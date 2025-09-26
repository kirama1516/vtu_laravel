<x-admin-layout>
     <div class="container mt-5">
        <h2 class="text-center text-color">Manage Categories</h2>
        <form action="{{ route('category.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="mb-3">
                <label>Service:</label>
                <select name="service_id" class="form-control mb-2" required>
                    <option value="">Select a service</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Biller:</label>
                <select name="biller_id" class="form-control mb-2" required>
                    <option value="">Select a biller</option>
                    @foreach ($billers as $biller)
                        <option value="{{ $biller->id }}">{{ $biller->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Category Title:</label>
                <input type="text" name="title" class="form-control mb-2" required>
            </div>
           
            <div class="mb-3">
                <label>Status:</label>
                <select name="status" class="form-control mb-2">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>

            <div class="mb-3 text-center">
                <a href="{{ route('category.index') }}" class="btn btn-danger">Cancel</a>
                <button class="btn btn-button">Add Category</button>
            </div>
        </form>

        <!-- Categories Table -->
        <div class="table-responsive mt-5 p-3">        
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#ID</th>
                        <th>Service</th>
                        <th>Title</th>
                        <th>MTN</th>
                        <th>Airtel</th>
                        <th>9mobile</th>
                        <th>Glo</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $categories as $category ) 
                        <tr>
                            <td>CTG{{ $category->id }}</td>
                            <td>{{ $category->service->title ?? "" }}</td>
                            <td>{{ $category->title }}</td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input toggle-switch" type="checkbox" 
                                        data-id="{{ $category->id }}" 
                                        data-column="mtn" 
                                        {{ $category->mtn ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input toggle-switch" type="checkbox" 
                                        data-id="{{ $category->id }}" 
                                        data-column="airtel" 
                                        {{ $category->airtel ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input toggle-switch" type="checkbox" 
                                        data-id="{{ $category->id }}" 
                                        data-column="9mobile" 
                                        {{ $category->{'9mobile'} ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input toggle-switch" type="checkbox" 
                                        data-id="{{ $category->id }}" 
                                        data-column="glo" 
                                        {{ $category->glo ? 'checked' : '' }}>
                                </div>
                            </td>
                           <td>
                                @if((bool)($category->status ?? false))
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>

                            <td>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                        <img src="{{ asset('images/showIcon.png') }}" alt="" width="20">
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-start">
                                        <li><a class="dropdown-item text-color" href="{{ route('category.show', $category) }}"><i class="bi bi-eye"></i> View</a></li>
                                        <li><a class="dropdown-item text-color" href="{{ route('category.edit', $category)}}"><i class="bi bi-pencil"></i> Edit</a></li>
                                            <li><a class="dropdown-item text-danger" href="{{route('category.destroy', $category)}}" onclick="event.preventDefault();
                                            document.getElementById('delete-form').submit();"><i class="bi bi-box-arrow-right"></i> Delete</a>
                                        </li>
                                        <form id="delete-form" action="{{ route('category.destroy', $category)}}" method="POST" style="display: none">
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