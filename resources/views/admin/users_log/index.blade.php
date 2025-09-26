<x-admin-layout>
    <div  class="container mt-4">
        <div class="card p-3 shadow-sm">
            <div class="table-responsive"> 
                <h5 class="text-color">User Logs</h5>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>UserID</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th>Timestamp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userLogs as $index => $userLog)     
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $userLog->id }}</td>
                            <td>{{ $userLog->username }}</td>
                            <td>
                                <span class="badge bg-{{ $userLog->status == 'Active' ? 'success' : 'danger' }}">
                                    {{ $userLog->status }}
                                </span>
                            </td>
                            <td>{{ $userLog->created_at }}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                        <img src="{{ asset('images/showIcon.png') }}" alt="" width="20">
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-start">
                                        <li><a class="dropdown-item text-color" href="{{ route('users_log.show', $userLog) }}"><i class="bi bi-eye"></i> View</a></li>
                                        <li><a class="dropdown-item text-color" href="{{ route('users_log.edit', $userLog)}}"><i class="bi bi-pencil"></i> Edit</a></li>
                                            <li><a class="dropdown-item text-danger" href="{{route('users_log.destroy', $userLog)}}" onclick="event.preventDefault();
                                            document.getElementById('delete-form').submit();"><i class="bi bi-box-arrow-right"></i> Delete</a>
                                        </li>
                                        <form id="delete-form" action="{{ route('users_log.destroy', $userLog)}}" method="POST" style="display: none">
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
    </div>
</x-admin-layout>