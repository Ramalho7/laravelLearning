@if(isset($id) && $id !== null)
<p>Id produto: {{ $id }}</p>
@else
<p>Id nulo ou não encontrado</p>
@endif