<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/portefeuille (1).png">
    <title>E-WALLET</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Connexion</h2>
        <form method="POST" action="{{ route('login') }}">
        @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700">Mot de passe</label>
                <input type="password" name="password" id="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <button type="submit" class="w-full text-white py-2 px-4 rounded-lg bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600">Se Connecter</button>
        </form>
        <h2 class="flex items-center justify-center mb-3 mt-5">Vous n'avez pas de compte? <p><a href="{{ route('register') }}" class="ml-2 underline underline-offset-1">Inscription</a></p></h2>
    </div>
</body>
</html>
