<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-WALLET</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="images/portefeuille (1).png">
</head>
<body>
<form action="{{ route('creerGroupe') }}" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
    @csrf
    <h2 class="text-2xl font-bold text-gray-700 mb-4 text-center">Créer un Groupe</h2>

    
    <div class="mb-4">
        <label class="block text-gray-600 text-sm font-medium mb-2">Nom du groupe</label>
        <input type="text" name="name" required class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
    </div>

    
    <div class="mb-4">
        <label class="block text-gray-600 text-sm font-medium mb-2">Description</label>
        <textarea name="description" rows="3" class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200"></textarea>
    </div>

    
        <label class="block text-gray-600 text-sm font-medium mb-2">Montant</label>
        <input type="number" name="montant" required class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
    </div>

    
    <div class="mb-4">
        <label class="block text-gray-600 text-sm font-medium mb-2">Périodicité</label>
        <select name="periodicite" class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
            <option value="quotidienne">Quotidienne</option>
            <option value="hebdomadaire">Hebdomadaire</option>
            <option value="mensuelle">Mensuelle</option>
        </select>
    </div>

    
    <div class="mb-4">
        <label class="block text-gray-600 text-sm font-medium mb-2">Devise</label>
        <select name="devise" class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
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
    <div class="mb-4">
        <label class="block text-gray-600 text-sm font-medium mb-2">Mot de passe</label>
        <input type="password" name="password" required class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
    </div>
    <p class="text-center">Vous avez deja un compte??<a href="{{ route('connectGrou') }}" class="text-blue-600"> Connexion</a></p>
    <div class="mt-4">
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
            Créer le groupe
        </button>
    </div>
</form>

</body>
</html>