<x-admin-layout>
    <div class="container mt-4">
        <div class="card p-3 shadow-sm mb-4">
            <h5 class="text-color">Manage Services</h5>

            <!-- Add New Service Form -->
            <form method="POST" class="mb-4">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" name="title" class="form-control" placeholder="Service Title (e.g., Data, Airtime)" required>
                    </div>
                    <div class="col-md-6">
                        <select name="status" class="form-control">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <button type="submit" name="add_service" class="btn btn-service">Add Service</button>
            </form>

            <!-- Services Table -->
            <div class="table-responsive">        
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
