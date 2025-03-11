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
<form class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md mt-[90px]" action="{{ route('modifierPlafond') }}" method="POST">
    @csrf
    <h2 class="text-xl font-semibold mb-4 text-center">Définir un Plafond</h2>

    <!-- Montant -->
    <div class="mb-4">
        <label for="amount" class="block text-gray-700 font-medium mb-1">Montant</label>
        <input type="number" id="amount" name="montant" required
            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
            placeholder="Entrez un montant">
    </div>

    <!-- Date de début -->
    <div class="mb-4">
        <label for="start_date" class="block text-gray-700 font-medium mb-1">Date de début</label>
        <input type="date" id="start_date" name="start_date" required
            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <!-- Date de fin -->
    <div class="mb-4">
        <label for="end_date" class="block text-gray-700 font-medium mb-1">Date de fin</label>
        <input type="date" id="end_date" name="end_date" required
            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <!-- Bouton de soumission -->
    <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">
        Valider
    </button>
</form>

</body>
</html>