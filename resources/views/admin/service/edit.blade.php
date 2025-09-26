<x-admin-layout>
     <div class="container mt-5">
        <h2 class="text-color">Edit Service</h2>
        <form action="{{ route('service.update', $service)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Service Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $service->title) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="active" {{ old('status', $service->status) === 'active' ? 'selected' : ''}}>Active</option>
                    <option value="inactive" {{ old('status', $service->status) === 'inactive' ? 'selected' : ''}}>Inactive</option>
                </select>
            </div>
            <a href="{{ route('service.index') }}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-success">Update biller</button>
        </form>
    </div>  
</x-admin-layout>
