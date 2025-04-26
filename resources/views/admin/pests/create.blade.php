@extends('layouts.admin')

@section('content')
<h1 style="text-align: center; font-family: Arial, sans-serif; color: #333;">Add Pest</h1>
<form action="{{ route('pests.store') }}" method="POST" style="max-width: 500px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background-color: #f9f9f9;">
    @csrf
    <div style="margin-bottom: 15px;">
        <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Name:</label>
        <input type="text" name="name" id="name" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="city" style="display: block; font-weight: bold; margin-bottom: 5px;">City:</label>
        <input type="text" name="city" id="city" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
    <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">Add Pest</button>
</form>
@endsection