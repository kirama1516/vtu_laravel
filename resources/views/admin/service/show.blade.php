<x-admin-layout>
   <div class="note-container single-note">
        <div class="note-header">
            <h1 class="text-3xl py4">Service: {{ $service->created_at }}</h1>
            <div class="note-buttons">
                <a href="{{ route('service.edit', $service)}}" class="note-edit-button">Edit</a>
                <form action="{{ route('service.destroy', $service) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="note-delete-button">Delete</button>
                </form>            
            </div>
        </div>
        <div class="note">
            <div class="note-body">
                {{ $service->title }}
            </div>
            <div class="note-body">
                {{ $service->status }}
            </div>
        </div>
   </div>
</x-admin-layout>