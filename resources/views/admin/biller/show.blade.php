<x-admin-layout>
   <div class="note-container single-note">
        <div class="note-header">
            <h1 class="text-3xl py4">Biller: {{ $biller->created_at }}</h1>
            <div class="note-buttons">
                <a href="{{ route('biller.edit', $biller)}}" class="note-edit-button">Edit</a>
                <form action="{{ route('biller.destroy', $biller) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="note-delete-button">Delete</button>
                </form>            
            </div>
        </div>
        <div class="note">
            <div class="note-body">
                {{ $biller->title }}
            </div>
            <div class="note-body">
                {{ $biller->service->title }}
            </div>
            <div class="note-body">
                {{ $biller->variation }}
            </div>
            <div class="note-body">
                {{ $biller->logo }}
            </div>
            <div class="note-body">
                {{ $biller->status }}
            </div>
        </div>
   </div>
</x-admin-layout>