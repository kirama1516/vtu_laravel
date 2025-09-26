<x-admin-layout>
    <div class="container mt-5">
        <h2 class="text-color">Edit Biller</h2>
        <form  action="{{ route('biller.update', $biller)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Biller Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $biller->title) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Biller Logo</label>
                <input type="file" name="logo" value="{{ old('logo', $biller->logo)}}" class="form-control">
            </div>
              <!-- Variation Dropdown -->
              <div class="mb-3">
                <label class="form-label">Variation</label>
                <select name="variation" class="form-control">
                    <option value="{{ old('variation', $biller->id)}}">{{ $biller->variation }}</option>
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
                    <option value="active" {{ old('status', $biller->status) === 'active' ? 'selected' : ''}}>Active</option>
                    <option value="inactive" {{ old('status', $biller->status) === 'inactive' ? 'selected' : ''}}>Inactive</option>
                </select>
            </div>
            <a href="{{ route('biller.index') }}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-success">Update biller</button>
        </form>
    </div>
</x-admin-layout>