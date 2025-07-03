@extends('layouts.layout')
@section('title', 'Lista de Produtos')
@section('content')

<style>
    .products-container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 2rem;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .page-title {
        font-size: 2.5rem;
        font-weight: bold;
        color: #333;
    }

    .add-button {
        padding: 0.75rem 1.5rem;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .add-button:hover {
        background-color: #0056b3;
        color: white;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
    }

    .product-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .product-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        background: #f8f9fa;
    }

    .no-image {
        width: 100%;
        height: 200px;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6c757d;
        font-size: 1rem;
    }

    .product-info {
        padding: 1.5rem;
    }

    .product-name {
        font-size: 1.3rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 0.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-price {
        font-size: 1.5rem;
        font-weight: bold;
        color: #007bff;
        margin-bottom: 1rem;
    }

    .product-description {
        color: #666;
        line-height: 1.5;
        margin-bottom: 1rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        font-size: 0.9rem;
        color: #666;
    }

    .view-button {
        width: 100%;
        padding: 0.75rem;
        background-color: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        text-align: center;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .view-button:hover {
        background-color: #218838;
        color: white;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #666;
    }

    .empty-state h3 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .success-message {
        background-color: #d4edda;
        color: #155724;
        padding: 1rem;
        border-radius: 6px;
        margin-bottom: 2rem;
        border: 1px solid #c3e6cb;
    }
</style>

<div class="products-container">
    <!-- Header da página -->
    <div class="page-header">
        <h1 class="page-title">Lista de Produtos</h1>
        <a href="/product/create" class="add-button">+ Adicionar Produto</a>
    </div>

    <!-- Mensagem de sucesso -->
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <!-- Lista de produtos -->
    @if($products->count() > 0)
        <div class="products-grid">
            @foreach($products as $product)
                <div class="product-card">
                    <!-- Imagem do produto -->
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                    @else
                        <div class="no-image">
                            <span>Sem imagem</span>
                        </div>
                    @endif

                    <!-- Informações do produto -->
                    <div class="product-info">
                        <h3 class="product-name">{{ $product->name }}</h3>
                        
                        <div class="product-price">
                            R$ {{ number_format($product->price, 2, ',', '.') }}
                        </div>

                        @if($product->subdescription)
                            <p class="product-description">{{ $product->subdescription }}</p>
                        @endif

                        <div class="product-meta">
                            <span>Estoque: {{ $product->qty }}</span>
                            @if($product->category)
                                <span>{{ $product->category->name }}</span>
                            @endif
                        </div>

                        <a href="/product/{{ $product->id }}" class="view-button">Ver Detalhes</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Estado vazio -->
        <div class="empty-state">
            <h3>Nenhum produto encontrado</h3>
            <p>Ainda não há produtos cadastrados. Que tal criar o primeiro?</p>
            <a href="/product/create" class="add-button" style="display: inline-block; margin-top: 1rem;">Criar Produto</a>
        </div>
    @endif
</div>

@endsection
