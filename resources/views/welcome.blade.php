<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BuscaPet</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-image: url('https://uswalldecor.com/cdn/shop/products/PSW1461RL.jpg?v=1666621849');
            color: #334155;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            text-align: center;
            width: 90%;
            max-width: 400px;
        }

        h1 {
            font-size: 2.5rem;
            color: #f59342;
            margin-bottom: 1.5rem;
        }

        .logo {
            max-width: 100px;
            margin-bottom: 1rem;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 0.75rem;
            margin-top: 1rem;
            border-radius: 10px;
            background-color: #f59342; 
            color: #fff;
            font-size: 1.25rem;
            font-weight: 600;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #e5722c;
        }

        .auth-links {
            margin-top: 2rem;
        }

        .auth-links a {
            color: #f59342;
            text-decoration: none;
            font-weight: 600;
            margin: 0 0.5rem;
        }

        .auth-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="https://cdn-icons-png.flaticon.com/512/21/21545.png" class="logo">
        <h1>BuscaPet</h1>
        <div class="auth-links">
            @auth
                <a href="{{ url('/dashboard') }}">Tela Inicial</a>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn">Sair da Conta</button>
                </form>
            @else
                <a href="{{ route('login') }}">Entrar</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Cadastrar</a>
                @endif
            @endauth
        </div>
    </div>
</body>
</html>
