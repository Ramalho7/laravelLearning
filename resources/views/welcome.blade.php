<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <a href="/">Index</a>
    <a href="/event/create">Event create</a>
    <a href="/products">Products</a>
    <a href="/product">Product</a>

    <h2>Buscar Produto</h2>
    <form action="/products" method="GET">
        <input type="text" name="search" placeholder="Digite o nome do produto">
        <button type="submit">Buscar</button>
    </form>
</body>
</html>