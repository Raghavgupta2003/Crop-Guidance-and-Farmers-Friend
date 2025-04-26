@extends('layouts.admin')

@section('content')
<h2 style="text-align: center; font-size: 24px; color: #333; margin-bottom: 20px;">Edit Pest</h2>
<form action="{{ route('pests.update', $pest) }}" method="POST">
    @csrf
    @method('PUT')
    <style>
        form {
            display: flex;
            flex-direction: column;
            max-width: 400px;
            margin: 0 auto;
        }
        label {
            margin-top: 10px;
            font-weight: bold;
        }
        input {
            margin-bottom: 15px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ $pest->name }}" required>
    <label for="city">City:</label>
    <input type="text" name="city" id="city" value="{{ $pest->city }}" required>
    <button type="submit">Update Pest</button>
</form>
@endsection