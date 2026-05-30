@extends('layouts.main')

@section('content')

<button type="button" class="btn btn-danger btn-sm"
data-bs-toggle="modal" data-bs-target="#deleteModal{{ $todo->id }}">
    Delete
</button>