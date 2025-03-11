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
        <h2 class="text-2xl font-bold mb-6 text-center">Inscription</h2>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="mb-4">
        <label for="name" class="block text-gray-700">Nom</label>
        <input type="text" name="name" value="{{ old('name') }}" id="name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    </div>
    <div class="mb-4">
        <label for="email" class="block text-gray-700">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    </div>
    <div class="mb-6">
        <label for="password" class="block text-gray-700">Mot de passe</label>
        <input type="password" name="password" id="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    </div>
    <div class="mb-6">
        <label for="password_confirmation" class="block text-gray-700">Confirmer le Mot de passe</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    </div>
    
    <div class="mb-6">
        <label for="devise" class="block text-gray-700">Devise</label>
        <select name="devise" id="devise" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="XOF">XOF</option>
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="GBP">GBP</option>
            <option value="JPY">JPY</option>
            <option value="AUD">AUD</option>
            <option value="CAD">CAD</option>
            <option value="CHF">CHF</option>
            <option value="CNY">CNY</option>
            <option value="INR">INR</option>
            <option value="MXN">MXN</option>
            <option value="BRL">BRL</option>
            <option value="RUB">RUB</option>
            <option value="SEK">SEK</option>
            <option value="NOK">NOK</option>
            <option value="SGD">SGD</option>
            <option value="HKD">HKD</option>
            <option value="ZAR">ZAR</option>
            <option value="KRW">KRW</option>
            <option value="TRY">TRY</option>
            <option value="DHR">DHR</option>
        </select>
    </div>

    <h2 class="flex items-center justify-center mb-3">
        Vous avez déjà un compte? 
        <p><a href="{{ route('login') }}" class="ml-2 underline underline-offset-1">Connexion</a></p>
    </h2>
    <button type="submit" class="w-full text-white py-2 px-4 rounded-lg bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
        S'inscrire
    </button>
</form>

    </div>
</body>
</html>
