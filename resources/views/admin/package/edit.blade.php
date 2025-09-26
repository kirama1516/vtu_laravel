<x-admin-layout>
     <div class="container mt-5">
        <h2 class="text-color">Edit Category</h2>
        <form action="{{ route('category.update', $category)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Category Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $category->title) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="active" {{ old('status', $category->status) === 'active' ? 'selected' : ''}}>Active</option>
                    <option value="inactive" {{ old('status', $category->status) === 'inactive' ? 'selected' : ''}}>Inactive</option>
                </select>
            </div>
            <a href="{{ route('category.index') }}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-success">Update biller</button>
        </form>
    </div>  
</x-admin-layout>
