<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    h1 {
        text-align: center;
    }

    table {
        width: 60%;
        border-collapse: collapse;
        margin: 20px auto;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #3498db;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #d1ecf1;
    }

    td {
        border: 1px solid #ddd;
    }
</style>
@extends('layouts.app')

@section('content')
    <h1>Pest Alerts</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>City</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pests as $pest)
                <tr>
                    <td>{{ $pest->name }}</td>
                    <td>{{ $pest->city }}</td>
                    <td>{{ $pest->created_at->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No pests found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection