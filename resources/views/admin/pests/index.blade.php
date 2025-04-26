
@extends('layouts.admin')

@section('content')

<a href="{{ route('pests.create') }}" class="btn btn-primary">Add Pest</a>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th style="text-align: left; padding: 10px;">City</th> <th>Actions</th>
        </tr>
    </thead>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        form {
            display: inline;
        }

        button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #c82333;
        }
    </style> @foreach ($pests as $pest)
        <tr>
            <td>{{ $pest->name }}</td>
            <td>{{ $pest->city }}</td>
            <td>
                <a href="{{ route('pests.edit', $pest) }}">Edit</a>
                <form action="{{ route('pests.destroy', $pest) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection