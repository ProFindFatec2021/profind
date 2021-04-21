<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro @yield('tipo-cadastro') | ProFind</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            text-align: center
        }

        .content {
            max-width: 600px;
            width: 80%;
            display: flex;
            flex-direction: column;
            background: #f5f5f5;
            padding: 5rem
        }

        h1,
        h2 {
            margin: .5rem 0;
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        input {
            width: calc(100% - 2rem);
            margin: .5rem 0;
            padding: .5rem 1rem;
        }

        li {
          color: red;
        }
    </style>
</head>

<body style="background-color: #333" class="antialiased">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="content">
        <h1>Profind</h1>
        <h2>Cadastro @yield('tipo-cadastro')</h2>
        @yield('form')
    </div>
</body>

</html>