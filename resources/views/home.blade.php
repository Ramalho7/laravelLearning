@extends('layouts.layout')
@section('title','Home')
@section('content')

<h1>Test</h1>

{{-- isset (operador ternario) --}}

{{ isset($name) ? 'existe' : 'não existe' }}

{{ $test ?? 'default'}}

@endsection