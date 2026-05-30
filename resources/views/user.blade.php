@extends('layouts.user_template')

@section('content')

<div class="container p-5">
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
            Add New User
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover mt-3">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Fullname</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Created Date</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>  
                    <td class="text-center">{{ $user->id }}</td>
                    <td class="text-center">{{ $user->name }}</td>
                    <td class="text-center">{{ $user->email }}</td>
                    <td class="text-center">{{ $user->created_at ? $user->created_at->format('M d, Y') : 'N/A' }}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}">
                            Edit
                        </button>

                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}">
                            Delete
                        </button>
                    </td>  
                </tr>

                <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $user->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-dark">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editModalLabel{{ $user->id }}">Edit User Details</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/user/update/{{ $user->id }}" method="POST">
                                    @csrf

                                    <div class="mb-2">
                                        <label class="col-form-label fw-bold">Fullname:</label>
                                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                                    </div>

                                    <div class="mb-2">
                                        <label class="col-form-label fw-bold">Email:</label>
                                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                                    </div>
                                    
                                    <div class="modal-footer border-0 p-0 mt-3">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" style="padding: 5px 20px;">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-dark">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-danger">Confirm Delete</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="/user/delete/{{ $user->id }}">
                                    @csrf
                                    
                                    <p class="fs-6">Are you sure you want to delete <strong>{{ $user->name }}</strong>?</p>
                                    
                                    <div class="modal-footer border-0 p-0 mt-4">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger" style="padding: 5px 20px;">Yes, Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addModalLabel">Add New User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('users.add') }}">
                    @csrf 
                    
                    <div class="mb-2">
                        <label class="col-form-label fw-bold">Fullname:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-2">
                        <label class="col-form-label fw-bold">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    
                    <div class="modal-footer border-0 p-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="add_user" class="btn btn-primary" style="padding: 5px 20px;">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection