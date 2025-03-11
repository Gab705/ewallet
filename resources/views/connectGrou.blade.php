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
<div class="flex items-center justify-center h-screen">
    <form action="{{ route('connexionGroupe') }}" method="POST" class="max-w-lg bg-white p-6 rounded-lg shadow-md w-full">
        @csrf
        <h2 class="text-2xl font-bold text-gray-700 mb-4 text-center">Connectez-vous 😎</h2>
        <label class="block text-gray-600 text-sm font-medium mb-2">Mot de passe</label>
        <input type="password" name="password" required class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
        <div class="mt-4">
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                Connexion
            </button>
        </div>
    </form>
</div>

</body>
</html>