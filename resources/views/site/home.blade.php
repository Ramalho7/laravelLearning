@extends('layouts.layout')
@section('title', 'Home')
@section('content')

    <h1>Test</h1>

    {{-- isset (operador ternario) --}}

    {{-- Também é possível usar estruras de repetição/controle para mostrar conteudos desejados dentro da regra, também é possível usar o isset e empty --}}
    {{-- @auth testa se o usuário está autenticado e o seu inverso o @guest que retorna true se o user nao estiver autenticado --}}
    {{ isset($name) ? 'existe' : 'não existe' }}

    {{ $test ?? 'default'}}

    @include('component.message', ['title' => 'Nostrud sit Lorem voluptate nulla dolore aliqua ullamco.'])

    @component('partial.sidebar')
        @slot('paragraph')
            Mollit qui velit irure pariatur laborum in proident et ex.
        @endslot
    @endcomponent

@endsection