<x-admin-layout>
     <div class="container mt-5">
        <h2 class="text-color">Edit Users_log</h2>
        <form action="{{ route('users_log.update', $user)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">users_log Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $user->title) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="active" {{ old('status', $user->status) === 'active' ? 'selected' : ''}}>Active</option>
                    <option value="inactive" {{ old('status', $user->status) === 'inactive' ? 'selected' : ''}}>Inactive</option>
                </select>
            </div>
            <a href="{{ route('users_log.index') }}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-success">Update biller</button>
        </form>
    </div>  
</x-admin-layout>
