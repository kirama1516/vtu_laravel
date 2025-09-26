<x-admin-layout>
   <div class="note-container single-note">
        <div class="note-header">
            <h1 class="text-3xl py4">User: {{ $user->created_at }}</h1>
            <div class="note-buttons">
                <a href="{{ route('users_log.edit', $user)}}" class="note-edit-button">Edit</a>
                <form action="{{ route('users_log.destroy', $user) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="note-delete-button">Delete</button>
                </form>            
            </div>
        </div>
        <div class="note">
            {{-- <div class="note-body">
                {{ $user->title }}
            </div>
            <div class="note-body">
                {{ $user->service->title }}
            </div>
            <div class="note-body">
                {{ $user->biller->title }}
            </div>
            <div class="note-body">
                {{ $user->category->title }}
            </div>
            <div class="note-body">
                {{ $user->api_code }}
            </div>
            <div class="note-body">
                {{ $user->size }}
            </div>
            <div class="note-body">
                {{ $user->validity }}
            </div>
            <div class="note-body">
                {{ $user->cost }}
            </div>
            <div class="note-body">
                {{ $user->price }}
            </div>
            <div class="note-body">
                {{ $user->status }}
            </div> --}}
        </div>
   </div>
</x-admin-layout>