@extends('layouts.layout')
@section('title', 'Produto')
@section('content')

<style>
    .product-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 2rem;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .product-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        align-items: start;
    }

    .product-image {
        text-align: center;
    }

    .product-image img {
        width: 100%;
        max-width: 400px;
        height: 300px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .no-image {
        width: 100%;
        height: 300px;
        background: #f8f9fa;
        border: 2px dashed #dee2e6;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6c757d;
        font-size: 1.1rem;
    }

    .product-info h1 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 1rem;
    }

    .product-price {
        font-size: 2rem;
        font-weight: bold;
        color: #007bff;
        margin-bottom: 1.5rem;
    }

    .product-detail {
        margin-bottom: 1.5rem;
    }

    .product-detail h3 {
        font-size: 1.2rem;
        font-weight: 600;
        color: #555;
        margin-bottom: 0.5rem;
    }

    .product-detail p {
        color: #666;
        line-height: 1.6;
    }

    .product-meta {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #eee;
    }

    .meta-item {
        background: #f8f9fa;
        padding: 1rem;
        border-radius: 6px;
    }

    .meta-label {
        font-weight: 600;
        color: #555;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }

    .meta-value {
        font-size: 1.1rem;
        color: #333;
    }

    .back-button {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background-color: #6c757d;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        margin-bottom: 2rem;
        transition: background-color 0.3s ease;
    }

    .back-button:hover {
        background-color: #5a6268;
        color: white;
    }

    @media (max-width: 768px) {
        .product-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .product-meta {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="product-container">
    <a href="/" class="back-button">← Voltar</a>
    
    @if(isset($product))
        <div class="product-grid">
            <!-- Imagem do Produto -->
            <div class="product-image">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                @else
                    <div class="no-image">
                        <span>Sem imagem disponível</span>
                    </div>
                @endif
            </div>

            <!-- Informações do Produto -->
            <div class="product-info">
                <h1>{{ $product->name }}</h1>
                
                <div class="product-price">
                    R$ {{ number_format($product->price, 2, ',', '.') }}
                </div>

                @if($product->subdescription)
                    <div class="product-detail">
                        <h3>Descrição Resumida</h3>
                        <p>{{ $product->subdescription }}</p>
                    </div>
                @endif

                @if($product->mainDescripstion)
                    <div class="product-detail">
                        <h3>Descrição Completa</h3>
                        <p>{{ $product->mainDescripstion }}</p>
                    </div>
                @endif

                <!-- Metadados -->
                <div class="product-meta">
                    <div class="meta-item">
                        <div class="meta-label">Quantidade em Estoque</div>
                        <div class="meta-value">{{ $product->qty }} unidades</div>
                    </div>

                    <div class="meta-item">
                        <div class="meta-label">Categoria</div>
                        <div class="meta-value">
                            @if($product->category)
                                {{ $product->category->name }}
                            @else
                                Não informada
                            @endif
                        </div>
                    </div>

                    @if($product->user)
                        <div class="meta-item">
                            <div class="meta-label">Criado por</div>
                            <div class="meta-value">{{ $product->user->name }}</div>
                        </div>
                    @endif

                    <div class="meta-item">
                        <div class="meta-label">Data de Criação</div>
                        <div class="meta-value">{{ $product->created_at->format('d/m/Y H:i') }}</div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div style="text-align: center; padding: 3rem;">
            <h2>Produto não encontrado</h2>
            <p>O produto que você está procurando não existe ou foi removido.</p>
            <a href="/" class="back-button">← Voltar para página inicial</a>
        </div>
    @endif
</div>

@endsection