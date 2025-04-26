@extends('layouts.admin')

@section('content')
    <style>
        h2 {
            color: #4CAF50;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        p {
            font-size: 16px;
            color: #555;
            text-align: center;
        }
        .dashboard-container {
            margin: 20px auto;
            padding: 20px;
            max-width: 800px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>

    <div class="dashboard-container">
        <h2>Welcome to the Admin Dashboard</h2>
        <p>Manage pests and view system statistics here.</p>
    </div>
@endsection