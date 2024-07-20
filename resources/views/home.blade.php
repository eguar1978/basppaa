<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('{{ asset('storage/beer-253791_1920.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .container {
            text-align: center;
            height: 80%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
        }

        .logo {
            max-height: 80%;
            max-width: 100%;
            margin: auto;
        }

        .links {
            margin-top: 20px;
        }

        .links a {
            margin: 0 10px;
            padding: 10px 20px;
            color: #fff;
            background-color: #636b6f;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .links a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('storage/ELaBirra-Logo.svg') }}" alt="Logo" class="logo">
        <div class="links">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>
</body>
</html>
