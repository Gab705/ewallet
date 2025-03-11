<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/portefeuille (1).png">
    <title>E-WALLET</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
        <h2 class="text-xl font-bold text-red-600">Plafond de retrait atteint</h2>
        <p class="text-gray-700 mt-4">Vous avez atteint votre limite de retrait pour la période en cours.</p>
        <p class="text-gray-700">Veuillez attendre la prochaine période ou choisir un nouveau plafond</p>
        <a href="{{ route('index') }}" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-700">
            Retour à l'accueil
        </a>
    </div>
</div>
</body>
</html>