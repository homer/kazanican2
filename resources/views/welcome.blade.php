<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sipariş Sayfası</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <style>
            body {
                font-family: 'Figtree';
            }
        </style>
        <!-- Styles -->
    </head>
    <body>
        <h1>Sipariş Sayfası</h1>

        <form action="{{ route('order') }}" method="POST">
            @csrf
            <input type="hidden" name="userId" value="1">
            Ömer'den Sipariş
            <input type="text" name="amount" placeholder="ör. 1000">
            <input type="submit" value="Sipariş Ver">
        </form>

        <br><br><br>
        <form action="{{ route('order') }}" method="POST">
            @csrf
            <input type="hidden" name="userId" value="2">
            Sinan'dan Sipariş
            <input type="text" name="amount" placeholder="ör. 1000">
            <input type="submit" value="Sipariş Ver">
        </form>
    </body>
</html>
