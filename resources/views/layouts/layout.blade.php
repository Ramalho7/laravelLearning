<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #f8f9fa;
            padding: 1rem;
            border-bottom: 1px solid #dee2e6;
        }

        nav {
            display: flex;
            gap: 2rem;
        }

        nav a {
            text-decoration: none;
            color: #007bff;
            font-weight: 500;
        }

        nav a:hover {
            color: #0056b3;
        }

        main {
            flex: 1;
            padding: 2rem;
        }

        footer {
            display: flex;
            gap: 2rem;
            background-color: #f8f9fa;
            padding: 1rem;
            border-top: 1px solid #dee2e6;
            margin-top: auto;
        }

        footer a {
            text-decoration: none;
            color: #007bff;
            font-weight: 500;
        }

        footer a:hover {
            color: #0056b3;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        <nav>
            <a href="/">Index</a>
            <a href="/event/create">Event create</a>
            <a href="/products">Products</a>
            <a href="/product">Product</a>
        </nav>
    </header>

    @yield('content')

    <footer>
        <a href="/">Index</a>
        <a href="#">Brand name</a>
        <a href="/event/create">Teste</a>
        <a href="/products">Teste</a>
        <a href="/product">Teste</a>
    </footer>
</body>

</html>