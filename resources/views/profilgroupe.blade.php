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
<div class="bg-gradient-to-r from-blue-400 via-blue-500 to-purple-600 p-8 rounded-lg shadow-lg w-full max-w-md">
    <h2 class="text-3xl font-extrabold mb-6 text-center text-black">INFORMATION DU PROFIL</h2>
    <div class="bg-white bg-opacity-20 p-4 rounded-md">
        <p class="font-bold mt-2 text-black">Nom Admin: {{ $user->name }}</p>
        <p class="font-semibold mt-2 text-black">Nom Du Groupe: {{ $groupe->name }}</p>
        <p class="font-semibold mt-2 text-black">Montant Cotisation: {{ $groupe->montant }}{{ $groupe->devise }}</p>
        <p class="font-semibold mt-2 text-black">Période: {{ $groupe->periodicite }}</p>
    </div>
</div>

</body>
</html>
