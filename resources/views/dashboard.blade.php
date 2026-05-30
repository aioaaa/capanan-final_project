@extends('layouts.user_template')

@section('content')

<div class="container p-4 text-center">
    <h1>Welcome, {{ session('user')->name }}!</h1>

</div>

<div class="row mt-4">
    <div class="col-md-6 mb-4">
        <div class="card p-3 shadow-sm">
        <canvas id="myChart"></canvas>
    </div>
</div>

<div class="col-md-6">
    <div class="row">
        <div class="col-12 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5>Total Users</h5>
                    <h2>{{ $usercount }}</h2>
                </div>
            </div>
        </div>

    <div class="col-12">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5>Total To-Do List</h5>
                <h2>{{ $todocount }}</h2>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Users', 'Tasks'],
            datasets: [{
                label: 'System Data',
                data: [{{ $usercount }}, {{ $todocount }}],
                backgroundColor: [
                        '#0d6efd', 
                        '#198754'  
                    ]
            }]
        }
    });
</script>
@endsection