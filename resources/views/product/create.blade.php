@extends('layouts.layout')
@section('title', 'Create a product')
@section('content')

<style>
    .form-container {
        max-width: 600px;
        margin: 2rem auto;
        padding: 2rem;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .form-title {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 2rem;
        text-align: center;
        color: #333;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #555;
    }

    .form-input, .form-textarea {
        width: 100%;
        padding: 0.75rem;
        border: 2px solid #ddd;
        border-radius: 4px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    .form-input:focus, .form-textarea:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
    }

    .form-textarea {
        resize: vertical;
        min-height: 100px;
    }

    .form-button {
        width: 100%;
        padding: 1rem;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .form-button:hover {
        background-color: #0056b3;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }
</style>

<div class="form-container">
    <h1 class="form-title">Create Product</h1>
    
    <form action="/products" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" id="name" class="form-input" required>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="qty" class="form-label">Quantity</label>
                <input type="number" name="qty" id="qty" class="form-input" min="0" required>
            </div>

            <div class="form-group">
                <label for="price" class="form-label">Price ($)</label>
                <input type="number" name="price" id="price" class="form-input" step="0.01" min="0" required>
            </div>
        </div>

        <div class="form-group">
            <label for="subdescription" class="form-label">Short Description</label>
            <textarea name="subdescription" id="subdescription" class="form-textarea" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="mainDescripstion" class="form-label">Full Description</label>
            <textarea name="mainDescripstion" id="mainDescripstion" class="form-textarea" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label for="id_category" class="form-label">Category</label>
            <select name="id_category" id="id_category" class="form-input" required>
                <option value="">Select a category</option>
                @foreach(\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" name="image" id="image" class="form-input" accept="image/*">
        </div>

        <button type="submit" class="form-button">Create Product</button>
    </form>
</div>

@endsection