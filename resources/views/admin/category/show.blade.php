<x-admin-layout>
   <div class="container mt-5">
        <div class="note-header">
            <h1 class="text-color text-3xl py4">Category: {{ $category->created_at }}</h1>
            <div class="d-flex gap-3">
                <a href="{{ route('category.edit', $category)}}" class="btn btn-success">Edit</a>
                <form action="{{ route('category.destroy', $category) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>            
            </div>
        </div>
        <div class="note">
             <div class="note-body">
                {{ $category->id }}
            </div>
             <div class="note-body">
                {{ $category->service->title }}
            </div>
            <div class="note-body">
                {{ $category->title }}
            </div>
            <div class="note-body">
                {{ $category->status }}
            </div>
        </div>
   </div>
</x-admin-layout>