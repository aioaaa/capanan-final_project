@extends('layouts.todo_temp')

@section('content')

<div class="container p-5">
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
            Add New Product
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover mt-3">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Product Name</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Stock</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
    <tbody>
        @foreach($todos as $to_do)
            <tr>
                <td class="text-center">{{ $to_do->id }}</td>
                <td class="text-center">{{ $to_do->product_name }}</td>
                <td class="text-center">{{ $to_do->category }}</td>
                <td class="text-center">{{ $to_do->stock }}</td>
                <td class="text-center">{{ $to_do->price }}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $to_do->id }}">
                            Edit
                    </button>

                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $to_do->id }}">
                            Delete
                    </button>
                </td>
            </tr>
                
<div class="modal fade" id="editModal{{ $to_do->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel{{ $to_do->id }}">Edit Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/to_do/update/{{ $to_do->id }}" method="POST">
                    @csrf

                    <div class="mb-2">
                        <label class="col-form-label fw-bold">Product Name:</label>
                        <input type="text" name="product_name" value="{{ $to_do->product_name }}" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="col-form-label fw-bold">Category:</label>
                        <input type="text" name="category" value="{{ $to_do->category }}" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="col-form-label fw-bold">Stock:</label>
                        <input type="text" name="stock" value="{{ $to_do->stock }}" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="col-form-label fw-bold">Price:</label>
                        <input type="text" name="price" value="{{ $to_do->price }}" class="form-control" required>
                    </div>
                    <div class="modal-footer border-0 p-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" style="padding: 5px 20px;">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal{{ $to_do->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-dark">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-danger">Confirm Delete</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/to_do/delete/{{ $to_do->id }}" method="POST">
                                    @csrf
                                    
                                    <p class="fs-6">Are you sure you want to delete <strong>{{ $to_do->product_name }}</strong>?</p>
                                    
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
                <form method="POST" action="{{ route('add.todo') }}">
                    @csrf 
                    
                    <div class="mb-2">
                        <label class="col-form-label fw-bold">Product Name:</label>
                        <input type="text" name="product_name" class="form-control" required>
                    </div>

                    <div class="mb-2">
                        <label class="col-form-label fw-bold">Category:</label>
                        <input type="text" name="category" class="form-control" required>
                    </div>

                    <div class="mb-2">
                        <label class="col-form-label fw-bold">Stock:</label>
                        <input type="text" name="stock" class="form-control" required>
                    </div>

                    <div class="mb-2">
                        <label class="col-form-label fw-bold">Price:</label>
                        <input type="text" name="price" class="form-control" required>
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