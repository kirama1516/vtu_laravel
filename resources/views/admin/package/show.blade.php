<x-admin-layout>
   <div class="note-container single-note">
        <div class="note-header">
            <h1 class="text-3xl py4">Package: {{ $package->created_at }}</h1>
            <div class="note-buttons">
                <a href="{{ route('package.edit', $package)}}" class="note-edit-button">Edit</a>
                <form action="{{ route('package.destroy', $package) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="note-delete-button">Delete</button>
                </form>            
            </div>
        </div>
        <div class="note">
            <div class="note-body">
                {{ $package->title }}
            </div>
            <div class="note-body">
                {{ $package->service->title }}
            </div>
            <div class="note-body">
                {{ $package->biller->title }}
            </div>
            <div class="note-body">
                {{ $package->category->title }}
            </div>
            <div class="note-body">
                {{ $package->api_code }}
            </div>
            <div class="note-body">
                {{ $package->size }}
            </div>
            <div class="note-body">
                {{ $package->validity }}
            </div>
            <div class="note-body">
                {{ $package->cost }}
            </div>
            <div class="note-body">
                {{ $package->price }}
            </div>
            <div class="note-body">
                {{ $package->status }}
            </div>
        </div>
   </div>
</x-admin-layout>