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
        <h2 class="text-2xl font-bold mb-6 text-center">Ajouter Transaction</h2>
        <form method="POST" action="{{ route('majsortie') }}">
        @csrf
            <div class="mb-4">
                <label for="amount" class="block text-gray-700">Montant</label>
                <input type="number" value="{{ $transaction->amount }}" name="amount" id="amount" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="descripttion" class="block text-gray-700">Libellet</label>
                <input type="text" value="{{ $transaction->descritption }}" name="descritption" id="descritption" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-6">
        <label for="devise" class="block text-gray-700">Categories</label>
        <select name="categories" id="categories" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="{{ $transaction->categories }}">value="{{ $transaction->categories }}"</option>
            <option value="Alimentation">Alimentation</option>
            <option value="Transport">Transport</option>
            <option value="Shopping">Shopping</option>
            <option value="Divertissement">Divertissement</option>
            <option value="Santé">Santé</option>
            <option value="Education">Education</option>
            <option value="Factures">Factures</option>
            <option value="Paiya">Paiya</option>
        </select>
    </div>
            <button type="submit" class="w-full text-white py-2 px-4 rounded-lg bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Ajouter</button>
        </form>
    </div>
</body>
</html>
